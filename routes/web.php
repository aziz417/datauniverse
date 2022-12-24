<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\UserContactController;
use App\Http\Controllers\Frontend\WhyUsController;
use App\Http\Controllers\Frontend\WorkRoadMapController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HubspotApiController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('service/{slug}', [HomeController::class, 'underConstruction'])->name('under.construction');

Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/career', [HomeController::class, 'career'])->name('career');
Route::get('/career/{career}', [HomeController::class, 'careerDetails'])->name('careerDetails');

Route::get('/terms-of-Use', [HomeController::class, 'termsOfUse'])->name('terms-Of-Use');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/faqs', [HomeController::class, 'faqs'])->name('faqs');
Route::Post('/question/store', [UserContactController::class, 'questionStore'])->name('user.question.store');


Route::get('/technology/{technology}', [HomeController::class, 'technologyDetails'])->name('skill-or-technology-details');

Route::get('/why-choose-us', [WhyUsController::class, 'index'])->name('service');

//Route::get('/portfolio', function () {
//    return view('pages.portfolio.portfolio');
//})->name('portfolio');

Route::post("user/login", [\App\Http\Controllers\Auth\LoginController::class, 'userLogin'])->name('userLogin');

Route::get('/how-we-work', [WorkRoadMapController::class, 'index'])->name('how.we.work');
Route::get('/service/{service}/details', [HomeController::class, 'serviceDetails'])->name('service.details');

Route::get('/contact-us', function () {
    return view('pages.contact.contact');
})->name('contact');
Route::post('contact/message/sending', [UserContactController::class, 'store'])->name('contact.message.store');

Route::post('/create-contact', [HubspotApiController::class, 'create']);

Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');

Route::get('/blogs/show/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/tag/blogs/{tag}', [BlogController::class, 'tagBlogs'])->name('tag.blogs');
Route::get('/category/blogs/{tag}', [BlogController::class, 'categoryBlogs'])->name('category.blogs');
Route::post('/subscribe', [UserContactController::class, 'subscribe'])->name('user.subscribe');

// Start Frontend Controller Sections

// User Dashboard Route
Route::get('user/profile', [UserProfileController::class, 'edit'])->name('user.profile');
Route::put('user/profile/update', [UserProfileController::class, 'update'])->name('user.update.profile');
Route::put('user/profile/update/password', [UserProfileController::class, 'changePassword'])->name('user.update.profile.password');

//isotope all item get when jquery hit
Route::get('isotope/items/get', [HomeController::class, 'isotopeItemsGet'])->name('isotope.items.get');

//our clients
Route::get('/our-clients', [HomeController::class, 'ourClients'])->name('our.clients');

//our clients
Route::get('/our-products', [HomeController::class, 'ourProducts'])->name('our.products');

// For Admin
require __DIR__ . '/admin.php';
