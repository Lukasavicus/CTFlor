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

// ==================================================== SYSTEM ======================================================
    Route::get('/site', [
      'uses' => '\CTFlor\Http\Controllers\HomeController@index',
      'as' => 'home',
    ]);

    Route::post('/site', [
        'uses' => '\CTFlor\Http\Controllers\HomeController@post',
    ]);
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


// ==================================================== SITE ======================================================


    Route::get('/', [
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

    Route::get('/site.signout', [
    function(){
        Auth::logout();
        return redirect()->route('home')->with('info', 'Good bye and come back soon. :)');
    },
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
        'middleware' => ['auth'],
    ]);

    Route::post('/event', [
        'uses'  => '\CTFlor\Http\Controllers\EventController@store',
        'middleware' => ['auth'],
    ]);

    Route::get('/event/delete', [
        'uses' => '\CTFlor\Http\Controllers\EventController@deleteRegister',
        'as' => 'crud.event.delete',
        'middleware' => ['auth'],
    ]);

    Route::post('/event/delete', [
        'uses' => '\CTFlor\Http\Controllers\EventController@deleteRegister',
        'middleware' => ['auth'],
    ]);
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




// ==================================================== ACTIVITY ==================================================
    Route::get('/activity', [
    	'uses' 	=> '\CTFlor\Http\Controllers\ActivityController@activityIndex',
    	'as' 	=> 'crud.activity',
        'middleware' => ['auth'],
    ]);

    Route::post('/activity', [
    	'uses' 	=> '\CTFlor\Http\Controllers\ActivityController@store',
        'middleware' => ['auth'],
    ]);

    Route::get('/activity/delete', [
        'uses' => '\CTFlor\Http\Controllers\ActivityController@deleteRegister',
        'as' => 'crud.activity.delete',
        'middleware' => ['auth'],
    ]);

    Route::post('/activity/delete', [
        'uses' => '\CTFlor\Http\Controllers\ActivityController@deleteRegister',
        'middleware' => ['auth'],
    ]);

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// ==================================================== SUBSCRIPTION ==============================================

    // Be careful with this section. This section was deprecated

    Route::get('/subscribingactivity', [
        'uses' 	=> '\CTFlor\Http\Controllers\ActivityController@insc',
    	'as' 	=> 'associacao.subscribingactivity',
        'middleware' => ['auth'],
    ]);

    Route::post('/subscribingactivity', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscSave',
        'middleware' => ['auth'],
    ]);

    // -----------------------------------------------

    Route::get('/subscribinglecture', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscLecture',
        'as'    => 'associacao.subscribinglecture',
        'middleware' => ['auth'],
    ]);

    Route::post('/subscribinglecture', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscLectureSave',
        'middleware' => ['auth'],
    ]);

    // -----------------------------------------------

    Route::get('/subscribingminicourse', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscMiniCourse',
        'as'    => 'associacao.subscribingminicourse',
        'middleware' => ['auth'],
    ]);

    Route::post('/subscribingminicourse', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscMiniCourseSave',
        'middleware' => ['auth'],
    ]);

    // -----------------------------------------------

    Route::get('/subscribingtechnicalvisit', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscTechnicalVisit',
        'as'    => 'associacao.subscribingtechnicalvisit',
        'middleware' => ['auth'],
    ]);

    Route::post('/subscribingtechnicalvisit', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscTechnicalVisitLectureSave',
        'middleware' => ['auth'],
    ]);


    Route::get('/subscribing', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@subscribing',
        'as'    => 'subscribing',
        'middleware' => ['auth'],
    ]);

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




// ==================================================== PARTICIPANT ===============================================
    Route::get('/participant', [
    	'uses' 	=> 'ParticipantController@participantIndex',
    	'as' 	=> 'crud.participant',
        'middleware' => ['auth'],
    ]);

    Route::post('/participant', [
        'uses'  => 'ParticipantController@store',
        'middleware' => ['auth'],
    ]);

    Route::get('/participant/delete', [
        'uses' => '\CTFlor\Http\Controllers\ParticipantController@deleteRegister',
        'as' => 'crud.participant.delete',
        'middleware' => ['auth'],
    ]);

    Route::post('/participant/delete', [
        'uses' => '\CTFlor\Http\Controllers\ParticipantController@deleteRegister',
        'middleware' => ['auth'],
    ]);

    Route::get('/subscribingP', [
        'uses'  => '\CTFlor\Http\Controllers\ParticipantController@subscribing',
        'as'    => 'subscribingP',
        'middleware' => ['auth'],
    ]);
    /*
    Route::post('/subscribingP', [
        'uses'  => '\CTFlor\Http\Controllers\ParticipantController@inscTechnicalVisitLectureSave',
        'middleware' => ['auth'],
    ]);
    */
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

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// ==================================================== AUTHENTICATION ==================================================

// Authentication routes...
/*
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
*/
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
