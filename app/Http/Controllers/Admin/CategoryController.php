<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:category create|category edit|category delete|category status', ['only' => ['index']]);
        $this->middleware('permission:category create')->only(['create', 'store']);
        $this->middleware('permission:category edit')->only(['edit', 'update']);
        $this->middleware('permission:category delete')->only(['destroy']);
        $this->middleware('permission:category status')->only(['changeStatus']);
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all category
        $categories = Category::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $categories = $categories->where('name', 'like', $keyword)
                ->orWhere('description', 'like', $keyword)
            ;
        }

        $categories = $categories->paginate($perPage);

        //Show All categories
        return view('admin.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        DB::beginTransaction();

        try {
            Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Category Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(Category $category)
    {
        return view('admin.pages.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        DB::beginTransaction();

        try {

            $category->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? true : false,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Category Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        DB::beginTransaction();

        try {

            $category->delete();

            DB::commit();

            return redirect()->route('admin.categories.index')->with('success', 'Category Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.categories.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus(Category $category)
    {
        $category->update(['status' => !$category->status]);
        return response()->json(['status' => true]);
    }
}
