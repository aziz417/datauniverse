<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\SkillOrTechnologyRequest;
use App\Models\SkillOrTechnology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SkillOrTechnologyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:skill or technology create|skill or technology edit|skill or technology delete|skill or technology status', ['only' => ['index']]);
        $this->middleware('permission:skill or technology create')->only(['create', 'store']);
        $this->middleware('permission:skill or technology edit')->only(['edit', 'update']);
        $this->middleware('permission:skill or technology delete')->only(['destroy']);
        $this->middleware('permission:skill or technology status')->only(['changeStatus']);
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all skillortechnology
        $skillOrTechnologies = SkillOrTechnology::with('images')->latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $skillOrTechnologies = $skillOrTechnologies->where('title', 'like', $keyword)
                ->orWhere('description', 'like', $keyword);
        }
        $skillOrTechnologies = $skillOrTechnologies->paginate($perPage);
        //Show All skillortechnology
        return view('admin.pages.skill_or_technologies.index', compact('skillOrTechnologies'));
    }

    public function create()
    {
        return view('admin.pages.skill_or_technologies.create');
    }

    public function store(SkillOrTechnologyRequest $request)
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

            $skillOrTechnology = SkillOrTechnology::create([
                'title' => $request->title,
                'serial' => $request->serial,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            // upload every image
            foreach ($images as $image) {
                if ($image['image']) {
                    if ($image['type'] === 'lg'){
                        $image_path = FileHandler::upload($image['image'], 'SkillOrTechnology', ['width' => '90', 'height' => '90']);
                    }else{
                        $image_path = FileHandler::upload($image['image'], 'SkillOrTechnology', ['width' => '', 'height' => '']);
                    }

                    $skillOrTechnology_exist = $skillOrTechnology->images()->where('type', $image['type'])->first();
                    if ($skillOrTechnology_exist) {
                        FileHandler::delete(@$skillOrTechnology_exist->base_path);
                        $skillOrTechnology_exist->delete();
                    }
                    $skillOrTechnology->images()->create([ // save an image
                        'url' => Storage::url($image_path),
                        'base_path' => $image_path,
                        'type' => $image['type'],
                    ]);
                }
            }

//            if ($request->file('image')) {
//                $image = $request->file('image');
//                $image_name = FileHandler::upload($image, 'SkillOrTechnology', ['width' => '90', 'height' => '90']);
//                $skillOrTechnology->image()->create([
//                    'url' => Storage::url($image_name),
//                    'base_path' => $image_name,
//                    'type' => 'lg',
//                ]);
//            }

            DB::commit();

            return redirect()->back()->with('success', 'Skill Or Technology Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(SkillOrTechnology $skillOrTechnology)
    {
        return view('admin.pages.skill_or_technologies.edit', compact('skillOrTechnology'));
    }

    public function update(SkillOrTechnologyRequest $request, SkillOrTechnology $skillOrTechnology)
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

            $skillOrTechnology->update([
                'title' => $request->title,
                'serial' => $request->serial,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            foreach ($images as $image) {
                if ($image['image']) {
                    if ($image['type'] === 'lg'){
                        $image_path = FileHandler::upload($image['image'], 'SkillOrTechnology', ['width' => '90', 'height' => '90']);
                    }else{
                        $image_path = FileHandler::upload($image['image'], 'SkillOrTechnology', ['width' => '', 'height' => '']);
                    }
                    $skillOrTechnology_exist = $skillOrTechnology->images()->where('type', $image['type'])->first();
                    if ($skillOrTechnology_exist) {
                        FileHandler::delete(@$skillOrTechnology_exist->base_path);
                        $skillOrTechnology_exist->delete();
                    }
                    $skillOrTechnology->images()->create([ // save an image
                        'url' => Storage::url($image_path),
                        'base_path' => $image_path,
                        'type' => $image['type'],
                    ]);
                }
            }

//            if ($request->file('image')) {
//                $image = $request->file('image');
//                $image_name = FileHandler::upload($image, 'SkillOrTechnology', ['width' => '90', 'height' => '90']);
//
//                FileHandler::delete($skillortechnology->image->base_path ?? null);
//
//            }else{
//                $image_name = $skillOrTechnology->image->base_path;
//            }
//
//            $skillOrTechnology->image()->update([
//                'url' => Storage::url($image_name),
//                'base_path' => $image_name,
//                'type' => 'lg',
//            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Skill Or Technology Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(SkillOrTechnology $skillOrTechnology)
    {
        DB::beginTransaction();

        try {
//            FileHandler::delete($skillOrTechnology->image->base_path ?? null);

            foreach ($skillOrTechnology->images as $image) {
                FileHandler::delete($image->base_path);
            }
            $skillOrTechnology->images()->delete();

            $skillOrTechnology->delete();

            DB::commit();

            return redirect()->route('admin.skill-or-technologies.index')->with('success', 'Skill Or Technology Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.skill-or-technologies.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus($technology)
    {
        $skillOrTechnology = SkillOrTechnology::where('id', $technology)->first();
        $skillOrTechnology->update(['status' => !$skillOrTechnology->status]);
        return response()->json(['status' => true]);
    }
}
