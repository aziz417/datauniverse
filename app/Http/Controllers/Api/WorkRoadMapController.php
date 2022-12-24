<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkRoadMap;
use Illuminate\Http\Request;

class WorkRoadMapController extends Controller
{
    public function index()
    {
        $workRoadMap = WorkRoadMap::status()->with('image')->orderBy('serial', "ASC")->first();
        return response()->json([
            'data' => $workRoadMap
        ], 200);
    }
}
