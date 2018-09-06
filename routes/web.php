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


Route::get('/registration', 'RegisterController@index');
Route::post('/registration', 'RegisterController@register');

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login');

Route::get('/', 'UserController@list');
Route::get('/user/{id}-{name}', 'UserController@show');
Route::get('/user/{id}-{name}/threads', 'UserController@showThreads');
Route::get('/user/{id}-{name}/replies', 'UserController@showReplies');
Route::post('/user/{id}-{name}/favorite', 'UserController@favorite');
Route::put('/user/{id}-{name}/action/role/moderator', 'UserController@addModeratorRole');
Route::put('/user/{id}-{name}/action/role/member', 'UserController@removeModeratorRole');


Route::get('/dashboard', 'DashboardController@index');
Route::get('/notifications', 'DashboardController@notificationView');
Route::get('/parameters', 'DashboardController@indexNewPassword');
Route::post('/new-password', 'DashboardController@saveNewPassword');
Route::get('/logout', 'DashboardController@logout');
Route::post('/modify-avatar', 'DashboardController@modifyAvatar');
Route::post('/background-profil', 'DashboardController@modifyBackground');
Route::get('/wall-message/new', 'DashboardController@newWallMessageView');
Route::post('/wall-message/new', 'DashboardController@newWallMessage');

Route::get('/new-thread', 'ThreadController@create');
Route::post('/new-thread', 'ThreadController@store');
Route::get('/channel/{slug}/new-thread', 'ThreadController@create');
Route::post('/channel/{slug}/new-thread', 'ThreadController@store');

Route::get('/forum', 'ChannelController@index');
Route::get('/channel/{slug}', 'ChannelController@indexOfOneChannel');
Route::get('/channel/action/create', 'ChannelController@indexCreate');
Route::post('/channel/action/create', 'ChannelController@create');
Route::get('/channel/action/{slug}/update', 'ChannelController@indexupdate');
Route::post('/channel/action/{slug}/update', 'ChannelController@update');
Route::delete('/channel/action/{slug}/delete', 'ChannelController@delete');
Route::post('/channel/action/{slug}/favorite', 'ChannelController@favorite');
Route::delete('/channel/action/{slug}/favorite', 'ChannelController@deleteFavorite');


Route::get('/threads', 'ThreadController@index');
Route::get('/thread/{id}', 'ThreadController@indexOfOneThread');
Route::post('/thread/{id}', 'ReplyController@store');
Route::delete('/thread/{id}/delete', 'ThreadController@delete');
Route::get('/thread/{id}/update', 'ThreadController@updateView');
Route::post('/thread/{id}/update', 'ThreadController@update');
Route::post('/thread/{id}/favorite', 'ThreadController@favorite');
Route::delete('/thread/{id}/favorite', 'ThreadController@deleteFavorite');

Route::get('/thread/{id}/reply/{reply_id}/update', 'ReplyController@updateView');
Route::post('/thread/{id}/reply/{reply_id}/update', 'ReplyController@update');
Route::delete('/thread/{id}/reply/{reply_id}/delete', 'ReplyController@delete');

Route::get('/search', 'SearchController@show');