<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserExceptionResource;
use App\Models\UserExpectation;
use Illuminate\Http\Request;

class UserExceptionController extends Controller
{
    public function index()
    {
        $userExpectations = UserExpectation::status()->latest()->get();
        return  UserExceptionResource::collection($userExpectations);
    }
}
