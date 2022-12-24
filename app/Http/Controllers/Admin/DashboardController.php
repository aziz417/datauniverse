<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Subscribe;
use App\Models\User;
use Carbon\Carbon;
use Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    public function index()
    {
        $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::months(1));

        $monthlyVisits = 0;
        for ($i = 0; $i < count($analyticsData) - 2; $i++) {
            $monthlyVisits += $analyticsData[$i]['visitors'];
        }

        $todayVisits = $analyticsData[count($analyticsData) - 1]['visitors'];

        $analyticsReport = [
            'visitors' => [],
            'days' => []
        ];

        foreach ($analyticsData as $item) {
            $analyticsReport['visitors'][] = $item['visitors'];
            $analyticsReport['days'][] = Carbon::instance($item['date'])->format('d/m/Y');
        }

        $users = User::all();
        $sliders = Slider::all();
        $posts = Post::all();
        $categories = Category::all();
        $subscribers = Subscribe::all();
        return view('admin.dashboard', compact(
            'users',
            'sliders',
            'posts',
            'categories',
            'subscribers',

            'analyticsData',
            'analyticsReport',
            'monthlyVisits',
            'todayVisits'
        ));
    }

}
