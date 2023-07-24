<?php

use App\Http\Controllers\api\userregistercontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\typecontroller;
use App\Http\Controllers\areatypecontroller;
use App\Http\Controllers\locationtypecontroller;
use App\Http\Controllers\specialfeaturecontroller;
use App\Http\Controllers\couponcontroller;
use App\Http\Controllers\bannercontroller;
use App\Http\Controllers\informationcontroller;
use App\Http\Controllers\tripcontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\daycontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\adminlogincontroller;
use App\Http\Controllers\frontendcontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\userprofilecontroller;
use App\Http\Controllers\registercontroller;
use App\Http\Controllers\bookingcontroller;
use App\Http\Controllers\usertripcontroller;
use App\Http\Controllers\userdaycontroller;
use App\Http\Controllers\companioncontroller;
use App\Http\Controllers\adminbookingcontroller;
use App\Http\Controllers\filltercontroller;
use App\Http\Controllers\aboutcontroller;
use App\Http\Controllers\privacycontroller;
use App\Http\Controllers\retrurnpolicycontroller;
use App\Http\Controllers\termconditioncontroller;
use App\Http\Controllers\reviewcontroller;
use App\Http\Controllers\logopartner;
use App\Http\Controllers\generalsettingcontroller;
use App\Http\Controllers\newslettercontroller;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[frontendcontroller::class,'index']);

Route::get('trip/{id}', [frontendcontroller::class, 'trip']);

Route::get('about', [frontendcontroller::class,'about']);

Route::get('privacy-policy', [frontendcontroller::class,'privacy_policy']);

Route::get('return-policy', [frontendcontroller::class,'return_policy']);


Route::get('terms-condition', [frontendcontroller::class,'terms_condition']);

Route::get('trip-details/{id}', [frontendcontroller::class, 'trip_details']);

Route::get('user-login', [logincontroller::class,'index'])->name('user-login');

Route::post('login-store', [logincontroller::class,'store'])->name('login-store');

Route::get('userdeatail', [registercontroller::class,'userdeatail']);

Route::post('registeruser', [registercontroller::class,'store'])->name('registeruser');

Route::get('user-details',[registercontroller::class,'userdetails']);

Route::Post('userdetail-store',[registercontroller::class,'userdetailstore'])->name('userdetail-store');

Route::post('news-letter', [frontendcontroller::class,'news_letter'])->name('news-letter');

Route::get('user/logout', [userprofilecontroller::class,'signOut']);

Route::get('user-register',[registercontroller::class,'index']);

Route::get('locationtype/{trip}/{id}', [frontendcontroller::class,'locationtype']);

Route::get('type/{trip}/{id}', [frontendcontroller::class,'type']);

Route::get('specialfeature/{trip}/{id}', [frontendcontroller::class,'specialfeature']);

Route::get('areatype/{trip}/{id}', [frontendcontroller::class,'areatype']);

Route::post('trip-filter',[filltercontroller::class,'sortbyfilter'])->name('trip-filter'); 

Route::post('review-store',[reviewcontroller::class,'store'])->name('review-store'); 

Route::post('typeby-filter',[filltercontroller::class,'typebyfilter'])->name('typeby-filter');


