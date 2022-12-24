<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WelcomeResource;
use App\Models\Welcome;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $welcome = Welcome::with('image')->status()->first();
        return new WelcomeResource($welcome);
    }
}
