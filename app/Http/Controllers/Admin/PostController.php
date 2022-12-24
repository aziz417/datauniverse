<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\PostRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:post create|post edit|post delete|post status', ['only' => ['index']]);
        $this->middleware('permission:post create')->only(['create', 'store']);
        $this->middleware('permission:post edit')->only(['edit', 'update']);
        $this->middleware('permission:post delete')->only(['destroy']);
        $this->middleware('permission:post status')->only(['changeStatus']);
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all Post
        $posts = Post::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $posts = $posts->where('title', 'like', $keyword)
                ->orWhere('description', 'like', $keyword);
        }

        $posts = $posts->paginate($perPage);

        //Show All Slides
        return view('admin.pages.posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.pages.posts.create', compact('tags', 'categories'));
    }

    public function store(PostRequest $request)
    {
//        dd($request->all());
        DB::beginTransaction();

        try {

            $post = Post::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'status' => $request->status ? true : false,
                'featured' => $request->featured ? true : false,
            ]);

            $post->categories()->attach($request->categories);
            $post->tags()->attach($request->tags);

            if ($request->file('data_file')){
                $data_file = $request->file('data_file');
                $file_name = FileHandler::upload($data_file, 'Posts', ['width' => '', 'height' => '']);

                $post->image()->create([
                    'url' => Storage::url($file_name),
                    'base_path' => $file_name,
                    'type' => 'data_file',
                ]);
            }

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'Posts', ['width' => '670', 'height' => '400']);

                $post->image()->create([
                    'url' => Storage::url($image_name),
                    'base_path' => $image_name,
                    'type' => 'lg',
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Blog Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $existingTagsId = $post->tags()->get()->pluck('id')->toArray();
        $existingCategoriesId = $post->categories()->get()->pluck('id')->toArray();
        return view('admin.pages.posts.edit', compact(
            'post', 'tags', 'categories', 'existingTagsId', 'existingCategoriesId'));
    }

    public function update(PostRequest $request, Post $post)
    {
        DB::beginTransaction();

        try {

            $post->update([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'status' => $request->status ? true : false,
                'featured' => $request->featured ? true : false,
            ]);

            $post->categories()->sync($request->categories);
            $post->tags()->sync($request->tags);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'Posts', ['width' => '670', 'height' => '400']);

                FileHandler::delete($post->image->base_path ?? null);

            }else{
                $image_name = $post->image->base_path ?? null;
            }

            $post->image()->update([
                'url' => Storage::url($image_name),
                'base_path' => $image_name,
                'type' => 'lg',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Blog Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(Post $post)
    {
        DB::beginTransaction();
        try {
            FileHandler::delete($post->image->base_path ?? null);
            $post->delete();
            DB::commit();

            return redirect()->route('admin.posts.index')->with('success', 'Blog Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.posts.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus(Post $post)
    {
        $post->update(['status' => !$post->status]);
        return response()->json(['status' => true]);
    }
}
