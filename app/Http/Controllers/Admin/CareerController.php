<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CareerRequest;
use App\Models\Career;
use DB;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all Post
        $careers = Career::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $careers = $careers->where('title', 'like', $keyword)
                ->orWhere('desc', 'like', $keyword);
        }

        $careers = $careers->paginate($perPage);
        return view('admin.pages.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.pages.careers.create');
    }

    public function store(CareerRequest $request)
    {
        DB::beginTransaction();

        try {

            Career::create([
                'title' => $request->title,
                'desc' => $request->desc,
                'status' => $request->status ? true : false,
                'vacancy' => $request->vacancy,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Job Post Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Career $career)
    {
        return view('admin.pages.careers.edit', compact('career'));
    }

    public function update(CareerRequest $request, Career $career)
    {
        try {

            $career->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'status' => $request->status ? true : false,
                'vacancy' => $request->vacancy,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Job Post Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(Career $career)
    {
        DB::beginTransaction();

        try {

            $career->delete();

            DB::commit();

            return redirect()->route('admin.careers.index')->with('success', 'Job Post Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.careers.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus(Career $career)
    {
        $career->update(['status' => !$career->status]);
        return response()->json(['status' => true]);
    }
}
