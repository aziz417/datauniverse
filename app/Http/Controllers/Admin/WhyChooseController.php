<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\WhyChooseRequest;
use App\Models\WhyChoose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WhyChooseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:why choose create|why choose edit|why choose delete|why choose status', ['only' => ['index']]);
        $this->middleware('permission:why choose create')->only(['create', 'store']);
        $this->middleware('permission:why choose edit')->only(['edit', 'update']);
        $this->middleware('permission:why choose delete')->only(['destroy']);
        $this->middleware('permission:why choose status')->only(['changeStatus']);
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all trusted Companies
        $whyChooses = WhyChoose::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $whyChooses = $whyChooses->where('title', 'like', $keyword)
                ->orWhere('description', 'like', $keyword);
        }

        $whyChooses = $whyChooses->paginate($perPage);

        //Show All Slides
        return view('admin.pages.why_chooses.index', compact('whyChooses'));
    }

    public function create()
    {
        return view('admin.pages.why_chooses.create');
    }

    public function store(WhyChooseRequest $request)
    {
        DB::beginTransaction();

        try {

            $whyChoose = WhyChoose::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'we_choose', ['width' => '120', 'height' => '100']);

                $whyChoose->image()->create([
                    'url' => Storage::url($image_name),
                    'base_path' => $image_name,
                    'type' => 'lg',
                ]);
            }
            DB::commit();

            return redirect()->back()->with('success', 'Why Choose Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(WhyChoose $whyChoose)
    {
        return view('admin.pages.why_chooses.edit', compact('whyChoose'));
    }

    public function update(WhyChooseRequest $request, WhyChoose $whyChoose)
    {
        DB::beginTransaction();

        try {

            $whyChoose->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'we_choose', ['width' => '120', 'height' => '100']);

                FileHandler::delete($whyChoose->image->base_path ?? null);

            }else{
                $image_name = $whyChoose->image->base_path;
            }

            $whyChoose->image()->update([
                'url' => Storage::url($image_name),
                'base_path' => $image_name,
                'type' => 'lg',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Why Choose Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(WhyChoose $whyChoose)
    {
        DB::beginTransaction();

        try {
            FileHandler::delete($whyChoose->image->base_path ?? null);
            $whyChoose->delete();
            DB::commit();
            return redirect()->route('admin.why-chooses.index')->with('success', 'Why Choose Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.why-chooses.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus($choose)
    {
        $whyChoose = WhyChoose::where('id', $choose)->first();
        $whyChoose->update(['status' => !$whyChoose->status]);
        return response()->json(['status' => true]);
    }
}
