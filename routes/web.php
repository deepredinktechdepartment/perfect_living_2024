<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\SourceGroupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExternalDataController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ThemeoptionsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UnitConfigurationController;
use App\Http\Controllers\ProjectAmenityController;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CityMasterController;
use App\Http\Controllers\AreaMasterController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CustomCollectionController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\ElevationPictureController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
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

// Login routes





Route::get('/cms', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('auth/verify', [LoginController::class, 'authenticate'])->name('auth.verify');

// Forgot and reset password routes



/** Reset * Forgot  password route URL */
Route::get('forgotpassword', [UserController::class, 'showForgetPasswordForm'])->name('forget.password');
Route::post('forget-password', [UserController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('updateyourpassword/{userid?}', [UserController::class, 'setupPassword']);
Route::any('setup.password.update', [UserController::class, 'post_setuppassword'])->name('setup.password.update');

// Logout route
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Authenticated routes
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Reset password
    Route::get('reset-password', [UserController::class, 'changePasswordForm'])->name('reset.password');
    Route::post('reset-password-post',[UserController::class,'saveChangePassword'])->name('verifying.password');



    // Profile routes
    Route::get('profile', [UserController::class, 'showProfileForm'])->name('profile.show');
    Route::post('profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('change-password', [UserController::class, 'changePassword'])->name('profile.changePassword');



    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('users/create', [UserController::class, 'edit'])->name('users.create');
    Route::post('users/updateData', [UserController::class, 'storeOrUpdate'])->name('userUpdateData');
    Route::post('users/storeData', [UserController::class, 'storeOrUpdate'])->name('userstoreData');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


    Route::get('customers', [UserController::class, 'customers'])->name('customers.index');


    Route::post('/users/updatePassword', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::post('/users/toggleStatus', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');

// Define a custom route for editing clients (must come before the resource route)
Route::get('clients/edit', [ClientController::class, 'edit'])->name('clients.edit');

// Define the resource route for clients (will generate standard CRUD routes)
Route::resource('clients', ClientController::class)->except([
    'edit' // Exclude the edit route from the resource controller
]);
Route::post('/clients/update-status', [ClientController::class, 'updateStatus'])->name('clients.updateStatus');
Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');



Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

Route::any('projectLeads', [ExternalDataController::class,'fetchDataFromExternalAPI'])->name('projectLeads');
Route::any('get/crm/leads', [ExternalDataController::class,'fetchCRMLeads'])->name('get.crm.leads');
Route::get('/SingleLeadData/{params?}', [ExternalDataController::class, 'SingleLeadData'])->name('Single.Lead.Data');
Route::get('/project/settings', [ClientController::class, 'projectSetting'])->name('project.settings');
Route::match(['get', 'post'], '/clients/save/{id?}', [ClientController::class, 'save'])->name('clients.save');


// sources & their Group
    Route::resource('sources', SourceController::class);
    Route::resource('source_groups', SourceGroupController::class);


    Route::get('/export-leads', [LeadController::class, 'export'])->name('exportLeads');


/*Admin Theme options*/
Route::resource('theme_options', ThemeoptionsController::class);
Route::get('theme_options/create',[ThemeoptionsController::class,'create_theme_options']);
Route::post('theme_options/store',[ThemeoptionsController::class,'store_theme_options']);
Route::get('theme_options/edit/{id?}',[ThemeoptionsController::class,'edit_theme_options']);
Route::post('theme_options/update/{id?}', [ThemeoptionsController::class, 'update_theme_options']);

Route::get('theme_options/delete/{id}',[ThemeoptionsController::class,'delete_theme_options']);



Route::get('/singleproject/{clientID?}/ExternalCRM', [ClientController::class, 'ExternalCRM'])->name('external.crm');


Route::get('/singleproject/{clientID?}/facebook', [ClientController::class, 'facebook'])->name('facebook');
Route::get('/singleproject/{clientID?}/facebook-pages', [ClientController::class, 'facebookPages'])->name('facebookPages');
Route::get('/singleproject/{clientID?}/competitor-scores', [ClientController::class, 'competitorScores'])->name('competitorScores');
Route::get('/singleproject/{clientID?}/exotel', [ClientController::class, 'exotel'])->name('exotel');

Route::get('/singleproject/{clientID?}/first-response-emailer', [ClientController::class, 'firstResponseEmailer'])->name('firstResponseEmailer');
Route::get('/singleproject/{clientID?}/email-lead-notifications', [ClientController::class, 'leadNotifications'])->name('emailLeadNotifications');
Route::get('/singleproject/{clientID?}/sms-lead-notifications', [ClientController::class, 'smsLeadNotifications'])->name('smsLeadNotifications');

//FRE Email Template
Route::get('/singleproject/{clientID?}/fre-template', [ClientController::class, 'freTemplate'])->name('freTemplate');
Route::get('/singleproject/{clientID?}/email-server', [ClientController::class, 'emailServer'])->name('emailServer');

Route::post('/settings/save', [SettingController::class, 'storeOrUpdateSetting'])->name('store.Or.Update.Setting');

Route::get('/singleproject/{clientID?}/sms-fre-template', [ClientController::class, 'smsFreTemplate'])->name('smsFreTemplate');
Route::get('/singleproject/{clientID?}/sms-lead-notification-template', [ClientController::class, 'smsLeadNotificationTemplate'])->name('smsLeadNotificationTemplate');
Route::get('/singleproject/{clientID?}/lead-notification-template', [ClientController::class, 'leadSummaryNotifications'])->name('leadSummaryNotifications');

Route::get('/singleproject/{clientID?}/email-lead-notification-template', [ClientController::class, 'leadNotificationTemplate'])->name('emailleadNotificationTemplate');
Route::get('/singleproject/{clientID?}/sms-gateway', [ClientController::class, 'smsGateway'])->name('smsGateway');
Route::get('/singleproject/{clientID?}/first-response-sms', [ClientController::class, 'firstResponseSms'])->name('firstResponseSms');
Route::get('/singleproject/{clientID?}/setup-monthly-goals', [ClientController::class, 'setupMonthlyGoals'])->name('setupMonthlyGoals');
Route::get('/singleproject/{clientID?}/lead-capture', [ClientController::class, 'leadCapture'])->name('leadCapture');
Route::get('/singleproject/{clientID?}/lead-actions', [ClientController::class, 'leadActions'])->name('leadActions');
Route::get('/singleproject/{clientID?}/blacklisting', [ClientController::class, 'blacklisting'])->name('blacklisting');
Route::get('/singleproject/{clientID?}/hide-cust-info', [ClientController::class, 'hideCustInfo'])->name('hideCustInfo');
Route::get('/singleproject/{clientID?}/revenue-tracking', [ClientController::class, 'revenueTracking'])->name('revenueTracking');


Route::get('/createlead', [LeadController::class, 'showForm'])->name('createLead');
Route::post('/lead/submit', [LeadController::class, 'submit'])->name('lead.submit');


Route::resource('companies', CompanyController::class);
Route::resource('city-masters', CityMasterController::class);
Route::resource('area-masters', AreaMasterController::class);
Route::resource('amenities', AmenityController::class);
Route::resource('collections', CollectionController::class);
Route::resource('badges', BadgeController::class);

// Projects
Route::resource('projects', ProjectController::class);
Route::post('/projects/{project}/toggle-approval', [ProjectController::class, 'toggleApproval'])->name('projects.toggleApproval');
// routes/web.php
Route::post('/projects/update-featured-status', [ProjectController::class, 'updateFeaturedStatus'])->name('projects.update.featured.status');
Route::get('get/projects/filter', [ProjectController::class, 'filter'])->name('projects.get.filter');


// Unit Configurations
Route::resource('unit_configurations', UnitConfigurationController::class);
Route::delete('/projects/{project}/units/{unit}', [UnitConfigurationController::class, 'destroy'])->name('unit_configurations.destroy');


// Show the form to edit an existing elevation picture (GET request)
Route::get('unit_configurations/{project}/{unit}/edit', [UnitConfigurationController::class, 'edit'])->name('unit_configurations.edit');

// Handle the form submission to update an elevation picture (PUT request)
Route::put('unit_configurations/{project}/{unit}', [UnitConfigurationController::class, 'update'])->name('unit_configurations.update');




Route::resource('elevation_pictures', ElevationPictureController::class);

Route::delete('/projects/{project}/elevation_pictures/edit/{picture}', [ElevationPictureController::class, 'destroy'])->name('elevation_pictures.destroy');

// Show the form to edit an existing elevation picture (GET request)
Route::get('elevation_pictures/{project}/{picture}/edit', [ElevationPictureController::class, 'edit'])->name('elevation_pictures.edit');

// Handle the form submission to update an elevation picture (PUT request)
Route::put('elevation_pictures/{project}/{picture}', [ElevationPictureController::class, 'update'])->name('elevation_pictures.update');

// Project Amenities
Route::resource('project_amenities', ProjectAmenityController::class);

// Route to display the amenities form
Route::get('/projects/{id}/amenities', [ProjectController::class, 'showAmenities'])->name('amenities.show');
// Route to handle the amenities update
Route::put('/projects/{id}/amenities', [ProjectController::class, 'updateAmenities'])->name('projects.updateAmenities');

// Route to display the badges form
Route::get('/projects/{id}/badges/edit', [ProjectController::class, 'editBadges'])->name('projects.editBadges');
// Route to handle the badges update
Route::put('/projects/{id}/badges', [ProjectController::class, 'updateBadges'])->name('projects.updateBadges');



// Route to display the collections form
Route::get('/projects/{id}/collections', [ProjectController::class, 'editCollections'])->name('projects.editCollections');

// Route to handle the collections update
Route::put('/projects/{id}/update-collections', [ProjectController::class, 'updateCollections'])->name('projects.updateCollections');

Route::resource('menus', MenuController::class)->except(['show']);
Route::get('menus/{id}/edit', [MenuController::class, 'create'])->name('menus.edit');
Route::post('menus', [MenuController::class, 'store'])->name('menus.store');
Route::put('menus/{id}', [MenuController::class, 'update'])->name('menus.update');

Route::get('/admin/reviews', [ReviewController::class, 'index'])->name('admin.reviews.index');
Route::patch('/admin/reviews/{review}/approve', [ReviewController::class, 'approve'])->name('admin.reviews.approve');
Route::post('/reviews/toggle-approval/{id?}', [ReviewController::class, 'toggleApproval'])->name('reviews.toggleApproval');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.delete');
Route::get('/reviews/filter', [ReviewController::class, 'filterReviews'])->name('reviews.filter');

Route::POST('/updatereviews/{id}', [ReviewController::class, 'reviewupdate'])->name('reviews.update');



    Route::get('admin/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts.index');
    Route::get('admin/contacts/{id}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('admin/contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');

    Route::resource('customcollections', CustomCollectionController::class);
    Route::get('searchkeywords', [PagesController::class, 'showSearchkeywords'])->name('searchkeywords.lists');

});Route::delete('/search-logs/{id}', [PagesController::class, 'deleteLog'])->name('search-logs.destroy');



//Websites URL
Route::get('project/{slug?}', [ProjectController::class, 'companySingleProject'])->name('company.singleProject');
Route::get('/areas/by-city', [AreaMasterController::class, 'getAreasByCity'])->name('areas.byCity');

// routes/web.php



Route::get('/terms-of-use', [PagesController::class, 'termsOfUse'])->name('terms-of-use');
Route::get('/advertise-with-us', [PagesController::class, 'advertiseWithUs'])->name('advertise-with-us');
Route::get('/about-us', [PagesController::class, 'aboutUs'])->name('about-us');

Route::get('/', [PagesController::class, 'homepage'])->name('homepage');


//Route::get('/filters/{param?}', [PagesController::class, 'filtersprojects'])->name('searchquerystring');



Route::get('/{any?}', [PagesController::class, 'newFiltersprojects'])
    ->where('any', '^(builders|collection|top-locations|budgets|apartments-in-hyderabad|search|property-type)(/[^/]+)?((/builders|/collection|/top-locations|/budgets|/apartments-in-hyderabad|/search\/property-type)(/[^/]+)?)*$')
    ->name('filters.index');


Route::post('/writereview', [ReviewController::class, 'store'])->name('reviews.store')->middleware('noindex');
Route::get('/review/form', [ReviewController::class, 'create'])->name('review.create')->middleware('noindex');
Route::get('/reviews/{slug?}', [ReviewController::class, 'showReviews'])->name('reviews.show');



Route::get('contact-us', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.store');

Route::get('login', [UserController::class, 'userLogin'])->name('userAuthLogin');

Route::post('verifyAuthLogin', [RegisterController::class, 'login'])->name('verify.Auth.Login');

Route::get('create_account', [UserController::class, 'createAccount']);

Route::get('userprofile', [UserController::class, 'yourProfile'])->name('userprofile');
Route::post('/userLogout', [RegisterController::class, 'userLogout'])->name('userLogout');

Route::get('reset_password', [UserController::class, 'resetPassword']);





Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('show.Register.Form');
Route::post('postRegisterData', [RegisterController::class, 'register'])->name('post.Register.Data');



Route::get('email/verify', function (Request $request) {
    // Get a specific query parameter (e.g., ?token=value)
    $token = $request->query('token');

    // Or get all query parameters as an associative array
    $params = $request->all();

    return view('auth.verify', compact('token', 'params'));
})->name('verification.notice');

Route::get('email/verify/{id}/{hash}', [VerificationController::class, '__invoke'])
    ->middleware(['signed'])
    ->name('verification.verify');

Route::get('email/verification-notification', [VerificationController::class, 'send'])

    ->name('verification.send');

    Route::get('/notAdminSerLogout', function () {
        $user = Auth::user();

        if ($user && $user->role === 5) { // Assuming role 5 is for website users
            Auth::logout();
            return redirect('/')->with('status', 'You have been logged out.');
        }

        return back()->with('error','You are not authorized to log out.');
    })->name('notAdminSerLogout');

    Route::get('/verify-email/{token}', [RegisterController::class, 'verifyEmail'])->name('verify.email');

    Route::get('/shortLists', [WishlistController::class, 'index'])->name('wishlists.index');
    Route::middleware(['auth'])->group(function () {

        Route::post('/wishlists', [WishlistController::class, 'store'])->name('wishlists.store');
        Route::delete('/wishlists/{id}', [WishlistController::class, 'destroy'])->name('wishlists.destroy');
    });
