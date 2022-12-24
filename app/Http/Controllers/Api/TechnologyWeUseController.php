<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TechnologyWeUseResource;
use App\Models\Service;
use App\Models\SkillOrTechnology;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TechnologyWeUseController extends Controller
{
    public function index()
    {
        $skillsOrTechnologies = SkillOrTechnology::with('images')->status()->latest()->get()->sortBy('serial');
        return TechnologyWeUseResource::collection($skillsOrTechnologies);
    }

    public function show($slug)
    {
        $item = SkillOrTechnology::where('slug', $slug)->first();
        return new TechnologyWeUseResource($item);
    }
}
