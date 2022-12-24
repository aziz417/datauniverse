<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\WeDoCare;
use App\Models\WeOffer;
use App\Models\WhyChoose;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    public function index(){
        $weOffer = WeOffer::with('image')->latest()->first();
        $whyChooses = WhyChoose::with('image')->latest()->get();
        $weDoCares = WeDoCare::with('image')->latest()->get();

        return view('pages.service.service', compact('weDoCares', 'weOffer', 'whyChooses'));
    }
}
