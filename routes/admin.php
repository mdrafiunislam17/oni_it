<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AssignRoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CkeditorController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\MicrocityController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PromotionsController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\RateController;
use App\Http\Controllers\Admin\ResortConventionHallController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SchemeController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SpecialGoalController;
use App\Http\Controllers\Admin\VisionController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;




Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    /**
     * RoleController Routes
     */
    Route::get('/visitor-data', [VisitorController::class, 'chartData'])->name('visitor.data');


    Route::prefix('role')->name('role.')->group(function () {


        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        Route::post('/store', [RoleController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [RoleController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('destroy');
    });


    /**
     *  AssignRoleController Routes
     */

    Route::get('/assign-role', [AssignRoleController::class, 'index'])->name('assignrole.index');
    Route::post('/assign-role/store', [AssignRoleController::class, 'assignRole'])->name('assignrole.store');


    //    GalleryController

    Route::get('gallery', [GalleryController::class, "index"])->name("gallery.index");
    Route::get('gallery/create', [GalleryController::class, "create"])->name("gallery.create");
    Route::post('gallery', [GalleryController::class, "store"])->name("gallery.store");
    Route::get('gallery/{gallery}/edit', [GalleryController::class, "edit"])->name("gallery.edit");
    Route::put('gallery/{gallery}', [GalleryController::class, "update"])->name("gallery.update");
    Route::delete('gallery/{gallery}', [GalleryController::class, "destroy"])->name("gallery.destroy");





    /**
     * ProductController
     */

    Route::get('product', [ProductController::class, "index"])->name("product.index");
    Route::get('product/create', [ProductController::class, "create"])->name("product.create");
    Route::post('product', [ProductController::class, "store"])->name("product.store");
    Route::get('product/{product}/edit', [ProductController::class, "edit"])->name("product.edit");
    Route::put('product/{product}', [ProductController::class, "update"])->name("product.update");
    Route::delete('product/{product}', [ProductController::class, "destroy"])->name("product.destroy");


    Route::get('property', [PropertyController::class, "index"])->name("property.index");
    Route::get('property/create', [PropertyController::class, "create"])->name("property.create");
    Route::post('property', [PropertyController::class, "store"])->name("property.store");
    Route::get('property/{property}/edit', [PropertyController::class, "edit"])->name("property.edit");
    Route::put('property/{property}', [PropertyController::class, "update"])->name("property.update");
    Route::delete('property/{property}', [PropertyController::class, "destroy"])->name("property.destroy");



    Route::get('microcity', [MicrocityController::class, "index"])->name("microcity.index");
    Route::get('microcity/create', [MicrocityController::class, "create"])->name("microcity.create");
    Route::post('microcity', [MicrocityController::class, "store"])->name("microcity.store");
    Route::get('microcity/{microcity}/edit', [MicrocityController::class, "edit"])->name("microcity.edit");
    Route::put('microcity/{microcity}', [MicrocityController::class, "update"])->name("microcity.update");
    Route::delete('microcity/{microcity}', [MicrocityController::class, "destroy"])->name("microcity.destroy");





    Route::get('resort-convention-halls', [ResortConventionHallController::class, "index"])->name("resort-convention-halls.index");
    Route::get('resort-convention-halls/create', [ResortConventionHallController::class, "create"])->name("resort-convention-halls.create");
    Route::post('resort-convention-halls', [ResortConventionHallController::class, "store"])->name("resort-convention-halls.store");
    Route::get('resort-convention-halls/{resortConventionHall}/edit', [ResortConventionHallController::class, "edit"])->name("resort-convention-halls.edit");
    Route::put('resort-convention-halls/{resortConventionHall}', [ResortConventionHallController::class, "update"])->name("resort-convention-halls.update");
    Route::delete('resort-convention-halls/{resortConventionHall}', [ResortConventionHallController::class, "destroy"])->name("resort-convention-halls.destroy");



    Route::get('special-goal', [SpecialGoalController::class, "index"])->name("specialGoal.index");
    Route::get('special-goal/create', [SpecialGoalController::class, "create"])->name("specialGoal.create");
    Route::post('special-goal', [SpecialGoalController::class, "store"])->name("specialGoal.store");
    Route::get('special-goal/{specialGoal}/edit', [SpecialGoalController::class, "edit"])->name("specialGoal.edit");
    Route::put('special-goal/{specialGoal}', [SpecialGoalController::class, "update"])->name("specialGoal.update");
    Route::delete('special-goal/{specialGoal}', [SpecialGoalController::class, "destroy"])->name("specialGoal.destroy");



    Route::get('vision', [VisionController::class, "index"])->name("vision.index");
    Route::get('vision/create', [VisionController::class, "create"])->name("vision.create");
    Route::post('vision', [VisionController::class, "store"])->name("vision.store");
    Route::get('vision/{vision}/edit', [VisionController::class, "edit"])->name("vision.edit");
    Route::put('vision/{vision}', [VisionController::class, "update"])->name("vision.update");
    Route::delete('vision/{vision}', [VisionController::class, "destroy"])->name("vision.destroy");





    Route::get('serviceCategory', [ServiceCategoryController::class, "index"])->name("serviceCategory.index");
    Route::get('serviceCategory/create', [ServiceCategoryController::class, "create"])->name("serviceCategory.create");
    Route::post('serviceCategory', [ServiceCategoryController::class, "store"])->name("serviceCategory.store");
    Route::get('serviceCategory/{serviceCategory}/edit', [ServiceCategoryController::class, "edit"])->name("serviceCategory.edit");
    Route::put('serviceCategory/{serviceCategory}', [ServiceCategoryController::class, "update"])->name("serviceCategory.update");
    Route::delete('serviceCategory/{serviceCategory}', [ServiceCategoryController::class, "destroy"])->name("serviceCategory.destroy");


    Route::get('promotions', [PromotionsController::class, "index"])->name("promotions.index");
    Route::get('promotions/create', [PromotionsController::class, "create"])->name("promotions.create");
    Route::post('promotions', [PromotionsController::class, "store"])->name("promotions.store");
    Route::get('promotions/{promotions}/edit', [PromotionsController::class, "edit"])->name("promotions.edit");
    Route::put('promotions/{promotions}', [PromotionsController::class, "update"])->name("promotions.update");
    Route::delete('promotions/{promotions}', [PromotionsController::class, "destroy"])->name("promotions.destroy");


    /**
     * OrderController
     */


    Route::get('order', [OrderController::class, "index"])->name("order.index");
    Route::get('order/create', [OrderController::class, "create"])->name("order.create");
    Route::post('order', [OrderController::class, "store"])->name("order.store");
    Route::get('order/{order}/show', [OrderController::class, "show"])->name("order.show");
    Route::get('order/{order}/edit', [OrderController::class, "edit"])->name("order.edit");
    Route::put('order/{order}', [OrderController::class, "update"])->name("order.update");
    Route::delete('order/{order}', [OrderController::class, "destroy"])->name("order.destroy");

    Route::get('invoice', [InvoiceController::class, "index"])->name("invoice.index");
    Route::get('invoice/{order}/show', [InvoiceController::class, "show"])->name("invoice.show");


    /**
     * SettingController
     */

    Route::get("settings", [SettingController::class, "index"])->name("settings.index");
    Route::get("socialMedia", [SettingController::class, "socialMedia"])->name("settings.socialMedia");
    Route::get("se-contact", [SettingController::class, "Secontact"])->name("settings.contact");
    Route::get("sellers-contact", [SettingController::class, "sellerscontact"])->name("settings.sellers");
    Route::get('home/page/seo',[SettingController::class,'homepage'])->name('home.page.seo');
    Route::put("settings", [SettingController::class, "update"])->name("settings.update");


    Route::get("settings/admin", [SettingController::class, "adminIndex"])->name("settings.admin");
    Route::put("settings/admin", [SettingController::class, "adminupdate"])->name("settings.adminupdate");

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');

    //ShippingController

    Route::get('shippingc', [ShippingController::class, "index"])->name("shippingc.index");
    Route::get('shippingc/create', [ShippingController::class, "create"])->name("shippingc.create");
    Route::post('shippingc', [ShippingController::class, "store"])->name("shippingc.store");
    Route::get('shippingc/{shipping}/edit', [ShippingController::class, "edit"])->name("shippingc.edit");
    Route::put('shippingc/{shipping}', [ShippingController::class, "update"])->name("shippingc.update");
    Route::delete('shippingc/{shipping}', [ShippingController::class, "destroy"])->name("shippingc.destroy");






    Route::get('category', [CategoryController::class, "index"])->name("category.index");
    Route::get('category/create', [CategoryController::class, "create"])->name("category.create");
    Route::post('category', [CategoryController::class, "store"])->name("category.store");
    Route::get('category/{category}/edit', [CategoryController::class, "edit"])->name("category.edit");
    Route::put('category/{category}', [CategoryController::class, "update"])->name("category.update");
    Route::delete('category/{category}', [CategoryController::class, "destroy"])->name("category.destroy");


    Route::get('scheme', [SchemeController::class, "index"])->name("scheme.index");
    Route::get('scheme/create', [SchemeController::class, "create"])->name("scheme.create");
    Route::post('scheme', [SchemeController::class, "store"])->name("scheme.store");
    Route::get('scheme/{scheme}/show', [SchemeController::class, "show"])->name("scheme.show");
    Route::get('scheme/{scheme}/edit', [SchemeController::class, "edit"])->name("scheme.edit");
    Route::put('scheme/{scheme}', [SchemeController::class, "update"])->name("scheme.update");
    Route::delete('scheme/{scheme}', [SchemeController::class, "destroy"])->name("scheme.destroy");


    Route::get('/about', [AboutController::class, "index"])->name("about.index");
    Route::get('/about/create', [AboutController::class, "create"])->name("about.create");
    Route::post('/about', [AboutController::class, "store"])->name("about.store");
    Route::get('about/{about}/edit', [AboutController::class, "edit"])->name("about.edit");
    Route::put('about/{about}', [AboutController::class, "update"])->name("about.update");
    Route::delete('about/{about}', [AboutController::class, "destroy"])->name("about.destroy");


    Route::get('page', [PageController::class, "index"])->name("page.index");
    Route::get('page/create', [PageController::class, "create"])->name("page.create");
    Route::post('page', [PageController::class, "store"])->name("page.store");
    Route::get('page/{page}/edit', [PageController::class, "edit"])->name("page.edit");
    Route::put('page/{page}', [PageController::class, "update"])->name("page.update");
    Route::delete('page/{page}', [PageController::class, "destroy"])->name("page.destroy");


    Route::get('slider', [SliderController::class, "index"])->name("slider.index");
    Route::get('slider/create', [SliderController::class, "create"])->name("slider.create");
    Route::post('slider', [SliderController::class, "store"])->name("slider.store");
    Route::get('slider/{slider}/edit', [SliderController::class, "edit"])->name("slider.edit");
    Route::put('slider/{slider}', [SliderController::class, "update"])->name("slider.update");
    Route::delete('slider/{slider}', [SliderController::class, "destroy"])->name("slider.destroy");
    Route::post('/slider/sort-update', [SliderController::class, 'sortUpdate'])
        ->name('slider.sort.update');

    Route::get('service', [ServiceController::class, "index"])->name("service.index");
    Route::get('service/create', [ServiceController::class, "create"])->name("service.create");
    Route::post('service', [ServiceController::class, "store"])->name("service.store");
    Route::get('service/{service}/edit', [ServiceController::class, "edit"])->name("service.edit");
    Route::put('service/{service}', [ServiceController::class, "update"])->name("service.update");
    Route::delete('service/{service}', [ServiceController::class, "destroy"])->name("service.destroy");



    Route::get('rate', [RateController::class, "index"])->name("rate.index");
    Route::get('rate/create', [RateController::class, "create"])->name("rate.create");
    Route::post('rate', [RateController::class, "store"])->name("rate.store");
    Route::get('rate/{rate}/edit', [RateController::class, "edit"])->name("rate.edit");
    Route::put('rate/{rate}', [RateController::class, "update"])->name("rate.update");
    Route::delete('rate/{rate}', [RateController::class, "destroy"])->name("rate.destroy");


    // routes/web.php
    Route::get('/database-backup', [HomeController::class, 'backup'])->name('backup');

});


/**
 * CkeditorController Routes
 *
 */

Route::get('ckeditor', [CkeditorController::class, 'index']);
Route::post('/ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
