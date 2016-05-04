<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use CTFlor\Models\Event;


// ==================================================== EMAIL RESET  ==================================================
    
    // Password reset link request routes...
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');

    // Password reset routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


// ==================================================== USER OPERATIONS ==================================================
    
    Route::get('/operations.alteruserinfo', [
        'uses'  => '\CTFlor\Http\Controllers\OperationsController@getAlterUserInfoView',
        'as'    => 'operations.alteruserinfo',
    ]);

    Route::post('/operations.alteruserinfo', [
        'uses'  => '\CTFlor\Http\Controllers\OperationsController@changeUserInfo',
    ]);

    Route::get('/operations.alterpassword', [
        'uses'  => '\CTFlor\Http\Controllers\OperationsController@getAlterPasswordView',
        'as'    => 'operations.alterpassword',
    ]);

    Route::post('/operations.alterpassword', [
        'uses'  => '\CTFlor\Http\Controllers\OperationsController@changeUserPassword',
    ]);



    Route::get('/operations.activity_subscription', [
        'uses'  => '\CTFlor\Http\Controllers\OperationsController@getActivitySubscriptionView',
        'as'    => 'operations.activity_subscription',
    ]);

    Route::post('/operations.activity_subscription', [
        'uses'  => '\CTFlor\Http\Controllers\OperationsController@changeUserPassword',
    ]);

    Route::get('/operations.mini_course', [
        'uses'  => '\CTFlor\Http\Controllers\OperationsController@getMiniCourseView',
        'as'    => 'operations.mini_course',
    ]);

    Route::post('/operations.mini_course', [
        'uses'  => '\CTFlor\Http\Controllers\OperationsController@changeUserPassword',
    ]);

    Route::get('/operations.technical_visit', [
        'uses'  => '\CTFlor\Http\Controllers\OperationsController@getTechnicalVisitView',
        'as'    => 'operations.technical_visit',
    ]);

    Route::post('/operations.technical_visit', [
        'uses'  => '\CTFlor\Http\Controllers\OperationsController@changeUserPassword',
    ]);


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



// ==================================================== SITE ======================================================

    Route::get('/site', [
      'uses' => '\CTFlor\Http\Controllers\HomeController@index',
      'as' => 'home',
    ]);

    Route::post('/site', [
        'uses' => '\CTFlor\Http\Controllers\HomeController@post',
    ]);

    Route::get('/',  [
        'uses' => '\CTFlor\Http\Controllers\SiteController@indexPage',
        'as' => 'site',
    ]);

    Route::get('/site.local', [
        'uses' => '\CTFlor\Http\Controllers\SiteController@localPage',
        'as' => 'site.local',
    ]);

    Route::get('/site.programacao', [
        'uses' => '\CTFlor\Http\Controllers\SiteController@programacaoPage',
        'as' => 'site.programacao',
    ]);

    Route::get('/site.subscribe', [
        'uses' => '\CTFlor\Http\Controllers\SiteController@subscribePage',
        'as' => 'site.subscribe',
    ]);

    Route::get('/site.login', [
        'uses' => '\CTFlor\Http\Controllers\SiteController@loginPage',
        'as' => 'site.login',
    ]);

    Route::get('/site.packages', [
        'uses' => '\CTFlor\Http\Controllers\SiteController@packagesPage',
        'as' => 'site.packages',
    ]);

    Route::get('/site.signout', [
        'uses' => '\CTFlor\Http\Controllers\SiteController@signout',
        'as' => 'site.signout',
    ]);


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// ==================================================== PRINCIPAL =================================================
    Route::get('/principal', [
        'uses' => '\CTFlor\Http\Controllers\HomeController@principal',
        'as' => 'controle.principal',
        'middleware' => ['auth'],
    ]);
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




// ==================================================== ALERTS ====================================================
    Route::get('/alerts', function(){
    	return redirect()->route('home')->with('info', 'You have not signed up!');
    });
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++





