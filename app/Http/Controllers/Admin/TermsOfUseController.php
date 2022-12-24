<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TermsOfUseRequest;
use App\Models\TermsOfUse;
use DB;
use Illuminate\Http\Request;

class TermsOfUseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $terms_of_use = TermsOfUse::findOrFail(1)->first();
        return view('admin.pages.term_of_use.index', compact('terms_of_use'));
    }

    public function edit($id)
    {
        $terms_of_use = TermsOfUse::findOrFail($id)->first();
        return view('admin.pages.term_of_use.edit', compact('terms_of_use'));
    }

    public function update(TermsOfUseRequest $request, $id)
    {
        DB::beginTransaction();

        try {

            $terms_of_use = TermsOfUse::findOrFail($id)->first();

            $terms_of_use->update([
                'terms_of_use' => $request->terms_of_use,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Terms Of Use Successfully Updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
