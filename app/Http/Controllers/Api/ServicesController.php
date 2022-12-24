<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServicesResource;
use App\Models\Service;
use App\Models\SkillOrTechnology;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicesController extends Controller
{
    public function index()
    {
        $se = Service::status()->with('images')->get()->sortBy('serial');
        return ServicesResource::collection($se);
    }

    public function underConstruction($slug)
    {
        $item = SkillOrTechnology::where('slug', $slug)->first();
        if ($item === null) {
            $item = Service::where('slug', $slug)->first();
        }
        return new ServicesResource($item);
    }
}
