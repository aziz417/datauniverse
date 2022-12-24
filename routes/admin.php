<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;

use App\Http\Controllers\Admin\BasicController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientAndProductController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OurMissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleManageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;

use App\Http\Controllers\Admin\SiteTitleController;
use App\Http\Controllers\Admin\SkillOrTechnologyController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\SocialController;

use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TermsOfUseController;
use App\Http\Controllers\Admin\TrustedCompanyController;
use App\Http\Controllers\Admin\UserContactReplyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserExpectationController;
use App\Http\Controllers\Admin\WeDoCareController;
use App\Http\Controllers\Admin\WelcomeController;
use App\Http\Controllers\Admin\WeOfferController;
use App\Http\Controllers\Admin\WhyChooseController;
use App\Http\Controllers\Admin\UserContactController;
use App\Http\Controllers\Admin\WorkRoadMapController;
use App\Http\Controllers\UserQuestionController;
use App\Models\OurMission;
use App\Models\SiteTitle;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

/******************************* Start => auth sections *********************************/
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('password.request');

    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
        ->name('password.email');

    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
        ->name('password.reset');

    Route::post('password/reset', [ResetPasswordController::class, 'reset'])
        ->name('password.update');
});
/******************************* End => auth sections *********************************/

Route::group(['middleware' => ['auth:admin'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    // dashboard v_2
    Route::resource('users', UserController::class);

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('roles', RoleManageController::class);

    /******************************* Start => Slider sections *********************************/
    Route::resource('sliders', SlidersController::class)->except( 'show');
    Route::get('sliders/change-status/{slider}', [SlidersController::class, 'changeStatus'])
        ->name('sliders.status.change');
    /******************************* End => Slider sections *********************************/

    /******************************* Start => Social sections *********************************/
    Route::resource('socials', SocialController::class);
    Route::get('socials/change-status/{social}', [SocialController::class, 'changeStatus'])
        ->name('socials.status.change');
    /******************************* End => Social sections *********************************/

    /******************************* Start => setting sections *********************************/
    Route::resource('settings', SettingController::class);
    /******************************* End => setting sections *********************************/

    /******************************* Start => Admin Profile sections *********************************/
    Route::get('/profile', [AdminController::class, 'index'])->name('profile');
    Route::PATCH('/profile/{admin}/update', [AdminController::class, 'update'])->name('profile.update');
    Route::PATCH('/password/change', [AdminController::class, 'changePassword'])->name('password.change');
    /******************************* End => Admin Profile sections *********************************/

    /******************************* Start => Contact sections *********************************/
    Route::resource('contacts', ContactController::class);
    /******************************* End => Contact sections *********************************/

    /******************************* Start => About sections *********************************/
    Route::resource('abouts', AboutController::class);
    Route::get('abouts/change-status/{about}', [AboutController::class, 'changeStatus'])
        ->name('abouts.status.change');
    /******************************* End => About sections *********************************/

    /******************************* Start => Category sections *********************************/
    Route::resource('categories', CategoryController::class);
    Route::get('categories/change-status/{category}', [CategoryController::class, 'changeStatus'])
        ->name('categories.status.change');
    /******************************* End => Category sections *********************************/

    /******************************* Start => Post sections *********************************/
    Route::resource('posts', PostController::class);
    Route::get('posts/change-status/{post}', [PostController::class, 'changeStatus'])
        ->name('posts.status.change');
    /******************************* End => Post sections *********************************/

    /******************************* Start => SkillOrTechnology sections *********************************/
    Route::resource('skill-or-technologies', SkillOrTechnologyController::class);
    Route::get('skill-or-technologies/change-status/{technology}', [SkillOrTechnologyController::class, 'changeStatus'])
        ->name('skill-or-technologies.status.change');
    /******************************* End => SkillOrTechnology sections *********************************/

    /******************************* Start => Tag sections *********************************/
    Route::resource('tags', TagController::class);
    Route::get('tags/change-status/{tag}', [TagController::class, 'changeStatus'])
        ->name('tags.status.change');
    /******************************* End => Tag sections *********************************/

    /******************************* Start => TrustedCompany sections *********************************/
    Route::resource('trusted-companies', TrustedCompanyController::class);
    Route::get('trusted-companies/change-status/{company}', [TrustedCompanyController::class, 'changeStatus'])
        ->name('trusted-companies.status.change');
    /******************************* End => TrustedCompany sections *********************************/

    /******************************* Start => we_offers sections *********************************/
    Route::resource('we-offers', WeOfferController::class);
    Route::get('we-offers/change-status/{offer}', [WeOfferController::class, 'changeStatus'])
        ->name('we-offers.status.change');
    /******************************* End => we_offers sections *********************************/

    /******************************* Start => WhyChoose sections *********************************/
    Route::resource('why-chooses', WhyChooseController::class);
    Route::get('why-chooses/change-status/{choose}', [WhyChooseController::class, 'changeStatus'])
        ->name('why-chooses.status.change');
    /******************************* End => WhyChoose sections *********************************/

    /******************************* Start => we_do_cares sections *********************************/
    Route::resource('we-do-cares', WeDoCareController::class);
    Route::get('we-do-cares/change-status/{care}', [WeDoCareController::class, 'changeStatus'])
        ->name('we-do-cares.status.change');
    /******************************* End => we_do_cares sections *********************************/

    /******************************* Start => contacts sections *********************************/
    Route::resource('user-contacts', UserContactController::class);
    /******************************* End => contacts sections *********************************/

    /******************************* Start => Message sections *********************************/
    Route::resource('user-contact-replies', UserContactReplyController::class);
    Route::get("contact-replies/{contact}", [UserContactReplyController::class, 'contactReplies'])->name('contact.replies');

    /******************************* Start => our mission sections *********************************/
    Route::resource('our-missions', OurMissionController::class);
    Route::get('our-missions/change-status/{mission}', [OurMissionController::class, 'changeStatus'])
        ->name('our-missions.status.change');
    /******************************* End => our mission sections *********************************/

    /******************************* Start => user expectation sections *********************************/
    Route::resource('user-expectations', UserExpectationController::class);
    Route::get('user-expectations/change-status/{expectation}', [UserExpectationController::class, 'changeStatus'])
        ->name('user-expectations.status.change');
    /******************************* End => user expectation sections *********************************/

    /******************************* Start => work-road-maps sections *********************************/
    Route::resource('work-road-maps', WorkRoadMapController::class);
    Route::get('work-road-maps/change-status/{map}', [WorkRoadMapController::class, 'changeStatus'])
        ->name('work-road-maps.status.change');
    /******************************* End => work-road-maps sections *********************************/

    /******************************* Start => subscriber sections *********************************/
    Route::get('subscribers', [SubscriberController::class, 'subscribers'])->name('subscribers.index');
    Route::delete('subscriber/delete/{subscriber}', [SubscriberController::class, 'subscriberDestroy'])->name('subscriber.destroy');
    /******************************* End => subscriber sections *********************************/

    /******************************* Start => Career *********************************/
    Route::resource('careers', CareerController::class);
    Route::get('careers/change-status/{career}', [CareerController::class, 'changeStatus'])
         ->name('careers.status.change');
    /******************************* End => Career *********************************/

    /******************************* Start => service sections *********************************/
    Route::resource('services', ServiceController::class);
    Route::get('services/change-status/{service}', [ServiceController::class, 'changeStatus'])
        ->name('services.status.change');
    /******************************* End => Social sections *********************************/

    /******************************* Start => Terms Of Use *********************************/
    Route::resource('terms-of-use', TermsOfUseController::class)->only('index', 'edit', 'update');
    /******************************* End => Terms Of Use *********************************/

    /******************************* Start => user question Of Use *********************************/
    Route::get('user/questions', [UserQuestionController::class, 'index'])->name('user.questions');
    /******************************* End => user question Of Use *********************************/


    /******************************* Start => page titles *********************************/
    Route::get('page/title', [SiteTitleController::class, 'edit'])->name('site.title.edit');
    Route::PATCH('page/update', [SiteTitleController::class, 'update'])->name('site.title.update');
    /******************************* End => page titles *********************************/

    /******************************* Start => welcome section *********************************/
    Route::resource('welcomes', WelcomeController::class);
    Route::get('welcome/change-status/{welcome}', [WelcomeController::class, 'changeStatus'])
        ->name('welcomes.status.change');
    /******************************* Start => welcome section *********************************/

    /******************************* Start => client and product section *********************************/
    Route::resource('client-and-products', ClientAndProductController::class);
    Route::get('client-and-product/change-status/{clientAndProduct}', [ClientAndProductController::class, 'changeStatus'])
        ->name('client-and-products.status.change');
    /******************************* Start => client and product section *********************************/

//    Route::get('image/delete', [BasicController::class, 'imageDelete'])->name('image.delete');
});
