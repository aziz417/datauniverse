<?php

namespace App\Providers;

use App\Http\Controllers\Helpers\CategoryHelper;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Setting;
use App\Models\SiteTitle;
use App\Models\SkillOrTechnology;
use App\Models\Social;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // social icon all data get here
        View::composer(['includes.footer', 'includes.header'], function ($view){
            $globalSocialInfo = Social::status()->get();
            $view->with('globalSocialInfo', $globalSocialInfo);
        });

        // skill and technologies all data get here
        View::composer(['includes.footer', 'includes.header'], function ($view){
            $globalSkillAndTechnologies = SkillOrTechnology::status()->latest()->get();
            $view->with('globalSkillAndTechnologies', $globalSkillAndTechnologies);
        });

        // contact icon all data get here
        View::composer(['includes.footer', 'pages.contact.contact', 'pages.under_construction.under_construction'], function ($view){
            $globalContactInfo = Contact::first();
            $view->with('globalContactInfo', $globalContactInfo);
        });

        // setting all data get here
        View::composer(['home','includes.footer', 'includes.header', 'admin.includes.sidebar','admin.includes.footer',
            'admin.auth.login', 'admin.auth.passwords.change-password', 'admin.auth.passwords.confirm'
            , 'admin.auth.passwords.email', 'admin.auth.passwords.reset', 'pages.contact_message.message', 'pages.contact_message.question_message'
        ], function ($view){
            $globalSettingInfo = Setting::status()->first();
            $view->with('globalSettingInfo', $globalSettingInfo);
        });

        // Footer Service navigation
        View::composer(['includes.footer', 'includes.header'], function ($view){
            $ourServices = Service::status()->get()->sortBy('serial');
            $view->with('ourServices', $ourServices);
        });

        // all site title
        View::composer('*', function ($view){
            $siteTitles = SiteTitle::first();
            $view->with('siteTitles', $siteTitles);
        });
    }
}
