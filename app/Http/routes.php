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

      Route::post('/', [
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

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// ==================================================== PRINCIPAL =================================================
    Route::get('/principal', [
        'uses' => '\CTFlor\Http\Controllers\HomeController@principal',
        'as' => 'controle.principal',
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
    ]);

    Route::post('/event', [
        'uses'  => '\CTFlor\Http\Controllers\EventController@store',
    ]);

    Route::get('/event/delete', [
        'uses' => '\CTFlor\Http\Controllers\EventController@deleteRegister',
        'as' => 'crud.event.delete',
    ]);

    Route::post('/event/delete', [
        'uses' => '\CTFlor\Http\Controllers\EventController@deleteRegister',
    ]);
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




// ==================================================== ACTIVITY ==================================================
    Route::get('/activity', [
    	'uses' 	=> '\CTFlor\Http\Controllers\ActivityController@activityIndex',
    	'as' 	=> 'crud.activity',
    ]);

    Route::post('/activity', [
    	'uses' 	=> '\CTFlor\Http\Controllers\ActivityController@store',
    ]);

    Route::get('/activity/delete', [
        'uses' => '\CTFlor\Http\Controllers\ActivityController@deleteRegister',
        'as' => 'crud.activity.delete',
    ]);

    Route::post('/activity/delete', [
        'uses' => '\CTFlor\Http\Controllers\ActivityController@deleteRegister',
    ]);

    // -----------------------------------------------

    Route::get('/subscribingactivity', [
        'uses' 	=> '\CTFlor\Http\Controllers\ActivityController@insc',
    	'as' 	=> 'associacao.subscribingactivity',
    ]);

    Route::post('/subscribingactivity', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscSave',
    ]);

    // -----------------------------------------------

    Route::get('/subscribinglecture', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscLecture',
        'as'    => 'associacao.subscribinglecture',
    ]);

    Route::post('/subscribinglecture', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscLectureSave',
    ]);

    // -----------------------------------------------

    Route::get('/subscribingminicourse', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscMiniCourse',
        'as'    => 'associacao.subscribingminicourse',
    ]);

    Route::post('/subscribingminicourse', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscMiniCourseSave',
    ]);

    // -----------------------------------------------

    Route::get('/subscribingtechnicalvisit', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscTechnicalVisit',
        'as'    => 'associacao.subscribingtechnicalvisit',
    ]);

    Route::post('/subscribingtechnicalvisit', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscTechnicalVisitLectureSave',
    ]);


    Route::get('/subscribing', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@subscribing',
        'as'    => 'subscribing',
    ]);
    /*
    Route::post('/subscribing', [
        'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscTechnicalVisitLectureSave',
    ]);
    */
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




// ==================================================== PARTICIPANT ===============================================
    Route::get('/participant', [
    	'uses' 	=> 'ParticipantController@participantIndex',
    	'as' 	=> 'crud.participant',
    ]);

    Route::post('/participant', [
        'uses'  => 'ParticipantController@store',
    ]);

    Route::get('/participant/delete', [
        'uses' => '\CTFlor\Http\Controllers\ParticipantController@deleteRegister',
        'as' => 'crud.participant.delete',
    ]);

    Route::post('/participant/delete', [
        'uses' => '\CTFlor\Http\Controllers\ParticipantController@deleteRegister',
    ]);

    Route::get('/subscribingP', [
        'uses'  => '\CTFlor\Http\Controllers\ParticipantController@subscribing',
        'as'    => 'subscribingP',
    ]);
    /*
    Route::post('/subscribingP', [
        'uses'  => '\CTFlor\Http\Controllers\ParticipantController@inscTechnicalVisitLectureSave',
    ]);
    */
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




// ==================================================== MATERIAL ==================================================
    Route::get('/material', [
        'uses' => '\CTFlor\Http\Controllers\MaterialController@materialIndex',
        'as' => 'crud.material',
    ]);
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
