<?php

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

Route::get('/',[App\Http\Controllers\HomeController::class, 'index']);

Route::get('/solutions',[App\Http\Controllers\HomeController::class, 'solutionPage']);
Route::get('/integrations',[App\Http\Controllers\HomeController::class, 'integrations']);
Route::post('/download-pdf',[App\Http\Controllers\HomeController::class, 'downoladPdf']);
Route::get('/success-story',[App\Http\Controllers\HomeController::class, 'successStory']);
Route::get('/case-study-details/{cta_link}',[App\Http\Controllers\HomeController::class, 'successStoryDetails']);
// Route::get('/solutions/{slug}',[App\Http\Controllers\HomeController::class, 'solutionPageOthers']);

Route::get('/subscribtion',[App\Http\Controllers\HomeController::class, 'subscribtion']);
Route::get('/contact-us',[App\Http\Controllers\HomeController::class, 'contactUs']);
Route::post('/save-contact-us',[App\Http\Controllers\HomeController::class, 'saveData'])->name('contact_us.saveData');
Route::post('/contact-us',[App\Http\Controllers\HomeController::class, 'contact_us_form']);
Route::get('/about-us-company',[App\Http\Controllers\AboutUsController::class, 'company']);
Route::get('/about-us-resources',[App\Http\Controllers\AboutUsController::class, 'resources']);
Route::get('/about-us-career',[App\Http\Controllers\AboutUsController::class, 'career']);
Route::post('/career-store-enquires',[App\Http\Controllers\AboutUsController::class, 'store'])->name('contact.store');

Route::post('/bottom-contact-enquires',[App\Http\Controllers\HomeController::class, 'store'])->name('bottom_contact.store');
// Route::get('/{slug}',[App\Http\Controllers\HomeController::class, 'cms_page']);

Route::get('/solutions/{slug}/{subCatId}',[App\Http\Controllers\HomeController::class, 'solutionSubPageDetails']);

Route::fallback(function () {
    return redirect()->route('404');
});

Route::get('/404', function () {
    return view('errors.404'); // Or use a specific controller to handle this
})->name('404');

