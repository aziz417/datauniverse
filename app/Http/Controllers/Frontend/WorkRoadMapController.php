<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\WorkRoadMap;
use Illuminate\Http\Request;

class WorkRoadMapController extends Controller
{
    public function index()
    {
        $workRoadMap = WorkRoadMap::status()->orderBy('serial', "ASC")->first();

        return view('pages.how_we_work.how_we_work', compact('workRoadMap'));
    }
}
