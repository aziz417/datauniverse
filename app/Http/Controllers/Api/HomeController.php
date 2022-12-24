<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Career;
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


        $trustedCompanies = TrustedCompany::with('image')->status()->get();
        $userExpectations = UserExpectation::status()->latest()->get();
        $colors = ['two' => 'two', 'three' => 'three', 'four' => 'four'];

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

    public function isotopeItemsGet(Request $request)
    {
        if ($request->type === 'limit-all') {
            $items = $this->isotopeAllItems('all');
            $type = 'limit-all';
        } else {
            $items = $this->isotopeAllItems($request->type);
            $type = $request->type;
        }
        $itemCount = 18;
        return view('components.isotope-items', compact('items', 'itemCount', 'type'));
    }

    public function isotopeAllItems($type)
    {
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
                    asset('full_stack_development/frontend/NextJS.png'), asset('full_stack_development/frontend/analyzer.png'),
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

        if ($type === 'all') {
            $items = collect($items);
            return $items;
        } else {
            foreach ($items as $key => $item) {
                if ($item['type'] !== $type) {
                    unset($items[$key]);
                }
            }
            $items = collect($items);
            return $items;
        }
    }

    public function about()
    {
        $about = About::with('image')->first();
        return response()->json([
            'data' => $about
        ], 200);
    }

    public function technologyDetails($slug)
    {
        $technology = SkillOrTechnology::where('slug', $slug)->first();
        return view('pages.technology' . '.' . $slug, compact('technology'));
    }

    public function career()
    {
        $careers = Career::latest()->status()->get();

        return response()->json([
            'data' => $careers
        ], 200);
    }

    public function careerDetails($slug)
    {
        $career = Career::where('slug', $slug)->first();

        return response()->json([
            'data' => $career
        ], 200);
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

    public function faqs()
    {
        $data = [
            [
                'title' => 'Who can be a customer at DevXHub ?',
                'desc' => 'Anyone here can be a customer for our all IT Services.'
            ],
            [
                'title' => 'How can we do the order ?',
                'desc' => 'Please visit our service pages and follow the order system. If you have any
                                            problems, just contact us.'
            ],
            [
                'title' => 'How do we finish a job ?',
                'desc' => ' The work will be done according to our prescribed rules.'
            ],
            [
                'title' => 'How do we make payments ?',
                'desc' => 'Here you can make your payments in three ways. Such as: Cash payment, Bank
                                            payment & bKash payment. Please see our payment system page.'
            ],
            [
                'title' => ' How do we get support ?',
                'desc' => 'Please open our <a href="contact-us">suooprt ticket</a> page and
                                            complete the form - then submit it.'
            ], [
                'title' => 'How we get instant support ?',
                'desc' => 'At first, submit your ticket in our <a href="contact-us">suooprt
                                                ticket</a> page. Then let us know by phone.'
            ],
            [
                'title' => 'Can we get monthly or yearly support ?',
                'desc' => 'Yes, of course. But for that, you have to contract with us.'
            ]
        ];


        return response()->json([
            'data' => $data
        ]);


    }

    public function serviceDetails($service)
    {
        $service = Service::where('slug', $service)->first();
        return redirect()->route('home');
    }



}
