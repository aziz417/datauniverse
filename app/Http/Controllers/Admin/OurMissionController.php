<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\OurMissionRequest;
use App\Models\OurMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OurMissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:our mission create|our mission edit|our mission delete|our mission status', ['only' => ['index']]);
        $this->middleware('permission:our mission create')->only(['create', 'store']);
        $this->middleware('permission:our mission edit')->only(['edit', 'update']);
        $this->middleware('permission:our mission delete')->only(['destroy']);
        $this->middleware('permission:our mission status')->only(['changeStatus']);
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
        $ourMission = OurMission::first();
        return view('admin.pages.our_mission.index', compact('ourMission'));
    }

    public function create()
    {
        if (OurMission::count() < 1){
            return view('admin.pages.our_mission.create');
        }
        return abort(404);
    }

    public function store(OurMissionRequest $request)
    {
        DB::beginTransaction();

        try {
            OurMission::create([
                'title_1' => $request->title_1,
                'title_2' => $request->title_2,
                'description_1' => $request->description_1,
                'description_2' => $request->description_2,
                'status' => $request->status ? true : false,
            ]);

            DB::commit();

            return redirect()->route('admin.our-missions.index')->with('success', 'Mission Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(OurMission $ourMission)
    {
        return view('admin.pages.our_mission.edit', compact('ourMission'));
    }

    public function update(OurMissionRequest $request, OurMission $ourMission)
    {
        DB::beginTransaction();

        try {

            $ourMission->update([
                'title_1' => $request->title_1,
                'title_2' => $request->title_2,
                'description_1' => $request->description_1,
                'description_2' => $request->description_2,
                'status' => $request->status ? true : false,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Mission Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(OurMission $ourMission)
    {
        DB::beginTransaction();

        try {
            $ourMission->delete();
            DB::commit();
            return redirect()->route('admin.our-missions.index')->with('success', 'Mission Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.our-missions.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus($ourMission)
    {
        $ourMission = OurMission::findOrFail($ourMission);
        $ourMission->update(['status' => !$ourMission->status]);
        return response()->json(['status' => true]);
    }
}
