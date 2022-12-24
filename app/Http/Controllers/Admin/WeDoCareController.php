<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\WeDoCareRequest;
use App\Models\WeDoCare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WeDoCareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:we do care create|we do care edit|we do care delete|we do care status', ['only' => ['index']]);
        $this->middleware('permission:we do care create')->only(['create', 'store']);
        $this->middleware('permission:we do care edit')->only(['edit', 'update']);
        $this->middleware('permission:we do care delete')->only(['destroy']);
        $this->middleware('permission:we do care status')->only(['changeStatus']);
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all trusted Companies
        $weDoCares = WeDoCare::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $weDoCares = $weDoCares->where('title', 'like', $keyword)
                ->orWhere('description', 'like', $keyword);
        }

        $weDoCares = $weDoCares->paginate($perPage);

        //Show All Slides
        return view('admin.pages.we_do_cares.index', compact('weDoCares'));
    }

    public function create()
    {
        return view('admin.pages.we_do_cares.create');
    }

    public function store(WeDoCareRequest $request)
    {
        DB::beginTransaction();

        try {

            $weDoCare = WeDoCare::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'we_do_cares', ['width' => '220', 'height' => '200']);

                $weDoCare->image()->create([
                    'url' => Storage::url($image_name),
                    'base_path' => $image_name,
                    'type' => 'lg',
                ]);
            }
            DB::commit();

            return redirect()->back()->with('success', 'We Do Care Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(WeDoCare $weDoCare)
    {
        return view('admin.pages.we_do_cares.edit', compact('weDoCare'));
    }

    public function update(WeDoCareRequest $request, WeDoCare $weDoCare)
    {
        DB::beginTransaction();

        try {

            $weDoCare->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'we_do_cares', ['width' => '220', 'height' => '200']);

                FileHandler::delete($weDoCare->image->base_path ?? null);

            }else{
                $image_name = $weDoCare->image->base_path;
            }

            $weDoCare->image()->update([
                'url' => Storage::url($image_name),
                'base_path' => $image_name,
                'type' => 'lg',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'We Do Care Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(WeDoCare $weDoCare)
    {
        DB::beginTransaction();

        try {
            FileHandler::delete($weDoCare->image->base_path ?? null);
            $weDoCare->delete();
            DB::commit();
            return redirect()->route('admin.we-do-cares.index')->with('success', 'We Do Cares Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.we-do-cares.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus($care)
    {
        $weDoCare = WeDoCare::where('id', $care)->first();
        $weDoCare->update(['status' => !$weDoCare->status]);
        return response()->json(['status' => true]);
    }
}
