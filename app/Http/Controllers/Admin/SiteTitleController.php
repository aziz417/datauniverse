<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteTitle;
use Auth;
use DB;
use Illuminate\Http\Request;

class SiteTitleController extends Controller
{
    public function edit(){
        $site_title = SiteTitle::first();
        return view('admin.pages.settings.site_title.edit', compact('site_title'));
    }

    public function update(Request $request){
        $site_title = SiteTitle::first();
        DB::beginTransaction();

        try {
            $site_title->update(
                [
                    'site_title' => $request->site_title,
    //            home page
                    'h_title_1' => $request->h_title_1,
                    'h_title_2' => $request->h_title_2,
                    'h_title_3' => $request->h_title_3,
                    'h_title_4' => $request->h_title_4,
                    'h_title_5' => $request->h_title_5,
                    'h_title_6' => $request->h_title_6,
                    'h_title_7' => $request->h_title_7,
                    'h_title_8' => $request->h_title_8,
                    'location' => $request->location,
                    'subscribe' => $request->subscribe,
    //            footer section
                    'f_home' => $request->f_home,
                    'f_our_services' => $request->f_our_services,
                    'f_on_emergency' => $request->f_on_emergency,
                    'f_address' => $request->f_address,
    //            about us page
                    'a_title_1' => $request->a_title_1,
    //            career page
                    'c_title_1' => $request->c_title_1,
                    'c_title_2' => $request->c_title_2,
                    'c_title_3' => $request->c_title_3,
    //            career description page
                    'c_d_title_1' => $request->c_d_title_1,
    //            blog page
                    'b_title_1' => $request->b_title_1,
                    'b_title_2' => $request->b_title_2,
                    'b_title_3' => $request->b_title_3,
                    'b_title_4' => $request->b_title_4,
                    'b_title_5' => $request->b_title_5,
                    'b_title_6' => $request->b_title_6,
    //            blog description page
                    'b_d_title_1' => $request->b_d_title_1,
                    'b_d_title_2' => $request->b_d_title_2,
                    'b_d_title_3' => $request->b_d_title_3,
    //            faq page
                    'faq_title_1' => $request->faq_title_1,
                    'faq_title_2' => $request->faq_title_2,
                    'faq_title_3' => $request->faq_title_3,
    //            services page
                    's_title_1' => $request->s_title_1,
                    's_title_2' => $request->s_title_2,
                    's_title_3' => $request->s_title_3,
    //            under construction page
                    'uc_title_1' => $request->uc_title_1,
    //            how we work page
                    'hww_title_1' => $request->hww_title_1,
    //            contact us page
                    'contact_title_1' => $request->contact_title_1,
                    'updated_by' => Auth::user()->id,
                ]
            );
        DB::commit();
        return redirect()->back()->with('success', 'Title Successfully Updated');

            } catch (\Exception $exception) {
        report($exception);
        DB::rollBack();
        return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
