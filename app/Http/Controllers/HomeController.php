<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Career;
use App\Models\ClientAndProduct;
use App\Models\OurMission;
use App\Models\Service;
use App\Models\SkillOrTechnology;
use App\Models\Slider;
use App\Models\TermsOfUse;
use App\Models\TrustedCompany;
use App\Models\UserExpectation;
use App\Models\Welcome;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $sliders = Slider::with('image')->status()->latest()->get()->sortBy('serial');
        $skillsOrTechnologies = SkillOrTechnology::with('images')->status()->latest()->get()->sortBy('serial');
        $services = Service::status()->with('images')->get()->sortBy('serial');
        $welcome = Welcome::status()->first();


        $trustedCompanies     = TrustedCompany::with('image')->status()->get();
        $userExpectations     = UserExpectation::status()->latest()->get();
        $colors               = ['two' => 'two', 'three' => 'three', 'four' => 'four'];

        $mission = OurMission::status()->first();

        $items = $this->isotopeAllItems('all');
        $itemCount = 18;
        return view('home', compact('services',
            'colors',
            'userExpectations',
            'mission', 'sliders',
            'skillsOrTechnologies',
            'trustedCompanies',
            'items',
            'itemCount',
            'welcome'

        ));
    }

    public function isotopeItemsGet(Request $request){
        if($request->type === 'limit-all'){
            $items = $this->isotopeAllItems('all');
            $type = 'limit-all';
        }else{
            $items = $this->isotopeAllItems($request->type);
            $type = $request->type;
        }
        $itemCount = 18;
        return view('components.isotope-items', compact('items', 'itemCount', 'type'));
    }

    public function isotopeAllItems($type){
        $items = [
            [
                'type' => 'Backend',
                'images' => [
                    asset('full_stack_development/backend/Laravel.png'),
                    asset('full_stack_development/backend/NodeJS.png'),
                    asset('full_stack_development/backend/768px-Python-logo-notext.svg.png'),
                    asset('full_stack_development/backend/django.png'),
                ]
            ],
            [
                'type' => 'Frontend',
                'images' => [
                    asset('full_stack_development/frontend/VueJS.png'),
                    asset('full_stack_development/frontend/ReactJS.png'),
                    asset('full_stack_development/frontend/nuxtjs.png'),
                    asset('full_stack_development/frontend/NextJS.png'),                    asset('full_stack_development/frontend/analyzer.png'),
                ]
            ],
            [
                'type' => 'CSS',
                'images' => [
                    asset('full_stack_development/SASS.png'),
                    asset('full_stack_development/Bootstrap-Logo-PNG.png'),
                    asset('full_stack_development/BootstrapVue.png'),
                    asset('full_stack_development/VuetifyJS.png'),
                    asset('full_stack_development/Tailwind-CSS.png'),
                ]
            ],
            [
                'type' => 'Database',
                'images' => [
                    asset('full_stack_development/db/1200px-MySQL.svg_.png'),
                    asset('full_stack_development/db/1200px-Redis_Logo.svg.png'),
                    asset('full_stack_development/db/584817d6cef1014c0b5e4999.png'),
                    asset('full_stack_development/db/database.png'),
                    asset('full_stack_development/db/mongodb_logo1-76twgcu2dm.png'),
                    asset('full_stack_development/db/mssql-logo.png'),
                    asset('full_stack_development/db/sqlite370_banner.gif'),
                ]
            ],
            [
                'type' => 'CMS',
                'images' => [
                    asset('full_stack_development/cms/drupal.png'),
                    asset('full_stack_development/cms/Horizontal-logo-light-background-en.png'),
                    asset('full_stack_development/cms/logo-woocommerce.svg'),
                    asset('full_stack_development/cms/Magento_Logo.svg'),
                    asset('full_stack_development/cms/opencart-logo.png'),
                    asset('full_stack_development/cms/qa.jpg'),
                    asset('full_stack_development/cms/shopify.png'),
                    asset('full_stack_development/cms/wordpress.png'),
                ]
            ],
            [
                'type' => 'Cloud',
                'images' => [
                    asset('full_stack_development/cloud/Alfresco.png'),
                    asset('full_stack_development/cloud/Algolia.png'),
                    asset('full_stack_development/cloud/Apigee.png'),
                    asset('full_stack_development/cloud/Docker.png'),
                    asset('full_stack_development/cloud/google-cloud-sql.webp'),
                    asset('full_stack_development/cloud/Nexmo.png'),
                    asset('full_stack_development/cloud/Pivotal.png'),
                    asset('full_stack_development/cloud/SharePoint.png'),
                    asset('full_stack_development/cloud/Stripe.png'),
                    asset('full_stack_development/cloud/Talend.png'),
                    asset('full_stack_development/cloud/twilio.png'),
                ]
            ],
            [
                'type' => 'Testing',
                'images' => [
                    asset('full_stack_development/testing/appium.png'),
                    asset('full_stack_development/testing/gatling.webp'),
                    asset('full_stack_development/testing/Hoverfly.png'),
                    asset('full_stack_development/testing/jmeter.png'),
                    asset('full_stack_development/testing/Katalon.png'),
                    asset('full_stack_development/testing/Mochas.png'),
                    asset('full_stack_development/testing/Saucelabs.png'),
                    asset('full_stack_development/testing/SoupUI.png'),
                ]
            ],
            [
                'type' => 'DevOps',
                'images' => [
                    asset('full_stack_development/devops/circleci.png'),
                    asset('full_stack_development/devops/TravisCI-Mascot.png'),
                    asset('full_stack_development/devops/gradle.png'),
                    asset('full_stack_development/devops/Codeship.png'),
                    asset('full_stack_development/devops/Jenkins.png'),
                ]
            ],
            [
                'type' => 'Animations',
                'images' => [
                    asset('full_stack_development/3d-animations/animated-corp-videos.png'),
                    asset('full_stack_development/3d-animations/computer-3d-animation.png'),
                    asset('full_stack_development/3d-animations/depositphotos_186376498-stock-illustration-education-online-training-courses-distance.jpg'),
                ]
            ],
            [
                'type' => 'Tools',
                'images' => [
                    asset('full_stack_development/tools/bitbucket.png'),
                    asset('full_stack_development/tools/DevOps-Azure.png'),
                    asset('full_stack_development/tools/git.png'),
                    asset('full_stack_development/tools/gitlab.png'),
                    asset('full_stack_development/tools/jira.png'),
                    asset('full_stack_development/tools/microsoft-team.png'),
                    asset('full_stack_development/tools/slack.png'),
                    asset('full_stack_development/tools/trello.png'),
                ]
            ]
        ];

        if($type === 'all'){
           $items = collect($items);
           return $items;
        }else{
            foreach ($items as $key => $item){
                if($item['type'] !== $type){ unset($items[$key]); }
            }
            $items = collect($items);
            return $items;
        }
    }

    public function about()
    {
        $about = About::first();
        return view('pages.about.about', compact('about'));
    }

    public function technologyDetails($slug)
    {
//        $slugs = [
        //            'application-development-flutter-technology',
        //            'full-stack-web-development',
        //            'ui-ux-and-graphics-design',
        //            'devops', 'security-&-maintenance',
        //            '3d-animation', 'quality-assurance',
        //            'testing', 'consulting'
        //        ];
        //
        //        if (!in_array($slug, $slugs)){
        $technology = SkillOrTechnology::where('slug', $slug)->first();
        return view('pages.technology' . '.' . $slug, compact('technology'));
//        }else{
        //            return redirect()->back()->with('success', 'There is something wrong.');
        //        }
    }

    public function career()
    {
        $careers = Career::latest()->status()->get();

        return view('pages.career.career', compact('careers'));
    }

    public function careerDetails($slug)
    {
        $career = Career::where('slug', $slug)->first();

        return view('pages.career.careerDetails', compact('career'));
    }

    public function termsOfUse()
    {
        $terms_of_use = TermsOfUse::findOrFail(1)->first();
        return view('pages.terms_of_use.terms_of_use', compact('terms_of_use'));
    }

    public function privacyPolicy()
    {
        return view('pages.privacy_policy.privacy_policy');
    }

    public function faqs() {
        return view('pages.faq.faq');
    }

    public function serviceDetails($service)
    {
        $service = Service::where('slug', $service)->first();
        return redirect()->route('home');
    }

    public function underConstruction($slug){
        $item = SkillOrTechnology::where('slug', $slug)->first();
        if($item === null){
            $item = Service::where('slug', $slug)->first();
        }
        //        $title = str_replace(['/',',','[',']', '-', '_', '(', ')'], ' ', $title);
        return view('pages.under_construction.under_construction', compact('item'));
    }

    // all get clients
    public function ourClients(){
        $clients = ClientAndProduct::with('image')->where('type', 'client')->orderBy('serial', 'ASC')->get();
        return view('pages.our-clients.index', compact('clients'));
    }

    // all get products
    public function ourProducts(){
        $products = ClientAndProduct::with('image')->where('type', 'product')->orderBy('serial', 'ASC')->get();
        return view('pages.our-products.index', compact('products'));
    }
}