// ==================================================== EVENTS ====================================================
    Route::get('/event', [
        'uses'  => '\CTFlor\Http\Controllers\EventController@eventIndex',
        'as'    => 'crud.event',
        'middleware' => ['role'],
    ]);

    Route::post('/event', [
        'uses'  => '\CTFlor\Http\Controllers\EventController@store',
        'middleware' => ['role'],
    ]);

    Route::get('/event/search', [
        'uses'  => '\CTFlor\Http\Controllers\EventController@searchEvent',
        'as'    => 'crud.event.search',
        'middleware' => ['role'],
    ]);

    Route::post('/event/search', [
        'uses'  => '\CTFlor\Http\Controllers\EventController@searchEvent',
        'middleware' => ['role'],
    ]);


    Route::get('/event/delete', [
        'uses' => '\CTFlor\Http\Controllers\EventController@deleteRegister',
        'as' => 'crud.event.delete',
        'middleware' => ['role'],
    ]);

    Route::post('/event/delete', [
        'uses' => '\CTFlor\Http\Controllers\EventController@deleteRegister',
        'middleware' => ['role'],
    ]);
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




// ==================================================== ACTIVITY ==================================================
    Route::get('/activity', [
    	'uses' 	=> '\CTFlor\Http\Controllers\ActivityController@activityIndex',
    	'as' 	=> 'crud.activity',
        'middleware' => ['role'],
    ]);

    Route::post('/activity', [
    	'uses' 	=> '\CTFlor\Http\Controllers\ActivityController@store',
      'middleware' => ['role'],
    ]);

    Route::get('/activity/delete', [
        'uses' => '\CTFlor\Http\Controllers\ActivityController@deleteRegister',
        'as' => 'crud.activity.delete',
        'middleware' => ['role'],
    ]);

    Route::post('/activity/delete', [
        'uses' => '\CTFlor\Http\Controllers\ActivityController@deleteRegister',
        'middleware' => ['role'],
    ]);

    Route::get('/activity/search', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@searchActivity',
        'as'    => 'crud.activity.search',
        'middleware' => ['role'],
    ]);

    Route::post('/activity/search', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@searchActivity',
        'middleware' => ['role'],
    ]);

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



// ==================================================== SUBSCRIPTION ==============================================

    // =============== ACTIVITY ==============

    Route::get('/subscribingactivity', [
        'uses' 	=> '\CTFlor\Http\Controllers\ActivityController@insc',
    	'as' 	=> 'associacao.subscribingactivity',
        'middleware' => ['role'],
    ]);

    Route::post('/subscribingactivity', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscSave',
        'middleware' => ['role'],
    ]);

    // =============== LECTURE ==============

    Route::get('/subscribinglecture', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscLecture',
        'as'    => 'associacao.subscribinglecture',
        'middleware' => ['role'],
    ]);

    Route::post('/subscribinglecture', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscLectureSave',
        'middleware' => ['role'],
    ]);

    // =============== MINI-COURSE ==============

    Route::get('/subscribingminicourse', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscMiniCourse',
        'as'    => 'associacao.subscribingminicourse',
        'middleware' => ['role'],
    ]);

    Route::post('/subscribingminicourse', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscMiniCourseSave',
        'middleware' => ['role'],
    ]);

    // =============== TECHNICAL VISIT ==============

    Route::get('/subscribingtechnicalvisit', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscTechnicalVisit',
        'as'    => 'associacao.subscribingtechnicalvisit',
        'middleware' => ['role'],
    ]);

    Route::post('/subscribingtechnicalvisit', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscTechnicalVisitLectureSave',
        'middleware' => ['role'],
    ]);


    Route::get('/subscribing', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@subscribing',
        'as'    => 'subscribing',
        'middleware' => ['role'],
    ]);

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




