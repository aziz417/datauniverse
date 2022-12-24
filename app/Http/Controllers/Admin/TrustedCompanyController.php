<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\FileHandler;
use App\Http\Requests\TrustedCompanyRequest;
use App\Models\TrustedCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TrustedCompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:trusted company create|trusted company edit|trusted company delete|trusted company status', ['only' => ['index']]);
        $this->middleware('permission:trusted company create')->only(['create', 'store']);
        $this->middleware('permission:trusted company edit')->only(['edit', 'update']);
        $this->middleware('permission:trusted company delete')->only(['destroy']);
        $this->middleware('permission:trusted company status')->only(['changeStatus']);
    }

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all trusted Companies
        $trustedCompanies = TrustedCompany::latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $trustedCompanies = $trustedCompanies->where('title', 'like', $keyword);
        }

        $trustedCompanies = $trustedCompanies->paginate($perPage);

        //Show All Slides
        return view('admin.pages.trusted_companies.index', compact('trustedCompanies'));
    }

    public function create()
    {
        return view('admin.pages.trusted_companies.create');
    }

    public function store(TrustedCompanyRequest $request)
    {
        DB::beginTransaction();

        try {

            $trustedCompany = TrustedCompany::create([
                'title'        => $request->title,
                'website_link' => $request->website_link,
                'status'       => $request->status ? true : false,
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'Trusted_Companies', ['width' => $request->image_width ?? 171, 'height' => $request->image_height ?? 154]);

                $trustedCompany->image()->create([
                    'url'       => Storage::url($image_name),
                    'base_path' => $image_name,
                    'type'      => 'lg',
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Trusted Company Successfully Created');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function edit(TrustedCompany $trustedCompany)
    {
        return view('admin.pages.trusted_companies.edit', compact('trustedCompany'));
    }

    public function update(TrustedCompanyRequest $request, TrustedCompany $trustedCompany)
    {
        DB::beginTransaction();

        try {

            $trustedCompany->update([
                'title'  => $request->title,
                'website_link' => $request->website_link,
                'status' => $request->status ? true : false,
            ]);


            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = FileHandler::upload($image, 'Trusted_Companies', ['width' => $request->image_width ?? 171, 'height' => $request->image_height ?? 154]);
                FileHandler::delete($trustedCompany->image->base_path ?? null);
            } else {
                $image_name = $trustedCompany->image->base_path;
            }

            $trustedCompany->image()->update([
                'url'       => Storage::url($image_name),
                'base_path' => $image_name,
                'type'      => 'lg',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Trusted Company Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(TrustedCompany $trustedCompany)
    {
        DB::beginTransaction();

        try {

            FileHandler::delete($trustedCompany->image->base_path ?? null);

            $trustedCompany->delete();

            DB::commit();

            return redirect()->route('admin.trusted-companies.index')->with('success', 'Trusted Company Successfully Deleted');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->route('admin.trusted-companies.index')->with('error', $exception->getMessage());
        }
    }

    public function changeStatus($company)
    {
        $trustedCompany = TrustedCompany::where('id', $company)->first();
        $trustedCompany->update(['status' => !$trustedCompany->status]);
        return response()->json(['status' => true]);
    }
}
