<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:service create|service edit|service delete|service status', ['only' => ['index']]);
        $this->middleware('permission:service create')->only(['create', 'store']);
        $this->middleware('permission:service edit')->only(['edit', 'update']);
        $this->middleware('permission:service delete')->only(['destroy']);
        $this->middleware('permission:service status')->only(['changeStatus']);
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all services Companies
        $services = Service::orderBy('serial', 'ASC')->latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $services = $services->where('title', 'like', $keyword)
                ->orWhere('description', 'like', $keyword);
        }

        $services = $services->paginate($perPage);

        //Show All services
        return view('admin.pages.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.pages.services.create');
    }

    public function store(ServiceRequest $request)
    {
        DB::beginTransaction();

        try {

            $images = [
                [
                    'type' => 'lg',
                    'image' => $request->image
                ], [
                    'type' => 'construction',
                    'image' => $request->image2
                ]
            ];

            $service = Service::create([
                'title' => $request->title,
                'serial' => $request->serial,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            // upload every image
            foreach ($images as $image) {
                if ($image['image']) {
                    if ($image['type'] === 'lg'){
                        $image_path = FileHandler::upload($image['image'], 'services', ['width' => '90', 'height' => '90']);
                    }else{
                        $image_path = FileHandler::upload($image['image'], 'services', ['width' => '', 'height' => '']);
                    }

                    $service_exist = $service->images()->where('type', $image['type'])->first();
                    if ($service_exist) {
                        FileHandler::delete(@$service_exist->base_path);
                        $service_exist->delete();
                    }
                    $service->images()->create([ // save an image
                        'url' => Storage::url($image_path),
                        'base_path' => $image_path,
                        'type' => $image['type'],
                    ]);
                }
            }

//            if ($request->file('image')) {
//                $image = $request->file('image');
//                $image_name = FileHandler::upload($image, 'services', ['width' => '96', 'height' => '96']);
//
//                $service->image()->create([
//                    'url' => Storage::url($image_name),
//                    'base_path' => $image_name,
//                    'type' => 'lg',
//                ]);
//            }
            DB::commit();

            return redirect()->back()->with('success', 'Service Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(Service $service)
    {
        return view('admin.pages.services.edit', compact('service'));
    }

    public function update(ServiceRequest $request, Service $service)
    {
        DB::beginTransaction();

        try {

            $images = [
                [
                    'type' => 'lg',
                    'image' => $request->image
                ], [
                    'type' => 'construction',
                    'image' => $request->image2
                ]
            ];

            $service->update([
                'title' => $request->title,
                'serial' => $request->serial,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            foreach ($images as $image) {
                if ($image['image']) {
                    if ($image['type'] === 'lg'){
                        $image_path = FileHandler::upload($image['image'], 'services', ['width' => '96', 'height' => '96']);
                    }else{
                        $image_path = FileHandler::upload($image['image'], 'services', ['width' => '', 'height' => '']);
                    }
                    $service_exist = $service->images()->where('type', $image['type'])->first();
                    if ($service_exist) {
                        FileHandler::delete(@$service_exist->base_path);
                        $service_exist->delete();
                    }
                    $service->images()->create([ // save an image
                        'url' => Storage::url($image_path),
                        'base_path' => $image_path,
                        'type' => $image['type'],
                    ]);
                }
            }

//            if ($request->file('image')) {
//                $image = $request->file('image');
//                $image_name = FileHandler::upload($image, 'services', ['width' => '96', 'height' => '96']);
//
//                FileHandler::delete($service->image->base_path ?? null);
//
//            }else{
//                $image_name = $service->image->base_path;
//            }
//
//            $service->image()->update([
//                'url' => Storage::url($image_name),
//                'base_path' => $image_name,
//                'type' => 'lg',
//            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Service Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(Service $service)
    {
        DB::beginTransaction();

        try {
//            FileHandler::delete($service->image->base_path ?? null);
            foreach ($service->images as $image) {
                FileHandler::delete($image->base_path);
            }
            $service->images()->delete();
            $service->delete();
            DB::commit();
            return redirect()->route('admin.services.index')->with('success', 'Services Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.services.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus($service)
    {
        $service = Service::where('id', $service)->first();
        $service->update(['status' => !$service->status]);
        return response()->json(['status' => true]);
    }
}