// ==================================================== PARTICIPANT ===============================================
    Route::get('/participant', [
    	'uses' 	=> 'ParticipantController@participantIndex',
    	'as' 	=> 'crud.participant',
        'middleware' => ['role'],
    ]);

    Route::post('/participant', [
        'uses'  => 'ParticipantController@store',
        //'middleware' => ['role'],
    ]);

    Route::get('/participant/delete', [
        'uses' => '\CTFlor\Http\Controllers\ParticipantController@deleteRegister',
        'as' => 'crud.participant.delete',
        'middleware' => ['role'],
    ]);

    Route::post('/participant/delete', [
        'uses' => '\CTFlor\Http\Controllers\ParticipantController@deleteRegister',
        'middleware' => ['role'],
    ]);

    Route::get('/participant/search', [
        'uses'  => '\CTFlor\Http\Controllers\ParticipantController@searchParticipant',
        'as'    => 'crud.participant.search',
        'middleware' => ['role'],
    ]);

    Route::post('/participant/search', [
        'uses'  => '\CTFlor\Http\Controllers\ParticipantController@searchParticipant',
        'middleware' => ['role'],
    ]);

    Route::get('/subscribingP', [
        'uses'  => '\CTFlor\Http\Controllers\ParticipantController@subscribing',
        'as'    => 'subscribingP',
        'middleware' => ['role'],
    ]);
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




// ==================================================== MATERIAL ==================================================
    Route::get('/material', [
        'uses' => '\CTFlor\Http\Controllers\MaterialController@materialIndex',
        'as' => 'crud.material',
        'middleware' => ['auth'],
    ]);

    Route::post('/material', [
        'uses' => '\CTFlor\Http\Controllers\MaterialController@store',
        'middleware' => ['auth'],
    ]);

    Route::get('/material/search', [
        'uses'  => '\CTFlor\Http\Controllers\MaterialController@searchMaterial',
        'as'    => 'crud.material.search',
        'middleware' => ['auth'],
    ]);

    Route::post('/material/search', [
        'uses'  => '\CTFlor\Http\Controllers\MaterialController@searchMaterial',
        'middleware' => ['auth'],
    ]);

    Route::post('/material/delete', [
        'uses' => '\CTFlor\Http\Controllers\MaterialController@deleteRegister',
        'as' => 'crud.material.delete',
        'middleware' => ['role'],
    ]);


    Route::post('/material/download', [
        'uses'  => '\CTFlor\Http\Controllers\MaterialController@getMaterial',
        'as'    => 'crud.material.get',
        'middleware' => ['auth'],
    ]);

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// ==================================================== BOARD ==================================================
    Route::get('/board', [
        'uses' => '\CTFlor\Http\Controllers\BancaAvaliadoraController@bancaIndex',
        'as' => 'crud.banca',
        'middleware' => ['role'],
    ]);

    Route::post('/board', [
        'uses' => '\CTFlor\Http\Controllers\BancaAvaliadoraController@store',
        'middleware' => ['role'],
    ]);

    Route::get('/board/search', [
        'uses'  => '\CTFlor\Http\Controllers\BancaAvaliadoraController@searchBoard',
        'as'    => 'crud.banca.search',
        'middleware' => ['role'],
    ]);

    Route::post('/board/search', [
        'uses'  => '\CTFlor\Http\Controllers\BancaAvaliadoraController@searchBoard',
        'middleware' => ['role'],
    ]);

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




// ==================================================== PACKAGES ==================================================

    Route::get('/packages', [
        'uses' => '\CTFlor\Http\Controllers\PagesController@packageIndex',
        'as' => 'packages',
    ]);

    Route::post('/packages', [
        'uses' => '\CTFlor\Http\Controllers\PagesController@store',
    ]);

    Route::get('/packages/search', [
        'uses' => '\CTFlor\Http\Controllers\PagesController@packageSelectedIndex',
        'as' => 'packages.search'
    ]);

    Route::post('/packages/search', [
        'uses' => '\CTFlor\Http\Controllers\PagesController@packageSelectedIndex',
    ]);
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++






// ==================================================== PAYMENT ==================================================
    Route::get('/site.payment', [
        'uses' => '\CTFlor\Http\Controllers\PaymentController@paymentIndex',
        'as' => 'site.payment',
        'middleware' => ['auth'],
    ]);

    Route::post('/site.payment', [
        'uses' => '\CTFlor\Http\Controllers\PaymentController@store',
        'middleware' => ['auth'],
    ]);
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
