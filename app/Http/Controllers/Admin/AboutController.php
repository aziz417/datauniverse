<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:about create|about edit|about delete|about status', ['only' => ['index']]);
        $this->middleware('permission:about create')->only(['create', 'store']);
        $this->middleware('permission:about edit')->only(['edit', 'update']);
        $this->middleware('permission:about delete')->only(['destroy']);
        $this->middleware('permission:about status')->only(['changeStatus']);
    }

    public function index()
    {
//        $perPage = $request->perPage ?: 10;
//        $keyword = $request->keyword;
//
//        //get all about
//        $about = About::latest();
//
//        if ($keyword) {
//            $keyword = '%' . $keyword . '%';
//            $abouts = $abouts->where('title', 'like', $keyword);
//        }
//
//        $abouts = $abouts->paginate($perPage);

        //Show All Slides
        $about = About::with('image')->first();
        return view('admin.pages.about.index', compact('about'));
    }

    public function create()
    {
        if (About::count() < 1){
            return view('admin.pages.about.create');
        }
        return abort(404);
    }

    public function store(AboutRequest $request)
    {
        DB::beginTransaction();

        try {

            $about = About::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'about', ['width' => '452', 'height' => '452']);
                $about->image()->create([
                    'url' => Storage::url($image_name),
                    'base_path' => $image_name,
                    'type' => 'lg',
                ]);
            }

            DB::commit();

            return redirect()->route('admin.abouts.index')->with('success', 'About Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(About $about)
    {
        return view('admin.pages.about.edit', compact('about'));
    }

    public function update(AboutRequest $request, About $about)
    {
        DB::beginTransaction();

        try {

            $about->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'abouts', ['width' => '452', 'height' => '452']);

                FileHandler::delete($about->image->base_path ?? null);

            }else{
                $image_name = $about->image->base_path;
            }

            $about->image()->update([
                'url' => Storage::url($image_name),
                'base_path' => $image_name,
                'type' => 'lg',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'About Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(About $about)
    {
        DB::beginTransaction();

        try {

            FileHandler::delete($about->image->base_path ?? null);

            $about->delete();

            DB::commit();

            return redirect()->route('admin.abouts.index')->with('success', 'About Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.abouts.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus(About $about)
    {
        $about->update(['status' => !$about->status]);
        return response()->json(['status' => true]);
    }
}
