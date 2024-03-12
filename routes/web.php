<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceUserController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::get('/', [FrontendController::class, 'welcome'])->name('/');
route::get('/redirect', [HomeController::class, 'redirect']);

route::get('/get-subcategory', [FrontendController::class, 'getSubcategory']);


Route::get('/select-profile', function () {
    return view('auth.selecte_profile');
})->name('select.profile');

route::get('/view-about', [FrontendController::class, 'viewAbout'])->name('view.about');
route::get('/view-contact', [FrontendController::class, 'viewContact'])->name('view.contact');

// User  Routes
Route::middleware(['auth'])->prefix('user')->group(function () {

    // User Profile Section Routes
    route::get('/view-home', [UserController::class, 'viewHome'])->name('view.user.home');
    route::get('/view-about', [UserController::class, 'viewAbout'])->name('view.user.about');
    route::get('/view-applied-service-list', [UserController::class, 'viewAppliedService'])->name('view.applied.service.list');
    route::get('/view-contact', [UserController::class, 'viewContact'])->name('view.user.contact');

    route::get('/view-setting', [UserController::class, 'viewSetting'])->name('view.user.setting');
    route::post('/update-profile-image', [UserController::class, 'updateProfileImage'])->name('view.update.profile.image');
    route::post('/profile-update', [UserController::class, 'updateProfile'])->name('profile.update');



    route::get('/view-service', [UserController::class, 'viewService'])->name('view.user.service');
    route::get('/view-service-profile{id}', [UserController::class, 'viewSrviceProfile'])->name('view.service.profile');
    route::get('/get-registration', [UserController::class, 'getRegistration'])->name('get.registration');
    Route::post('/hireme', [UserController::class, 'store'])->name('hireme.store');

    route::post('/delete-apply-service', [UserController::class, 'deleteApplyService']);
    route::post('/add-review', [UserController::class, 'addReview'])->name('add.review');

    route::get('/filter-service', [UserController::class, 'filterService'])->name('filter.service');
});


//Service User  Routes
Route::middleware(['auth', 'CheckServiceUser'])->prefix('serviceuser')->group(function () {

    //Service User Profile Section Routes
    route::get('/view-home', [ServiceUserController::class, 'viewHome'])->name('view.serviceuser.home');
    route::get('/view-about', [ServiceUserController::class, 'viewAbout'])->name('view.serviceuser.about');
    route::get('/view-dashboard', [ServiceUserController::class, 'viewDashboard'])->name('view.sudashboard');
    route::get('/view-profile', [ServiceUserController::class, 'viewProfile'])->name('view.suprofile');
    route::get('/view-setting', [ServiceUserController::class, 'viewSetting'])->name('view.susetting');
    route::get('/view-review', [ServiceUserController::class, 'viewReviews'])->name('view.sureview');
    route::get('/view-order-list', [ServiceUserController::class, 'viewOrderList'])->name('view.suorder.list');
    route::get('/view-order-list', [ServiceUserController::class, 'viewOrderList'])->name('view.suorder.list');
    route::get('/view-messages', [ServiceUserController::class, 'viewMessages'])->name('view.sumessages');
    route::get('/view-service-section', [ServiceUserController::class, 'viewServiceSection'])->name('view.service.section');



    route::post('/update-profile-image', [ServiceUserController::class, 'updateProfileImage'])->name('view.update.suprofile.image');
    route::post('/profile-update', [ServiceUserController::class, 'updateProfile'])->name('profile.update');
    route::post('/register-service', [ServiceUserController::class, 'registerService'])->name('register.service');
    route::post('/delete-service', [ServiceUserController::class, 'deleteService'])->name('delete.service');
    route::post('/update-service-status', [ServiceUserController::class, 'updateStatus']);

    // route::get('/',[::class,''])->name('');
    // route::get('/',[::class,''])->name('');
    // route::get('/',[::class,''])->name('');
    // route::get('/',[::class,''])->name('');
    // route::get('/',[::class,''])->name('');
    // route::get('/',[::class,''])->name('');


});
require __DIR__ . '/auth.php';



// Admin Routes
Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::middleware(['auth:admin', 'verified'])->prefix('admin')->group(function () {

    //category routes
    route::get('/category-view', [AdminController::class, 'viewCategory'])->name('admin.category.view');
    route::get('/category-delete/{id}', [AdminController::class, 'categoryDelete'])->name('category.delete');
    route::post('/category-store', [AdminController::class, 'categoryStore'])->name('category.store');
    route::get('/getCategoryData/{id}', [AdminController::class, 'getCategoryData'])->name('getCategoryData');
    route::post('/category-update', [AdminController::class, 'categoryUpdate'])->name('category.update');

    //subcategory routes
    route::get('/subcategory-view', [AdminController::class, 'viewsubCategory'])->name('admin.subcategory.view');
    route::get('/subcategory-delete/{id}', [AdminController::class, 'subCategoryDelete'])->name('subcategory.delete');
    route::get('/category-get}', [AdminController::class, 'getCategory'])->name('category.get');
    route::post('/subcategory-store', [AdminController::class, 'subCategoryStore'])->name('subcategory.store');
    route::get('/get-subcategory-data/{id}', [AdminController::class, 'getSubCategoryData'])->name('get.subcategory.data');
    route::post('/subcategory-update', [AdminController::class, 'SubcategoryUpdate'])->name('subcategory.update');

    route::get('/view-profile-edit', [AdminProfileController::class, 'viewProfileEdit'])->name('view.profile.edit');
    route::post('/profile-update', [AdminProfileController::class, 'profileUpdate'])->name('admin.profile.update');
    Route::post('/password/update',  [AdminProfileController::class, 'updatePassword'])->name('password.update');


    // route::get('/',[::class,''])->name('');
    // route::get('/',[::class,''])->name('');
    // route::get('/',[::class,''])->name('');


});
require __DIR__ . '/adminauth.php';
