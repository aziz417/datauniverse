<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class BasicController extends Controller
{
    public function imageDelete(Request $request){

        DB::beginTransaction();
        try {

            FileHandler::delete($request->basePath ?? null);

            Image::where('base_path', $request->basePath)->first()->update(['base_path' => null]);

            DB::commit();

            return redirect()->route('admin.sliders.index')->with('success', 'Slider Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return false;
        }
    }
}
