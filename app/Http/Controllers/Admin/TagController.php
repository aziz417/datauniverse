<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:tag create|tag edit|tag delete|tag status', ['only' => ['index']]);
        $this->middleware('permission:tag create')->only(['create', 'store']);
        $this->middleware('permission:tag edit')->only(['edit', 'update']);
        $this->middleware('permission:tag delete')->only(['destroy']);
        $this->middleware('permission:tag status')->only(['changeStatus']);
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all tag
        $tags = Tag::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $tags = $tags->where('name', 'like', $keyword)
                ->orWhere('description', 'like', $keyword)
            ;
        }

        $tags = $tags->paginate($perPage);

        //Show All tags
        return view('admin.pages.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.pages.tags.create');
    }

    public function store(TagRequest $request)
    {
        DB::beginTransaction();

        try {
            Tag::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Tag Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(Tag $tag)
    {
        return view('admin.pages.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, tag $tag)
    {
        DB::beginTransaction();

        try {

            $tag->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Tag Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(Tag $tag)
    {
        DB::beginTransaction();
        try {
            $tag->delete();
            DB::commit();
            return redirect()->route('admin.tags.index')->with('success', 'Tag Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.tags.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus(Tag $tag)
    {
        $tag->update(['status' => !$tag->status]);
        return response()->json(['status' => true]);
    }
}
