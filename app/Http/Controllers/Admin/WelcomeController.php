<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\WelcomeRequest;
use App\Models\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:welcome create|welcome edit|welcome delete|welcome status', ['only' => ['index']]);
        $this->middleware('permission:welcome create')->only(['create', 'store']);
        $this->middleware('permission:welcome edit')->only(['edit', 'update']);
        $this->middleware('permission:welcome delete')->only(['destroy']);
        $this->middleware('permission:welcome status')->only(['changeStatus']);
    }

    public function index(Request $request)
    {
        $welcome = Welcome::with('image')->first();
        return view('admin.pages.welcome.index', compact('welcome'));
    }

    public function create()
    {
        if (Welcome::count() < 1){
            return view('admin.pages.welcome.create');
        }
        return abort(404);
    }

    public function store(WelcomeRequest $request)
    {
        DB::beginTransaction();

        try {

            $welcome = Welcome::create([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'welcome', ['width' => '413', 'height' => '516']);

                $welcome->image()->create([
                    'url' => Storage::url($image_name),
                    'base_path' => $image_name,
                    'type' => 'lg',
                ]);
            }
            DB::commit();

            return redirect()->route('admin.welcomes.index')->with('success', 'Welcome Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(Welcome $welcome)
    {
        return view('admin.pages.welcome.edit', compact('welcome'));
    }

    public function update(WelcomeRequest $request, Welcome $welcome)
    {
        DB::beginTransaction();

        try {

            $welcome->update([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'status' => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'welcome', ['width' => '413', 'height' => '516']);

                FileHandler::delete($weDoCare->image->base_path ?? null);

            }else{
                $image_name = $welcome->image->base_path;
            }

            $welcome->image()->update([
                'url' => Storage::url($image_name),
                'base_path' => $image_name,
                'type' => 'lg',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Welcome Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(Welcome $welcome)
    {
        DB::beginTransaction();

        try {
            FileHandler::delete($welcome->image->base_path ?? null);
            $welcome->delete();
            DB::commit();
            return redirect()->route('admin.welcomes.index')->with('success', 'Welcome Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.welcomes.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus($welcome)
    {
        $welcome = Welcome::where('id', $welcome)->first();
        $welcome->update(['status' => !$welcome->status]);
        return response()->json(['status' => true]);
    }
}
