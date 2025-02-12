<?php

use App\Http\Controllers\Admin\AdminArrayExpertiseController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

// Route::get('/login',[AdminController::class, 'login'])->name('login');
// Route::get('/login',[AdminController::class, 'login'])->name('login');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/solutions', [App\Http\Controllers\HomeController::class, 'solutionPage']);
Route::get('/integrations', [App\Http\Controllers\HomeController::class, 'integrations']);
Route::post('/download-pdf', [App\Http\Controllers\HomeController::class, 'downoladPdf']);
Route::get('/success-story', [App\Http\Controllers\HomeController::class, 'successStory']);
Route::get('/success-story/{cta_link}', [App\Http\Controllers\HomeController::class, 'successStoryDetails']);
// Route::get('/solutions/{slug}',[App\Http\Controllers\HomeController::class, 'solutionPageOthers']);
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index']);
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'detail']);
Route::get('/subscribtion', [App\Http\Controllers\HomeController::class, 'subscribtion']);
Route::get('/contact-us', [App\Http\Controllers\HomeController::class, 'contactUs']);
Route::post('/save-contact-us', [App\Http\Controllers\HomeController::class, 'saveData'])->name('contact_us.saveData');
Route::post('/contact-us', [App\Http\Controllers\HomeController::class, 'contact_us_form']);
Route::get('/about-us-company', [App\Http\Controllers\AboutUsController::class, 'company']);
Route::get('/about-us-resources', [App\Http\Controllers\AboutUsController::class, 'resources']);
Route::get('/about-us-career', [App\Http\Controllers\AboutUsController::class, 'career']);
Route::post('/career-store-enquires', [App\Http\Controllers\AboutUsController::class, 'store'])->name('contact.store');

Route::post('/bottom-contact-enquires', [App\Http\Controllers\HomeController::class, 'store'])->name('bottom_contact.store');
// Route::get('/{slug}',[App\Http\Controllers\HomeController::class, 'cms_page']);

Route::get('/solutions/{slug}/{subCatId}', [App\Http\Controllers\HomeController::class, 'solutionSubPageDetails']);




Route::middleware('guest')->prefix('admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
    // Profile
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
    Route::post('/profile/password/update', [AdminProfileController::class, 'updateChange'])->name('admin.profile.password');

    // Website Home Page
    Route::get('home/brands', [AdminBrandController::class, 'index'])->name('admin.home.brands');
    Route::get('home/brands/list', [AdminBrandController::class, 'list'])->name('admin.home.brand-list');
    Route::post('home/brands', [AdminBrandController::class, 'save'])->name('admin.home.brand-save');
    Route::delete('home/brands/{id}/delete', [AdminBrandController::class, 'delete'])->name('admin.home.brand-delete');
    Route::put('home/brands/{id}/{status}/status', [AdminBrandController::class, 'status'])->name('admin.home.brand-status');


    Route::get('home/array-expertise', [AdminArrayExpertiseController::class, 'index'])->name('admin.home.array-expertise');
    Route::get('home/array-expertise/list', [AdminArrayExpertiseController::class, 'list'])->name('admin.home.array-expertise-list');
    Route::post('home/array-expertise', [AdminArrayExpertiseController::class, 'expertiseSave'])->name('admin.home.array-expertise-save');
    Route::delete('home/array-expertise/{id}/delete', [AdminArrayExpertiseController::class, 'delete'])->name('admin.home.array-expertise-delete');
    Route::put('home/array-expertise/{id}/{status}/status', [AdminArrayExpertiseController::class, 'status'])->name('admin.home.array-expertise-status');



});



// Route::fallback(function () {
//     return redirect()->route('404');
// });

// Route::get('/404', function () {
//     return view('errors.404'); // Or use a specific controller to handle this
// })->name('404');

// Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'cmsPages']);

require __DIR__ . '/auth.php';
