<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\WorkRoadMapRequest;
use App\Models\WorkRoadMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WorkRoadMapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:work road map create|work road map edit|work road map delete|work road map status', ['only' => ['index']]);
        $this->middleware('permission:work road map create')->only(['create', 'store']);
        $this->middleware('permission:work road map edit')->only(['edit', 'update']);
        $this->middleware('permission:work road map delete')->only(['destroy']);
        $this->middleware('permission:work road map status')->only(['changeStatus']);
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all trusted Companies
        $workRoadMaps = WorkRoadMap::with('image')->latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $workRoadMaps = $workRoadMaps->where('title', 'like', $keyword)
                ->orWhere('description', 'like', $keyword);
        }

        $workRoadMaps = $workRoadMaps->paginate($perPage);

        //Show All road map
        return view('admin.pages.work_road_maps.index', compact('workRoadMaps'));
    }

    public function create()
    {
        return view('admin.pages.work_road_maps.create');
    }

    public function store(WorkRoadMapRequest $request)
    {
        DB::beginTransaction();

        try {

            $workRoadMap = WorkRoadMap::create([
                'title' => $request->title,
                'description' => $request->description,
                'color' => $request->color,
                'serial' => $request->serial,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'work_road_maps', ['width' => '', 'height' => '']);

                $workRoadMap->image()->create([
                    'url' => Storage::url($image_name),
                    'base_path' => $image_name,
                    'type' => 'lg',
                ]);
            }
            DB::commit();

            return redirect()->back()->with('success', 'Work Road Map Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(WorkRoadMap $workRoadMap)
    {
        return view('admin.pages.work_road_maps.edit', compact('workRoadMap'));
    }

    public function update(WorkRoadMapRequest $request, WorkRoadMap $workRoadMap)
    {
        DB::beginTransaction();

        try {

            $workRoadMap->update([
                'title' => $request->title,
                'description' => $request->description,
                'color' => $request->color,
                'serial' => $request->serial,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'work_road_maps', ['width' => '', 'height' => '']);

                FileHandler::delete($workRoadMap->image->base_path ?? null);

            }else{
                $image_name = $workRoadMap->image->base_path;
            }

            $workRoadMap->image()->update([
                'url' => Storage::url($image_name),
                'base_path' => $image_name,
                'type' => 'lg',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Work Road Map Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(WorkRoadMap $workRoadMap)
    {
        DB::beginTransaction();

        try {
            FileHandler::delete($workRoadMap->image->base_path ?? null);
            $workRoadMap->delete();
            DB::commit();
            return redirect()->route('admin.work-road-maps.index')->with('success', 'Work Road Map Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.work-road-maps.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus($map)
    {
        $workRoadMap = WorkRoadMap::where('id', $map)->first();
        $workRoadMap->update(['status' => !$workRoadMap->status]);
        return response()->json(['status' => true]);
    }
}
