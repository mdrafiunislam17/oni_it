<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\FrontendContoller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin', [LoginController::class, 'login']);


Route::middleware(['track.visitor'])->group(function () {
    Route::get('/', [FrontendContoller::class, 'index'])->name('frontend.index');
    Route::get('/about', [FrontendContoller::class, 'about'])->name('frontend.about');
    Route::get('/company', [FrontendContoller::class, 'company'])->name('frontend.company');
    Route::get('/chairman', [FrontendContoller::class, 'chairman'])->name('frontend.chairman');
    Route::get('/account', [FrontendContoller::class, 'account'])->name('frontend.account');
    Route::get('/managingDirector', [FrontendContoller::class, 'managingDirector'])->name('frontend.managingDirector');
    Route::get('/services', [FrontendContoller::class, 'services'])->name('frontend.services');
    Route::get('/service-detail', [FrontendContoller::class, 'servicesDetail'])->name('frontend.servicesDetail');
    Route::get('/properties/{type?}', [FrontendContoller::class, 'property'])
        ->name('frontend.property');

    Route::get('/property-detail/{title}', [FrontendContoller::class, 'propertyDetail'])->name('frontend.propertyDetail');
    Route::get('/frontend/microcity', [FrontendContoller::class, 'microcity'])->name('frontend.microcity');


    Route::get('/frontend/microcity/{title}', [FrontendContoller::class, 'microcityDetail'])->name('frontend.microcityDetail');


    Route::get('/resort-convention-halls/', [FrontendContoller::class, 'resortConventionHall'])
        ->name('frontend.resort-convention-halls');

    Route::get('/resort-convention-halls/{title}', [FrontendContoller::class, 'resortConventionHallDetail'])
        ->name('frontend.resort-convention-halls-detail');



//    Route::get('/property-detail', [FrontendContoller::class, 'propertyDetail'])->name('frontend.propertyDetail');
    Route::get('/blog', [FrontendContoller::class, 'blog'])->name('frontend.blog');
    Route::get('/blog-detail', [FrontendContoller::class, 'blogDetail'])->name('frontend.blogDetail');
    Route::get('/contact', [FrontendContoller::class, 'contact'])->name('frontend.contact');
    Route::get('/termsUs ', [FrontendContoller::class, 'termsUs'])->name('frontend.termsUs');
    Route::get('/privacy-policy', [FrontendContoller::class, 'privacyPolicy'])->name('frontend.privacyPolicy');

    Route::get('/contact-us', [ContactController::class, 'index'])
        ->name('frontend.contact.index');
    Route::post('/contact-us/create', [ContactController::class, 'contactSubmit'])
        ->name('frontend.contactSubmit');
    Route::get('/contact-us/{contact}', [ContactController::class, 'show'])
        ->name('frontend.contact.show');



     Route::get('/generate-sitemap', function () {

        Sitemap::create()
            ->add(Url::create('/')->setPriority(1.0))
            ->writeToFile(public_path('sitemap.xml'));

        return "Sitemap generated!";
    });
});



Route::prefix('users')->as("users")->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('.index');

});
