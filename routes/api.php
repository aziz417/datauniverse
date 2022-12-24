<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ClientAndProductController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ServicesController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\TechnologyWeUseController;
use App\Http\Controllers\Api\UserContactController;
use App\Http\Controllers\Api\UserExceptionController;
use App\Http\Controllers\Api\WelcomeController;
use App\Http\Controllers\Api\WorkRoadMapController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::name('api.')->namespace('Api')->group(function () {
    Route::get('sliders', [SliderController::class, 'index']);

    Route::get('services', [ServicesController::class, 'index']);
    Route::get('services/{slug}', [ServicesController::class, 'underConstruction'])->name('services.show');

    Route::get('technology-we-use', [TechnologyWeUseController::class, 'index']);
    Route::get('technology-we-use/{slug}', [TechnologyWeUseController::class, 'show'])->name('technology-we-use.show');

    Route::get('user-exceptions', [UserExceptionController::class, 'index']);

    Route::get('welcome', [WelcomeController::class, 'index']);

    Route::post('/subscribe', [UserContactController::class, 'subscribe'])->name('user.subscribe');
    Route::get('/address', [UserContactController::class, 'address'])->name('address');
    Route::post('contact/message/sending', [UserContactController::class, 'store']);

    Route::get('/how-we-work', [WorkRoadMapController::class, 'index']);
    Route::get('/about-us', [HomeController::class, 'about']);
    Route::get('/career', [HomeController::class, 'career']);
    Route::get('/career/{career}', [HomeController::class, 'careerDetails']);

    Route::get('/feature-blog', [BlogController::class, 'featuredBlogs']);
    Route::get('/latest-blog', [BlogController::class, 'latestBlogs']);
    Route::get('/popular-blog', [BlogController::class, 'popularBlogs']);
    Route::get('/blog/{post}', [BlogController::class, 'show']);

    Route::get('/tag/blogs/{tag}', [BlogController::class, 'tagBlogs']);
    Route::get('/category/blogs/{tag}', [BlogController::class, 'categoryBlogs']);

    Route::get('/faqs', [HomeController::class, 'faqs']);
    Route::get('/clients', [ClientAndProductController::class, 'clients']);

    Route::get('/products', [ClientAndProductController::class, 'products']);
});

