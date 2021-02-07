<?php

// Test
Route::get('/create', 'HomeController@create')->name('create');
Route::get('/show', 'HomeController@show')->name('show');
Route::get('/change_language', 'HomeController@changeLanguage')->name('change.language');
Route::get('/new', 'HomeController@new')->name('new');
Route::get('/table', 'HomeController@table')->name('table');
// End test

Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UsersController');
Route::get('users/block/{user}', 'UsersController@block')->name('users.block');
Route::get('users/unblock/{user}', 'UsersController@unBlock')->name('users.unblock');
Route::resource('adCategories', 'AdCategoryController');
Route::resource('governorates', 'GovernorateController');
Route::resource('cities', 'CityController');
Route::resource('blocks', 'BlockController');
Route::resource('features', 'FeatureController');

Route::resource('questions', 'QuestionController');

Route::resource("sliders", "SlidersController");
Route::get('sliders/makeAsPending/{slider}', 'SlidersController@makeAsPending')->name('sliders.makeAsPending');
Route::get('sliders/makeAsActive/{slider}', 'SlidersController@makeAsActive')->name('sliders.makeAsActive');

Route::get('message/', 'MessageController@index')->name('message.index');
Route::get('message/{message}', 'MessageController@show')->name('message.show');
Route::get('message/makeRead/{message}', 'MessageController@makeAsRead')->name('message.makeAsRead');
Route::put('message/replyNotification/{message}', 'MessageController@replyNotification')->name('message.replyNotification');
Route::put('message/replySMS/{message}', 'MessageController@replySMS')->name('message.replySMS');
Route::put('message/replyEmail/{message}', 'MessageController@replyEmail')->name('message.replyEmail');

Route::get('complaint/', 'complaintController@index')->name('complaint.index');
Route::get('complaint/{complaint}', 'ComplaintController@show')->name('complaint.show');
Route::get('complaint/makeRead/{complaint}', 'ComplaintController@makeAsRead')->name('complaint.makeAsRead');
Route::put('complaint/replyNotification/{complaint}', 'ComplaintController@replyNotification')->name('complaint.replyNotification');
Route::put('complaint/replySMS/{complaint}', 'ComplaintController@replySMS')->name('complaint.replySMS');
Route::put('complaint/replyEmail/{complaint}', 'ComplaintController@replyEmail')->name('complaint.replyEmail');

Route::get('settings/general', 'SettingController@general')->name('settings.general');
Route::get('settings/social', 'SettingController@social')->name('settings.social');
Route::get('settings/api', 'SettingController@api')->name('settings.api');
Route::put('settings/Site', 'SettingController@update')->name('settings.update');
