<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceUserController;
use App\Http\Controllers\UserController;
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































// User  Routes
Route::middleware(['auth'])->prefix('user')->group(function () {

    // User Profile Section Routes
    route::get('/view-home', [UserController::class, 'viewHome'])->name('view.user.home');
    route::get('/view-about', [UserController::class, 'viewAbout'])->name('view.user.about');


    route::get('/view-setting', [UserController::class, 'viewSetting'])->name('view.user.setting');
    route::post('/update-profile-image', [UserController::class, 'updateProfileImage'])->name('view.update.profile.image');
    route::post('/profile-update', [UserController::class, 'updateProfile'])->name('profile.update');


    route::get('/view-service', [UserController::class, 'viewService'])->name('view.user.service');
    route::get('/view-service-profile{id}', [UserController::class, 'viewSrviceProfile'])->name('view.service.profile');
    route::get('/get-registration', [UserController::class, 'getRegistration'])->name('get.registration');
    Route::post('/hireme', [UserController::class, 'store'])->name('hireme.store');
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
    route::post('/accept-service', [ServiceUserController::class, 'acceptService']);
    route::post('/decline-service', [ServiceUserController::class, 'declineService']);
    route::post('/get-data', [ServiceUserController::class, 'getData']);









    // route::get('/',[::class,''])->name('');
    // route::get('/',[::class,''])->name('');
    // route::get('/',[::class,''])->name('');
    // route::get('/',[::class,''])->name('');
    // route::get('/',[::class,''])->name('');
    // route::get('/',[::class,''])->name('');
    // route::get('/',[::class,''])->name('');


});


require __DIR__ . '/auth.php';
