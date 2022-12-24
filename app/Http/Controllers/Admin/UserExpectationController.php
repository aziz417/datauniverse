<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserExpectationRequest;
use App\Models\UserExpectation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserExpectationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:user expectation create|user expectation edit|user expectation delete|user expectation status', ['only' => ['index']]);
        $this->middleware('permission:user expectation create')->only(['create', 'store']);
        $this->middleware('permission:user expectation edit')->only(['edit', 'update']);
        $this->middleware('permission:user expectation delete')->only(['destroy']);
        $this->middleware('permission:user expectation status')->only(['changeStatus']);
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all tag
        $userExpectations = UserExpectation::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $userExpectations = $userExpectations->where('title', 'like', $keyword)
                ->orWhere('quantity', 'like', $keyword)
            ;
        }

        $userExpectations = $userExpectations->paginate($perPage);

        //Show All userExpectations
        return view('admin.pages.user_expectations.index', compact('userExpectations'));
    }

    public function create()
    {
        return view('admin.pages.user_expectations.create');
    }

    public function store(UserExpectationRequest $request)
    {
        DB::beginTransaction();

        try {
            UserExpectation::create([
                'title' => $request->title,
                'quantity' => $request->quantity,
                'small_text' => $request->small_text,
                'status' => $request->status ? true : false,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'User Expectation Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(UserExpectation $userExpectation)
    {
        return view('admin.pages.user_expectations.edit', compact('userExpectation'));
    }

    public function update(UserExpectationRequest $request, UserExpectation $userExpectation)
    {
        DB::beginTransaction();

        try {

            $userExpectation->update([
                'title' => $request->title,
                'quantity' => $request->quantity,
                'small_text' => $request->small_text,
                'status' => $request->status ? true : false,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'User Expectation Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(UserExpectation $userExpectation)
    {
        DB::beginTransaction();
        try {
            $userExpectation->delete();
            DB::commit();
            return redirect()->route('admin.user-expectations.index')->with('success', 'User Expectation Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.user-expectations.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus($userExpectation)
    {
        $userExpectation = UserExpectation::findOrFail($userExpectation);
        $userExpectation->update(['status' => !$userExpectation->status]);
        return response()->json(['status' => true]);
    }
}
