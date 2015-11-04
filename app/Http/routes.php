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
// ===================== HOME ====================
Route::get('/', [
    'uses' => '\CTFlor\Http\Controllers\HomeController@index',
    'as' => 'home',
]);

Route::post('/', [
    'uses' => '\CTFlor\Http\Controllers\HomeController@post',
]);

// +++++++++++++++++++++++++++++++++++++++++++++++



// ===================== HOME ====================
Route::get('/principal', [
    'uses' => '\CTFlor\Http\Controllers\HomeController@principal',
    'as' => 'principal',
]);
// +++++++++++++++++++++++++++++++++++++++++++++++



// ==================== ALERTS ===================
Route::get('/alerts', function(){
	return redirect()->route('home')->with('info', 'You have signed up!');
});
// +++++++++++++++++++++++++++++++++++++++++++++++



// ==================== TESTES ===================
Route::get('about', 'PagesController@about' );

Route::get('marcos', 'PagesController@teste_marcos');

Route::get('/teste', function(){    return view('teste');   });

Route::get('/senha',  ['uses' => function(){    return view('senha');   }, 'as' => 'senha']);

Route::post('/senha', ['uses' => function(){   dd(bcrypt(Input::get('cpf') ) ); /* return view('senha', ['hashed' => 'HASH-ME']); */  }]);//bcrypt(Input::get('cpf') )
// +++++++++++++++++++++++++++++++++++++++++++++++




// ===================== Events ==================
Route::resource('event', 'EventController');

Route::get('/subscribingevent', [
    'uses'  => '\CTFlor\Http\Controllers\EventController@insc',
    'as'    => 'subscribingevent',
]);
// +++++++++++++++++++++++++++++++++++++++++++++++


// ================= ACTIVITY ====================
Route::get('/activity', [
	'uses' 	=> '\CTFlor\Http\Controllers\ActivityController@activityIndex',
	'as' 	=> 'activity',
]);

Route::post('/activity', [
	'uses' 	=> '\CTFlor\Http\Controllers\ActivityController@store',
]);

Route::get('/activity/delete', [
    'uses' => '\CTFlor\Http\Controllers\ActivityController@deleteRegister',
    'as' => 'activity.delete',
]);

Route::post('/activity/delete', [
    'uses' => '\CTFlor\Http\Controllers\ActivityController@deleteRegister',
]);

Route::get('/subscribingactivity', [
    'uses' 	=> '\CTFlor\Http\Controllers\ActivityController@insc',
	'as' 	=> 'subscribingactivity',
]);

Route::get('/subscribinglecture', [
    'uses'  => '\CTFlor\Http\Controllers\ActivityController@inscLecture',
    'as'    => 'subscribinglecture',
]);
// +++++++++++++++++++++++++++++++++++++++++++++++



// ================ PARTICIPANT ==================
Route::get('/participant', [
	'uses' 	=> 'ParticipantController@participantIndex',
	'as' 	=> 'participant',
]);

Route::post('/participant', [
    'uses'  => 'ParticipantController@store',
]);

Route::get('/participant/delete', [
    'uses' => '\CTFlor\Http\Controllers\ParticipantController@deleteRegister',
    'as' => 'participant.delete',
]);

Route::post('/participant/delete', [
    'uses' => '\CTFlor\Http\Controllers\ParticipantController@deleteRegister',
]);
// +++++++++++++++++++++++++++++++++++++++++++++++
