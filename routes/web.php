<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('cache',function () {
        
        Artisan::call('route:clear');
        Artisan::call('clear-compiled');
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('optimize:clear');
        return "Cache is cleared";
    }
);


/*-------------------------Frontend Website Area----------------------------*/
// Login With Google

Route::get('google', [App\Http\Controllers\Auth\GoogleController::class,'redirectToGoogle']);
Route::get('google/callback', [App\Http\Controllers\Auth\GoogleController::class,'handleGoogleCallback']);


Route::get('login',[App\Http\Controllers\Auth\AuthController::class,'login'])->name('login');
Route::post('login',[App\Http\Controllers\Auth\AuthController::class,'loginPost'])->name('login.post');

Route::get('register',[App\Http\Controllers\Auth\AuthController::class,'register'])->name('register');
Route::post('register',[App\Http\Controllers\Auth\AuthController::class,'registerPost'])->name('register.post');

Route::get('logout',[App\Http\Controllers\Auth\AuthController::class,'logout'])->name('logout');

Route::post('change-password', [App\Http\Controllers\Auth\AuthController::class, 'changePassword'])->name('change.password.post');
 
Route::get('forget-password', [App\Http\Controllers\Auth\AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [App\Http\Controllers\Auth\AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
   
Route::get('account/verify/{token}', [App\Http\Controllers\Auth\AuthController::class, 'verifyAccount'])->name('user.verify'); 


Route::get('/',[App\Http\Controllers\HomeController::class,'index']);

Route::get('index',[App\Http\Controllers\HomeController::class,'index'])->name('index');

Route::get('top-advisors',[App\Http\Controllers\HomeController::class,'topAdvisors'])->name('top_advisors');

Route::get('advisory',[App\Http\Controllers\HomeController::class,'advisory'])->name('advisory');

Route::get('profile',[App\Http\Controllers\HomeController::class,'profile'])->name('profile');

Route::post('profile-update',[App\Http\Controllers\HomeController::class,'profileUpdate'])->name('profile.update');

Route::get('account-setting',[App\Http\Controllers\HomeController::class,'accountSetting'])->name('account_setting');

Route::get('messages',[App\Http\Controllers\HomeController::class,'messages'])->name('messages'); 

Route::post('requirements-store',[App\Http\Controllers\HomeController::class,'requirementStore'])->name('requirements.store');
// Route::get('requirements-details/{slug}',[App\Http\Controllers\HomeController::class,'requirementDetails'])->name('requirements');
Route::get('requirements-edit/{id}',[App\Http\Controllers\HomeController::class,'requirementEdit'])->name('requirements.edit');
Route::post('requirements-update',[App\Http\Controllers\HomeController::class,'requirementUpdate'])->name('requirements.update');
Route::delete('requirements-delete/{id}',[App\Http\Controllers\HomeController::class,'requirementDelete'])->name('requirements.delete');
/* POSTS  */ 
Route::post('post-store',[App\Http\Controllers\HomeController::class,'posts'])->name('post.store');
Route::get('post-details/{slug}',[App\Http\Controllers\HomeController::class,'postDetails'])->name('post_details');
Route::get('post-edit/{id}',[App\Http\Controllers\HomeController::class,'postEdit'])->name('post.edit');
Route::post('post-update',[App\Http\Controllers\HomeController::class,'postUpdate'])->name('post.update');
Route::delete('post-delete/{id}',[App\Http\Controllers\HomeController::class,'postDelete'])->name('post.delete');
/* POSTS  */

Route::get('like',[App\Http\Controllers\HomeController::class,'like'])->name('like');

Route::post('comment',[App\Http\Controllers\HomeController::class,'comment'])->name('comment');

Route::get('save',[App\Http\Controllers\HomeController::class,'save'])->name('save');

Route::get('following',[App\Http\Controllers\HomeController::class,'following'])->name('following');

Route::get('follower',[App\Http\Controllers\HomeController::class,'follower'])->name('follower');

Route::get('check-status',[App\Http\Controllers\HomeController::class,'CheckStatus'])->name('check.status');

Route::post('advisory-listing-create',[App\Http\Controllers\HomeController::class,'advisoryListingCreate'])->name('advisory-listing.create');

Route::get('advisory-listing-edit/{id}',[App\Http\Controllers\HomeController::class,'advisoryListingEdit'])->name('advisory-listing.edit');

Route::post('advisory-listing-update/{id}',[App\Http\Controllers\HomeController::class,'advisoryListingUpdate'])->name('advisory-listing.update');

Route::delete('advisory-listing-delete/{id}',[App\Http\Controllers\HomeController::class,'advisoryListingDelete'])->name('advisory-listing.delete');

Route::post('business-profile-create',[App\Http\Controllers\HomeController::class,'businessProfileCreate'])->name('business-profile.create');

Route::get('business-profile-edit/{id}',[App\Http\Controllers\HomeController::class,'businessProfileEdit'])->name('business-profile.edit');

Route::post('business-profile-update/{id}',[App\Http\Controllers\HomeController::class,'businessProfileUpdate'])->name('business-profile.update');

Route::delete('business-profile-delete/{id}',[App\Http\Controllers\HomeController::class,'businessProfileDelete'])->name('business-profile.delete');


Route::post('send-advisory-request',[App\Http\Controllers\HomeController::class,'SendAdvisoryRequest'])->name('send_advisory_request');

Route::post('change-status',[App\Http\Controllers\HomeController::class,'changeStatus'])->name('change_status');

Route::get('autocomplete', [App\Http\Controllers\HomeController::class,'autocomplete'])->name('autocomplete');


Route::get('switch-type',function (Request $request) {
        
        $message = "";
        if($request->type == 'User'){
            \Session::put('type','Advisor');
            $message = "Switched to Advisor!";
        }
        elseif($request->type == 'Advisor'){
            \Session::put('type','User');
            $message = "Switched to User!";
        }
        return redirect()->back()->with('success',$message);
    }
);


/*-------------------------Backend Admin Area----------------------------*/

    
Route::get('admin/login',[App\Http\Controllers\Admin\Auth\AuthController::class,'login'])->name('admin.login');

Route::post('admin/login-post',[App\Http\Controllers\Admin\Auth\AuthController::class,'loginPost'])->name('admin.login.post');





Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    
   
	Route::get('dashboard',[App\Http\Controllers\Admin\AdminController::class,'dashboard'])->name('dashboard');
	
    Route::get('profile',[App\Http\Controllers\Admin\Auth\AuthController::class,'profile'])->name('admin.profile');
    
    Route::get('logout',[App\Http\Controllers\Admin\Auth\AuthController::class,'logout'])->name('admin.logout');
    
	//Category
	Route::get('categories',[App\Http\Controllers\Admin\CategoryController::class,'index'])->name('category');
	Route::get('categories/create',[App\Http\Controllers\Admin\CategoryController::class,'create'])->name('category.create');
	Route::post('categories/store',[App\Http\Controllers\Admin\CategoryController::class,'store'])->name('category.store');
	Route::get('categories/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('category.edit');
	Route::post('categories/update/{id}',[App\Http\Controllers\Admin\CategoryController::class,'update'])->name('category.update');
	Route::delete('categories/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class,'delete'])->name('category.delete');

    //Skill
	Route::get('skills',[App\Http\Controllers\Admin\SkillController::class,'index'])->name('skill');
	Route::get('skills/create',[App\Http\Controllers\Admin\SkillController::class,'create'])->name('skill.create');
	Route::post('skills/store',[App\Http\Controllers\Admin\SkillController::class,'store'])->name('skill.store');
	Route::get('skills/edit/{id}',[App\Http\Controllers\Admin\SkillController::class,'edit'])->name('skill.edit');
	Route::post('skills/update/{id}',[App\Http\Controllers\Admin\SkillController::class,'update'])->name('skill.update');
	Route::delete('skills/delete/{id}',[App\Http\Controllers\Admin\SkillController::class,'delete'])->name('skill.delete');
    
    //Tag
	Route::get('tags',[App\Http\Controllers\Admin\TagController::class,'index'])->name('tag');
	Route::get('tags/create',[App\Http\Controllers\Admin\TagController::class,'create'])->name('tag.create');
	Route::post('tags/store',[App\Http\Controllers\Admin\TagController::class,'store'])->name('tag.store');
	Route::get('tags/edit/{id}',[App\Http\Controllers\Admin\TagController::class,'edit'])->name('tag.edit');
	Route::post('tags/update/{id}',[App\Http\Controllers\Admin\TagController::class,'update'])->name('tag.update');
	Route::delete('tags/delete/{id}',[App\Http\Controllers\Admin\TagController::class,'delete'])->name('tag.delete');
	
	 //Users
	Route::get('users',[App\Http\Controllers\Admin\UsersController::class,'index'])->name('users');
	Route::get('users/create',[App\Http\Controllers\Admin\UsersController::class,'create'])->name('users.create');
	Route::post('users/store',[App\Http\Controllers\Admin\UsersController::class,'store'])->name('users.store');
	Route::get('users/edit/{id}',[App\Http\Controllers\Admin\UsersController::class,'edit'])->name('users.edit');
	Route::post('users/update/{id}',[App\Http\Controllers\Admin\UsersController::class,'update'])->name('users.update');
	Route::delete('users/delete/{id}',[App\Http\Controllers\Admin\UsersController::class,'delete'])->name('users.delete');
	
	//Requirement
	Route::get('advisory-listing',[App\Http\Controllers\Admin\AdvisoryListingController::class,'index'])->name('advisory_listing');
	Route::get('advisory-listing/create',[App\Http\Controllers\Admin\AdvisoryListingController::class,'create'])->name('advisory_listing.create');
	Route::post('advisory-listing/store',[App\Http\Controllers\Admin\AdvisoryListingController::class,'store'])->name('advisory_listing.store');
	Route::get('advisory-listing/edit/{id}',[App\Http\Controllers\Admin\AdvisoryListingController::class,'edit'])->name('advisory_listing.edit');
	Route::post('advisory-listing/update/{id}',[App\Http\Controllers\Admin\AdvisoryListingController::class,'update'])->name('advisory_listing.update');
	Route::delete('advisory-listing/delete/{id}',[App\Http\Controllers\Admin\AdvisoryListingController::class,'delete'])->name('advisory_listing.delete');



    
});


