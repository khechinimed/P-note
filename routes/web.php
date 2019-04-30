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
