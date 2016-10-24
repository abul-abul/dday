<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


//================user
//=================Login
Route::get('/','UsersController@getHome');
Route::get('user/login-registration','UsersController@getLoginReg');
Route::post('user/registration','UsersController@postRegistration');
Route::post('user/login','UsersController@postLogin');
Route::get('user/dashbord','UsersController@getDeshbord');

Route::get('user/facebook-login','UsersController@getFacebookLogin');
Route::get('user/facebook-callback','UsersController@getFacebookCallback');

Route::get('user/twitter-login','UsersController@getTwitterLogin');
Route::get('user/twitter-callback','UsersController@getTwitterCallback');

Route::get('user/google-login','UsersController@getGoogleLogin');
Route::get('user/google-callback','UsersController@getGoogleCallback');
//=================End

//================ end user







//================Admin
Route::get('ab-admin','AdminController@getLogin');
Route::post('ab-admin/login','AdminController@postLogin');
Route::get('ab-admin/dashboard','AdminController@getDashboard');
Route::get('ab-admin/login','AdminController@getLogout');


//================Article
Route::get('ab-admin/log-out','AdminController@getAddArticle');
Route::get('ab-admin/article','AdminController@getAddArticle');
Route::get('ab-admin/article-list','AdminController@getArticleList');
Route::post('ab-admin/article-add','AdminController@postAddArticle');
Route::post('ab-admin/article-uploade','AdminController@postUploadeArticleAjax');
Route::get('ab-admin/article-delete/{id}','AdminController@getDeleteArticle');
Route::get('ab-admin/article-edit/{id}','AdminController@getEditArticle'); 
Route::post('ab-admin/article-update/','AdminController@postUpdateArticle'); 
Route::post('ab-admin/add-youtube/','AdminController@postAddYoutbeVideo'); 

//================End Article

Route::get('ab-admin/youtube','AdminController@getYoutube'); 
Route::get('ab-admin/youtube/{id}','AdminController@getDeleteYoutube'); 
Route::get('ab-admin/youtube-edit/{id}','AdminController@getEditYoutubeVideo'); 
Route::get('ab-admin/youtube-edit','AdminController@getGallery'); 