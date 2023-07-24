<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\apiareatypecontroller;
use App\Http\Controllers\api\locationtypecontroller;
use App\Http\Controllers\api\specialfeaturecontroller;
use App\Http\Controllers\api\bannercontroller;
use App\Http\Controllers\api\inforamationcontroller;
use App\Http\Controllers\api\travellercontroller;
use App\Http\Controllers\api\travelgroupcontroller;
use App\Http\Controllers\api\proofidentitiecontroller;
use App\Http\Controllers\api\socialmediacontroller;
use App\Http\Controllers\api\tripcontroller;
use App\Http\Controllers\api\supportticketcontroller;
use App\Http\Controllers\api\reviewtravelcontroller;
use App\Http\Controllers\api\reviewstripcontroller;
use App\Http\Controllers\apilogincontroller;
use App\Http\Controllers\api\apitypecontroller;
use App\Http\Controllers\api\bookingcontroller;
use App\Http\Controllers\api\userregistercontroller;
use App\Http\Controllers\api\daycontroller;
use App\Http\Controllers\api\faqcontroller;
use App\Http\Controllers\api\companyinfocontroller;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function () {
    
Route::get('type/view',[apitypecontroller::class, 'index']);

Route::post('trip/add',[tripcontroller::class,'add']);

Route::post('day/add',[daycontroller::class,'add']);


Route::get('type/singleview/{id}', [apitypecontroller::class, 'single']);

Route::get('travel-group/triplist/{id}',[tripcontroller::class,'triplist']);

Route::get('travel-group/booking/{id}',[bookingcontroller::class,'travelgroup']);

Route::get('travel/booking/{id}',[bookingcontroller::class,'travel']);

Route::get('areatype/view', [apiareatypecontroller::class, 'index']);

Route::get('day/view/{id}', [daycontroller::class, 'index']);

Route::get('faq/view/{id}', [faqcontroller::class, 'index']);

//    Route::get('areatype/singleview/{id}', [apiareatypecontroller::class, 'single']);

Route::get('locationtype/view', [locationtypecontroller::class, 'index']);

Route::get('locationtype/singleview/{id}', [locationtypecontroller::class, 'single']);

Route::get('specialfeature/view', [specialfeaturecontroller::class, 'index']);

Route::get('specialfeature/singleview/{id}', [specialfeaturecontroller::class, 'single']);

Route::get('banner/view', [bannercontroller::class, 'index']);

Route::get('information/view', [inforamationcontroller::class, 'index']);

Route::get('coupon/view', [inforamationcontroller::class, 'index']);

Route::get('coupon/singleview/{id}', [inforamationcontroller::class, 'index']);

    // Route::post('travel/update/{id}',[travellercontroller::class,'update']);


    Route::post('traveller/edit/{id}', [travellercontroller::class, 'update']);

    Route::post('travel-group/edit/{id}', [travelgroupcontroller::class, 'update']);

    Route::post('proof-identity/add', [proofidentitiecontroller::class, 'store']);

    Route::post('proof-identity/edit/{id}', [proofidentitiecontroller::class, 'update']);

    Route::get('proof-identity/delete/{id}', [proofidentitiecontroller::class, 'delete']);

    Route::post('social-media/add', [socialmediacontroller::class, 'store']);

    Route::post('social-media/edit/{id}', [socialmediacontroller::class, 'update']);

    Route::get('social-media/delete/{id}', [socialmediacontroller::class, 'delete']);

    Route::get('travel-group/view', [travelgroupcontroller::class, 'view']);

    Route::get('traveller/view', [travellercontroller::class, 'view']);

    Route::get('traveller/sigleview/{id}', [travellercontroller::class, 'singleview']);

    Route::get('traveller/delete/{id}', [travellercontroller::class, 'delete']);

    Route::get('travel-group/sigleview/{id}', [travelgroupcontroller::class, 'singleview']);

    Route::get('travel-group/delete/{id}', [travelgroupcontroller::class, 'delete']);

    Route::get('proof-identity/view/{id}', [proofidentitiecontroller::class, 'view']);

    Route::get('social-media/view/{id}', [socialmediacontroller::class, 'view']);

    Route::get('trip/view', [tripcontroller::class, 'view']);

    Route::get('trip/singleview/{id}', [tripcontroller::class, 'singleview']);

    Route::post('support-ticket/add', [supportticketcontroller::class, 'store']);

    Route::post('support-ticket/edit/{id}', [supportticketcontroller::class, 'update']);

    Route::get('support-ticket/delete/{id}', [supportticketcontroller::class, 'delete']);

    Route::get('support-ticket/view/{id}', [supportticketcontroller::class, 'view']);

    Route::post('reviews-trips/add', [reviewtravelcontroller::class, 'store']);

    Route::get('reviews-trips/view/{id}', [reviewtravelcontroller::class, 'view']);

    Route::post('companyinfo/add', [companyinfocontroller::class, 'store']);

    Route::get('companyinfo/view/{id}', [companyinfocontroller::class, 'view']);


    Route::post('reviews-travelgroup/add', [reviewstripcontroller::class, 'store']);

    Route::get('reviews-travelgroup/view/{id}', [reviewstripcontroller::class, 'view']);

    Route::post('booking/add',[bookingcontroller::class, 'store']);

    Route::get('booking/view',[bookingcontroller::class, 'view']);

    Route::post('edit-profile/{id}',[userregistercontroller::class,'update']);

    Route::post('resetpassword',[userregistercontroller::class,'resetpassword']);
   
});

Route::post('login',[apilogincontroller::class,'apilogin']);

Route::post('register',[userregistercontroller::class,'store']);