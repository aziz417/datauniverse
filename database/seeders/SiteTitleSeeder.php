<?php

namespace Database\Seeders;

use App\Models\SiteTitle;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class SiteTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'name' => 'site title',
                'permissions' => [
                    'edit',
                ]
            ]
        ];

        foreach ($modules as $module) {
            foreach ($module['permissions'] as $permission) {
                Permission::create([
                    'name' => $module['name'] . ' ' . $permission,
                    'module_name' => $module['name'],
                    'guard_name' => 'admin',
                ]);
            }
        }

        SiteTitle::create([
            'site_title' => 'Developer Experience Hub ',
//            home page
            'h_title_1' => 'Welcome to DevXHub',
            'h_title_2' => 'OUR MISSION',
            'h_title_3' => 'OUR VISION',
            'h_title_4' => 'Services',
            'h_title_5' => 'Technology We Used',
            'h_title_6' => 'Technology Stacks',
            'h_title_7' => 'We Always Try to Understand Users Expectation',
            'h_title_8' => 'Trusted Over 50+ Companies',
            'location' => 'Our Location',
            'subscribe' => 'Subscribe for our Newsletter',
//            footer section
            'f_home' => 'Home',
            'f_our_services' => 'Our Services',
            'f_on_emergency' => 'On Emergency',
            'f_address' => 'Address',
//            about us page
            'a_title_1' => 'About Us',
//            career page
            'c_title_1' => 'Career',
            'c_title_2' => 'Open Positions',
            'c_title_3' => 'We have the following positions for you right now',
//            career description page
            'c_d_title_1' => 'Job Description',
//            blog page
            'b_title_1' => 'Blogs',
            'b_title_2' => 'Home',
            'b_title_3' => 'Blogs',
            'b_title_4' => 'Featured for members',
            'b_title_5' => 'Latest Posts',
            'b_title_6' => 'Popular Posts',
//            blog description page
            'b_d_title_1' => 'Related Posts',
            'b_d_title_2' => 'Categories',
            'b_d_title_3' => 'Popular Tags',
//            faq page
            'faq_title_1' => 'Frequently Asked Questions',
            'faq_title_2' => 'QUESTION FORM',
            'faq_title_3' => 'Do you have any Question?',
//            services page
            's_title_1' => 'WHY',
            's_title_2' => 'Why choose us?',
            's_title_3' => 'We do care !!!',
//            under construction page
            'uc_title_1' => '',
//            how we work page
            'hww_title_1' => 'How Work',
//            contact us page
            'contact_title_1' => 'Get in touch with Us',
            'updated_by' => 1,
        ]);
    }
}