Route::group(['middleware' => ['auth']], function (){

Route::get('user/profile', [userprofilecontroller::class,'index']);

Route::post('booking', [bookingcontroller::class, 'booking'])->name('booking');

Route::get('add-trip',[usertripcontroller::class,'add_trip']);

Route::post('addtrip',[usertripcontroller::class,'addtrip'])->name('addtrip');

Route::get('viewtrip',[usertripcontroller::class,'viewtrip']);

Route::get('trip-edit/{id}',[usertripcontroller::class,'edit'])->name('trip-edit');

Route::delete('trip-destroy/{id}',[usertripcontroller::class,'destroy'])->name('trip-destroy');

Route::put('trip-update/{id}',[usertripcontroller::class,'update'])->name('trip-update');

Route::get('day',[userdaycontroller::class,'index']);

Route::get('add-day',[userdaycontroller::class,'create']);
 
Route::post('day-store',[userdaycontroller::class,'store'])->name('day-store');

Route::get('day-edit/{id}',[userdaycontroller::class,'edit'])->name('day-edit');

Route::delete('day-destory/{id}',[userdaycontroller::class,'day_destory'])->name('day-destory');

Route::post('itenary-update/{id}',[userdaycontroller::class,'update'])->name('itenary-update');

Route::get('booking',[bookingcontroller::class,'index']);

Route::get('booking-details/{id}',[bookingcontroller::class,'details']);

Route::get('booking-delete/{id}',[bookingcontroller::class,'booking_delete'])->name('booking-delete');

Route::get('manage-companion/{id}',[companioncontroller::class,'index']);

Route::get('addcompanion/{id}',[companioncontroller::class,'create']);

Route::post('add-companion',[companioncontroller::class,'store'])->name('add-companion');

Route::post('add-companion',[companioncontroller::class,'store'])->name('add-companion');

Route::get('edit-profile',[userprofilecontroller::class,'edit']);

Route::post('update-profile',[userprofilecontroller::class,'update'])->name('update-profile');
});

Route::group(['middleware' => ['auth:admin']], function (){
Route::prefix('admin')->name('admin.')->group(function (){
Route::get('/',[dashboardcontroller::class,'index']);
Route::resource('type',typecontroller::class);
Route::resource('specialfeature',specialfeaturecontroller::class);
Route::resource('locationtype',locationtypecontroller::class);
Route::resource('areatype',areatypecontroller::class);
Route::resource('coupon',couponcontroller::class);
Route::resource('banner',bannercontroller::class);
Route::post('banner-type', [bannercontroller::class, 'banner_type'])->name('banner-type');
Route::resource('information',informationcontroller::class);
Route::resource('itenary',daycontroller::class);

Route::post('trip-recommended',[tripcontroller::class,'recommended'])->name('trip-recommended');

Route::get('booking',[adminbookingcontroller::class,'index'])->name('booking');

Route::get('booking-view/{id}',[adminbookingcontroller::class,'booking_view'])->name('booking-view');

Route::resource('trip',tripcontroller::class);
Route::post('register',[admincontroller::class,'register']);


Route::prefix('about')->name('about.')->group(function(){
Route::get('/', [aboutcontroller::class, 'index'])->name('index');
Route::post('store', [aboutcontroller::class,'store'])->name('store');
});

Route::prefix('privacy-policy')->name('privacy-policy.')->group(function(){
Route::get('/', [privacycontroller::class, 'index'])->name('index');
Route::post('store', [privacycontroller::class,'store'])->name('store');
});

Route::prefix('return-policy')->name('return-policy.')->group(function(){
Route::get('/', [retrurnpolicycontroller::class, 'index'])->name('index');
Route::post('store', [retrurnpolicycontroller::class,'store'])->name('store');
});

Route::prefix('term-condition')->name('term-condition.')->group(function(){
Route::get('/', [termconditioncontroller::class,'index'])->name('index');
Route::post('store', [termconditioncontroller::class,'store'])->name('store');
});

Route::prefix('logo-partner')->name('logo-partner.')->group(function(){
Route::get('/', [logopartner::class,'index'])->name('index');
Route::get('create', [logopartner::class,'create']);
Route::post('store', [logopartner::class,'store'])->name('store');
Route::get('edit/{id}',[logopartner::class,'edit']);
Route::post('update/{id}',[logopartner::class,'update'])->name('update');
Route::get('delete/{id}',[logopartner::class,'delete']);
});

Route::prefix('general-setting')->name('general-setting.')->group(function(){
Route::get('/', [generalsettingcontroller::class,'index'])->name('index');
Route::post('store', [generalsettingcontroller::class,'store'])->name('store');
});

Route::prefix('newsletter')->name('newsletter.')->group(function(){
Route::get('/',[newslettercontroller::class,'index'])->name('index');
Route::get('delete/{id}',[newslettercontroller::class,'delete'])->name('delete');


});
    
});
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('admin/store',[adminlogincontroller::class,'store']);