<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:setting create|setting edit', ['only' => ['index']]);
        $this->middleware('permission:setting create')->only(['create', 'store']);
        $this->middleware('permission:setting edit')->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        $settings = Setting::latest();

        if ($keyword) {
            $keyword  = '%' . $keyword . '%';
            $settings = $settings->where('header_top_title', 'like', $keyword)
                ->orWhere('description', 'like', $keyword)
            ;
        }

        $settings = $settings->paginate($perPage);

        return view('admin.pages.settings.index', compact('settings'));
    }

    public function create()
    {
        if (Setting::count() < 1) {
            return view('admin.pages.settings.create');
        }
        abort(404);
    }

    public function store(SettingRequest $request)
    {
        DB::beginTransaction();

        try {
            $request['status'] = $request->status ? true : false;
            $onlyGo            = $request->only(['header_top_title', 'description', 'status']);
            $setting           = Setting::create($onlyGo);

            if ($request->file('logo')) {
                $image     = $request->file('logo');
                $logo_name = FileHandler::upload($image, 'logos', ['width' => '350', 'height' => '89']);

                $setting->image()->create([
                    'url'       => Storage::url($logo_name),
                    'base_path' => $logo_name,
                    'type'      => 'logo',
                ]);
            }

            if ($request->file('parallax_image')) {
                $image     = $request->file('parallax_image');
                $logo_name = FileHandler::upload($image, 'parallax_image', ['width' => '', 'height' => '']);

                $setting->image()->create([
                    'url'       => Storage::url($logo_name),
                    'base_path' => $logo_name,
                    'type'      => 'parallax_image',
                ]);
            }

            DB::commit();
            return redirect()->route('admin.settings.index')->with('success', 'Setting Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Social $social
     * @return Response
     */
    public function edit(Setting $setting)
    {
        return view('admin.pages.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Social $social
     * @return Response
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        DB::beginTransaction();

        try {
            if ($request->file('logo')) {
                $image     = $request->file('logo');
                $logo_name = FileHandler::upload($image, 'logos', ['width' => '', 'height' => '']);
                FileHandler::delete($setting->image()->where('type', 'logo')->first()->base_path ?? null);

                $setting->image()->where('type', 'logo')->first()->update([
                    'url'       => Storage::url($logo_name),
                    'base_path' => $logo_name,
                    'type'      => 'logo',
                ]);
            }

            if ($request->file('parallax_image')) {
                $image     = $request->file('parallax_image');
                $parallax_image = FileHandler::upload($image, 'parallax_image', ['width' => '', 'height' => '']);
                FileHandler::delete($setting->image()->where('type', 'parallax_image')->first()->base_path ?? null);

                $setting->image()->where('type', 'parallax_image')->first()->update([
                    'url'       => Storage::url($parallax_image),
                    'base_path' => $parallax_image,
                    'type'      => 'parallax_image',
                ]);
            }

            $request['status'] = $request->status ? true : false;
            $onlyGo            = $request->only(['header_top_title', 'description', 'status']);

            $setting->update($onlyGo);

            DB::commit();
            return redirect()->back()->with('success', 'Social Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

}
