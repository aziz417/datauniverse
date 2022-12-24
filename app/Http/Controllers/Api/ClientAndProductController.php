<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClientAndProduct;
use Illuminate\Http\Request;

class ClientAndProductController extends Controller
{
    public function clients(){
        ClientAndProduct::with('image')->where('type', 'client')->latest()->get();
    }

    public function products(){
        ClientAndProduct::with('image')->where('type', 'product')->latest()->get();
    }
}
