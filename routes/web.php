<?php

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

Route::get('/', 'PagesController@index');
Route::get('/index', 'PagesController@index');

Route::get('/create', 'IndexController@note_index');

Route::get('/note-link', 'NoteController@linkview');
Route::post('/note-link', ['as' => 'note-link', 'uses' => 'NoteController@linkview_form']);



Route::post('/message', ['as'=>'message','uses'=>'NoteController@hidden_form']);

Route::get('/message', 'NoteController@view_notes');

Route::get('/message/{id}', 'NoteController@hide_notes');

Route::get('/view-message/{id}', 'NoteController@notes');

Route::get('/view-message/{id}/{access}/{token}', 'NoteController@another_notes');

Route::get('/view-message/{id}/{destroy}', 'NoteController@destroy_notes');
Auth::routes();



/* Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function() {*/

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin','Admin\DashboardController@index');
    Route::get('/admin/index','Admin\DashboardController@index');

	/* user */
	Route::get('/admin/users','Admin\UsersController@index');
	Route::get('/admin/adduser','Admin\AdduserController@formview');
	Route::post('/admin/adduser', ['as'=>'admin.adduser','uses'=>'Admin\AdduserController@adduserdata']);

	Route::get('/admin/users/{id}','Admin\UsersController@destroy');
	Route::get('/admin/edituser/{id}','Admin\EdituserController@showform');
	Route::post('/admin/edituser', ['as'=>'admin.edituser','uses'=>'Admin\EdituserController@edituserdata']);
	/* end user */







	/* pages */

	Route::get('/admin/pages','Admin\PagesController@index');
	Route::get('/admin/edit-page/{id}','Admin\PagesController@showform');
	Route::post('/admin/edit-page', ['as'=>'admin.edit-page','uses'=>'Admin\PagesController@pagedata']);

	/* end pages */

	/* notes */

	Route::get('/admin/notes','Admin\PagesController@view_notes');
	Route::get('/admin/notes/{id}','Admin\PagesController@view_delete');
	Route::post('/admin/notes', ['as'=>'admin.notes','uses'=>'Admin\PagesController@delete_all']);
	/* end notes */



	/* start settings */

	Route::get('/admin/settings','Admin\SettingsController@showform');
	Route::post('/admin/settings', ['as'=>'admin.settings','uses'=>'Admin\SettingsController@editsettings']);

	/* end settings */


});
