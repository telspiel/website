<?php

use App\Http\Controllers\Admin\AdminArrayExpertiseController;
use App\Http\Controllers\Admin\AdminBenefitController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminCaseStudiesController;
use App\Http\Controllers\Admin\AdminCaseStudyController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminComplianceController;
use App\Http\Controllers\Admin\AdminImpactNumbersController;
use App\Http\Controllers\Admin\AdminIntegrationsController;
use App\Http\Controllers\Admin\AdminLeadershipController;
use App\Http\Controllers\Admin\AdminMediaController;
use App\Http\Controllers\Admin\AdminPresenceController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSuperhargingBusinessController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminWebinarController;
use App\Http\Controllers\Admin\AdminWorklifeController;
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
    Route::get('enquiry/profile/user/{id}', [AdminProfileController::class, 'enquiryProfile'])->name('admin.enquiry.profile');

    // Website Home Page-----------------------------------------------------------------------------------------
    Route::get('home/brands', [AdminBrandController::class, 'index'])->name('admin.home.brands');
    Route::get('home/brands/list', [AdminBrandController::class, 'list'])->name('admin.home.brand-list');
    Route::post('home/brands', [AdminBrandController::class, 'save'])->name('admin.home.brand-save');
    Route::delete('home/brands/{id}/delete', [AdminBrandController::class, 'delete'])->name('admin.home.brand-delete');
    Route::put('home/brands/{id}/{status}/status', [AdminBrandController::class, 'status'])->name('admin.home.brand-status');


    Route::get('home/array-expertise', [AdminArrayExpertiseController::class, 'index'])->name('admin.home.array-expertise');
    Route::get('home/array-expertise/list', [AdminArrayExpertiseController::class, 'list'])->name('admin.home.array-expertise-list');
    Route::post('home/array-expertise', [AdminArrayExpertiseController::class, 'expertiseSave'])->name('admin.home.array-expertise-save');

    Route::get('home/array-expertise/create/{id?}', [AdminArrayExpertiseController::class, 'create'])->name('admin.home.array-expertise.create');
    Route::post('home/array-expertise/save', [AdminArrayExpertiseController::class, 'save'])->name('admin.home.array-expertise-save-right');
    Route::delete('home/array-expertise/{id}/delete', [AdminArrayExpertiseController::class, 'delete'])->name('admin.home.array-expertise.delete');
    Route::put('home/array-expertise/{id}/{status}/status', [AdminArrayExpertiseController::class, 'status'])->name('admin.home.array-expertise.status');

    Route::get('home/case-studies', [AdminCaseStudiesController::class, 'index'])->name('admin.home.case-studies');
    Route::get('home/case-studies/list', [AdminCaseStudiesController::class, 'list'])->name('admin.home.case-studies.list');
    Route::get('home/case-studies/create/{id?}', [AdminCaseStudiesController::class, 'create'])->name('admin.home.case-studies.create');
    Route::post('home/array-expertise/title', [AdminCaseStudiesController::class, 'titleSave'])->name('admin.home.case-studies-title.save');
    Route::post('home/case-studies/save', [AdminCaseStudiesController::class, 'save'])->name('admin.home.case-studies.save');
    Route::delete('home/case-studies/{id}/delete', [AdminCaseStudiesController::class, 'delete'])->name('admin.home.case-studies.delete');
    Route::put('home/case-studies/{id}/{status}/status', [AdminCaseStudiesController::class, 'status'])->name('admin.home.case-studies.status');
    //website about page--------------------------------------------------------------------------------------
    Route::get('about/worklife', [AdminWorklifeController::class, 'index'])->name('admin.about.worklife');
    Route::get('about/worklife/list', [AdminWorklifeController::class, 'list'])->name('admin.about.worklife.list');
    Route::post('about/worklife', [AdminWorklifeController::class, 'save'])->name('admin.about.worklife.save');
    Route::delete('about/worklife/{id}/delete', [AdminWorklifeController::class, 'delete'])->name('admin.about.worklife.delete');
    Route::put('about/worklife/{id}/{status}/status', [AdminWorklifeController::class, 'status'])->name('admin.about.worklife.status');

    Route::get('about/leadership', [AdminLeadershipController::class, 'index'])->name('admin.about.leadership');
    Route::get('about/leadership/list', [AdminLeadershipController::class, 'list'])->name('admin.about.leadership.list');
    Route::post('about/leadership', [AdminLeadershipController::class, 'save'])->name('admin.about.leadership.save');
    Route::delete('about/leadership/{id}/delete', [AdminLeadershipController::class, 'delete'])->name('admin.about.leadership.delete');
    Route::put('about/leadership/{id}/{status}/status', [AdminLeadershipController::class, 'status'])->name('admin.about.leadership.status');

    Route::get('about/presence', [AdminPresenceController::class, 'index'])->name('admin.about.presence');
    Route::get('about/presence/list', [AdminPresenceController::class, 'list'])->name('admin.about.presence.list');
    Route::post('about/presence', [AdminPresenceController::class, 'save'])->name('admin.about.presence.save');
    Route::delete('about/presence/{id}/delete', [AdminPresenceController::class, 'delete'])->name('admin.about.presence.delete');
    Route::put('about/presence/{id}/{status}/status', [AdminPresenceController::class, 'status'])->name('admin.about.presence.status');

    Route::get('about/testimonials', [AdminTestimonialController::class, 'index'])->name('admin.about.testimonials');
    Route::get('about/testimonials/list', [AdminTestimonialController::class, 'list'])->name('admin.about.testimonials.list');
    Route::post('about/testimonial', [AdminTestimonialController::class, 'save'])->name('admin.about.testimonial.save');
    Route::delete('about/testimonial/{id}/delete', [AdminTestimonialController::class, 'delete'])->name('admin.about.testimonial.delete');
    Route::put('about/testimonial/{id}/{status}/status', [AdminTestimonialController::class, 'status'])->name('admin.about.testimonial.status');

    Route::get('about/media', [AdminMediaController::class, 'index'])->name('admin.about.media');
    Route::get('about/media/list', [AdminMediaController::class, 'list'])->name('admin.about.media.list');
    Route::post('about/media', [AdminMediaController::class, 'save'])->name('admin.about.media.save');
    Route::delete('about/media/{id}/delete', [AdminMediaController::class, 'delete'])->name('admin.about.media.delete');
    Route::put('about/media/{id}/{status}/status', [AdminMediaController::class, 'status'])->name('admin.about.media.status');

    Route::get('about/blogs', [AdminBlogController::class, 'index'])->name('admin.about.blogs');
    Route::get('about/blogs/list', [AdminBlogController::class, 'list'])->name('admin.about.blogs.list');
    Route::post('about/blog', [AdminBlogController::class, 'save'])->name('admin.about.blog.save');
    Route::delete('about/blog/{id}/delete', [AdminBlogController::class, 'delete'])->name('admin.about.blog.delete');
    Route::put('about/blog/{id}/{status}/status', [AdminBlogController::class, 'status'])->name('admin.about.blog.status');

    Route::get('about/webinars', [AdminWebinarController::class, 'index'])->name('admin.about.webinars');
    Route::get('about/webinars/list', [AdminWebinarController::class, 'list'])->name('admin.about.webinars.list');
    Route::post('about/webinar', [AdminWebinarController::class, 'save'])->name('admin.about.webinar.save');
    Route::delete('about/webinar/{id}/delete', [AdminWebinarController::class, 'delete'])->name('admin.about.webinar.delete');
    Route::put('about/webinar/{id}/{status}/status', [AdminWebinarController::class, 'status'])->name('admin.about.webinar.status');

    // website Solution page ----------------------------------------------------------------------------------------
    Route::get('solutions/impact-numbers', [AdminImpactNumbersController::class, 'index'])->name('admin.solutions.impact-numbers');
    Route::post('solutions/impact-numbers/save', [AdminImpactNumbersController::class, 'impactSave'])->name('admin.solutions.impact-numbers.save');
    Route::post('solutions/compliance/save', [AdminImpactNumbersController::class, 'complianceSave'])->name('admin.solutions.compliance.save');
    Route::put('solutions/compliance/{id}/{status}/status', [AdminImpactNumbersController::class, 'status'])->name('admin.solutions.compliance.status');
    Route::delete('solutions/compliance/{id}/delete', [AdminImpactNumbersController::class, 'complianceDelete'])->name('admin.solutions.compliance.delete');

    Route::post('solutions/usp/save', [AdminImpactNumbersController::class, 'uspSave'])->name('admin.solutions.usp.save');
    Route::put('solutions/usp/{id}/{status}/status', [AdminImpactNumbersController::class, 'uspStatus'])->name('admin.solutions.usp.status');
    Route::delete('solutions/usp/{id}/delete', [AdminImpactNumbersController::class, 'uspDelete'])->name('admin.solutions.usp.delete');

    Route::get('solutions/category', [AdminCategoryController::class, 'category'])->name('admin.solutions.category');
    Route::post('solutions/category/save', [AdminCategoryController::class, 'save'])->name('admin.solutions.category.save');
    Route::put('solutions/category/{id}/{status}/status', [AdminCategoryController::class, 'status'])->name('admin.solutions.category.status');
    Route::delete('solutions/category/{id}/delete', [AdminCategoryController::class, 'delete'])->name('admin.solutions.category.delete');

    // integrations page ----------------------------------------------------------------------------------------
    Route::get('integrations/api-integrations', [AdminIntegrationsController::class, 'index'])->name('admin.integrations.api-integrations');
    Route::post('integrations/api-integrations/save', [AdminIntegrationsController::class, 'save'])->name('admin.integrations.api-integrations.save');
    Route::put('integrations/api-integrations/{id}/{status}/status', [AdminIntegrationsController::class, 'status'])->name('admin.integrations.api-integrations.status');
    Route::delete('integrations/api-integrations/{id}/delete', [AdminIntegrationsController::class, 'delete'])->name('admin.integrations.api-integrations.delete');

    Route::get('integrations/benefits', [AdminBenefitController::class, 'index'])->name('admin.integrations.benefits');
    Route::post('integrations/benefits/save', [AdminBenefitController::class, 'save'])->name('admin.integrations.benefits.save');
    Route::put('integrations/benefits/{id}/{status}/status', [AdminBenefitController::class, 'status'])->name('admin.integrations.benefits.status');
    Route::delete('integrations/benefits/{id}/delete', [AdminBenefitController::class, 'delete'])->name('admin.integrations.benefits.delete');

    Route::get('integrations/usp', [AdminBenefitController::class, 'uspindex'])->name('admin.integrations.usp');
    Route::post('integrations/usp/save', [AdminBenefitController::class, 'uspsave'])->name('admin.integrations.usp.save');
    Route::put('integrations/usp/{id}/{status}/status', [AdminBenefitController::class, 'uspstatus'])->name('admin.integrations.usp.status');
    Route::delete('integrations/usp/{id}/delete', [AdminBenefitController::class, 'uspdelete'])->name('admin.integrations.usp.delete');

    // success stories ----------------------------------------------------------------------------------------
    Route::get('success-stories/case-study', [AdminCaseStudiesController::class, 'index'])->name('admin.success-stories.case-study');

    Route::get('success-stories/compliance', [AdminComplianceController::class, 'index'])->name('admin.success-stories.compliance');
    Route::post('success-stories/compliance/save', [AdminComplianceController::class, 'save'])->name('admin.success-stories.compliance.save');
    Route::put('success-stories/compliance/{id}/{status}/status', [AdminComplianceController::class, 'status'])->name('admin.success-stories.compliance.status');
    Route::delete('success-stories/compliance/{id}/delete', [AdminComplianceController::class, 'delete'])->name('admin.success-stories.compliance.delete');
});



Route::fallback(function () {
    return redirect()->route('404');
});

Route::get('/404', function () {
    return view('errors.404'); // Or use a specific controller to handle this
})->name('404');

Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'cmsPages']);

require __DIR__ . '/auth.php';
