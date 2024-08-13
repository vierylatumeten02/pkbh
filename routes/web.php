<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\HomepageImgController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Backend\SeoSettingController;
use App\Http\Controllers\Backend\InfographicController;
use App\Http\Controllers\Backend\TeamMemberController;

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

/*Route::get('home', function () {
    return view('frontend.index');
});
*/
Route::get('/', [IndexController::class, 'Index']);

//Route::get('/dashboard', function () {
//    return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');  
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/change/password', [UserController::class, 'ChangePassword'])->name('change.password');
    Route::post('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');

}); //End User Middleware


require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');    
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class)->name('admin.login');
Route::get('/admin/logout/page', [AdminController::class, 'AdminLogoutPage'])->name('admin.logout.page');

Route::middleware(['auth', 'role:admin'])->group(function() {

    // All Category Route
    Route::controller(CategoryController::class)->group(function(){

        Route::get('/all/category','AllCategory')->name('all.category');
        Route::get('/add/category','AddCategory')->name('add.category');
        Route::post('/store/category','StoreCategory')->name('category.store');
        Route::get('/edit/category/{id}','EditCategory')->name('edit.category');
        Route::post('/update/category','UpdateCategory')->name('update.category');
        Route::get('/delete/category/{id}','DeleteCategory')->name('delete.category');
    });

    // All Subcategory Route
    Route::controller(CategoryController::class)->group(function(){

        Route::get('/all/subcategory','AllSubcategory')->name('all.subcategory');
        Route::get('/add/subcategory','AddSubcategory')->name('add.subcategory');
        Route::post('/store/subcategory','StoreSubcategory')->name('subcategory.store');
        Route::get('/edit/subcategory/{id}','EditSubcategory')->name('edit.subcategory');
        Route::post('/update/subcategory','UpdateSubcategory')->name('update.subcategory');
        Route::get('/delete/subcategory/{id}','DeleteSubcategory')->name('delete.subcategory');
        Route::get('/subcategory/ajax/{category_id}','GetSubcategory');
    });


    // All Admin Route
    Route::controller(AdminController::class)->group(function(){

        Route::get('/all/admin','AllAdmin')->name('all.admin');
        Route::get('/add/admin','AddAdmin')->name('add.admin');
        Route::post('/store/admin','StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}','EditAdmin')->name('edit.admin');
        Route::post('/update/admin','UpdateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}','DeleteAdmin')->name('delete.admin');
        Route::get('/inactive/admin/user/{id}','InactiveAdminUser')->name('inactive.admin.user');
        Route::get('/active/admin/user/{id}','ActiveAdminUser')->name('active.admin.user');
    });

    // All News Post Route
    Route::controller(NewsPostController::class)->group(function(){

        Route::get('/all/news/post','AllNewsPost')->name('all.news.post');
        Route::get('/add/news/post','AddNewsPost')->name('add.news.post');
        Route::post('/store/news/post','StoreNewsPost')->name('store.news.post');
        Route::get('/edit/news/post/{id}','EditNewsPost')->name('edit.news.post');
        Route::post('/update/news/post','UpdateNewsPost')->name('update.news.post');
        Route::get('/delete/news/post/{id}','DeleteNewsPost')->name('delete.news.post');
     
        Route::get('/inactive/news/post/{id}','InactiveNewsPost')->name('inactive.news.post');
        Route::get('/active/news/post/{id}','ActiveNewsPost')->name('active.news.post');
    });

    //Contact Controller
    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact', 'Contact')->name('contact.me');
        Route::post('/store/message', 'StoreMessage')->name('store.message');
        Route::get('/contact/message', 'ContactMessage')->name('contact.message');
        Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
    });

    //Infographic Controller
    Route::controller(InfographicController::class)->group(function () {
        Route::get('/all/infographics', 'AllInfographics')->name('all.infographics');
        Route::post('/update/infographics', 'UpdateInfographics')->name('update.infographics');
    });

    //HomapageImg Controller
    Route::controller(HomepageImgController::class)->group(function () {
        Route::get('/all/homepageimg', 'AllHomepageImg')->name('all.homepageimg');
        Route::post('/update/homepageimg', 'UpdateHomepageImg')->name('update.homepageimg');
    });

    // About Us Controller
    Route::controller(AboutUsController::class)->group(function(){
        Route::get('/all/aboutus', 'AllAboutUs')->name('all.aboutus');
        Route::post('/update/aboutus', 'UpdateAboutUs')->name('update.aboutus');
    });

    // Team Member Controller
    Route::controller(TeamMemberController::class)->group(function(){

        Route::get('/all/team/','AllTeamMember')->name('all.team.member');
        Route::get('/add/team/','AddTeamMember')->name('add.team.member');

        Route::post('/store/team','StoreTeamMember')->name('store.team.member');
        Route::get('/edit/team/{id}','EditTeamMember')->name('edit.team.member');
        Route::post('/update/team','UpdateTeamMember')->name('update.team.member');
        Route::get('/delete/team/{id}','DeleteTeamMember')->name('delete.team.member');
        
        Route::get('/inactive/team/{id}','InactiveTeamMember')->name('inactive.team.member');
        Route::get('/active/team/{id}','ActiveTeamMember')->name('active.team.member');
    });
});

    //Access for All
    Route::get('/news', [IndexController::class, 'AllNewsShow']);
    Route::get('/news/details/{id}/{slug}', [IndexController::class, 'NewsDetails']);
    Route::get('/news/category/{id}/{slug}', [IndexController::class, 'CatWiseNews']);
    Route::get('/news/subcategory/{id}/{slug}', [IndexController::class, 'SubCatWiseNews']);

    //Seo Route
    Route::controller(SeoSettingController::class)->group(function(){
        Route::get('/seo/setting', 'SeoSiteSetting')->name('seo.setting');
        Route::post('update/seo/setting', 'UpdateSeoSetting')->name('update.seo.setting');
    });

    //Access for All
    Route::post('/search', [IndexController::class, 'SearchByDate'])->name('search-by-date');
    Route::post('/news', [IndexController::class, 'NewsSearch'])->name('news.search');

    //Tim PKBH
    Route::get('/team', [IndexController::class, 'PKBHTeam']);

    //Client
    Route::get('/client', [IndexController::class, 'ClientList']);

    
    