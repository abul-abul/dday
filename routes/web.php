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
Route::get('/','UsersController@getStartAngular');
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
Route::post('user/add-message','UsersController@postAddMessage');

Route::get('video','UsersController@getVideo');
//=================End

//================ end user


Route::get('paypal','PaymentController@getPayPal');
Route::get('paypal/response','PaymentController@getPaypalReturnResponse');
Route::get('paypal/response/cancel','PaymentController@getPaypalCancelResponse');





//================Admin
Route::get('ab-admin','AdminController@getLogin');
Route::post('ab-admin/login','AdminController@postLogin');
Route::get('ab-admin/dashboard','AdminController@getDashboard');
Route::get('ab-admin/login-out','AdminController@getLogout');


//================Article
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
Route::post('ab-admin/youtube-autoplay','AdminController@postAutoplay'); 

Route::get('ab-admin/gallery-list','AdminController@getGallery'); 
Route::get('ab-admin/add-gallery','AdminController@getAddGallery'); 
Route::post('ab-admin/add-gallery','AdminController@postAddGallery'); 
Route::get('ab-admin/delete-gallery/{id}','AdminController@getDeleteGallery'); 
Route::post('ab-admin/gallery-image-edit','AdminController@posteditGalleryImages'); 
Route::get('ab-admin/crop-image/{id}','AdminController@getCropImage'); 
Route::post('ab-admin/crop-image','AdminController@postCropImages'); 
Route::post('ab-admin/crop-image-update','AdminController@postUpdeCropImage'); 
Route::post('ab-admin/resize-image','AdminController@postResizeimage'); 

Route::get('ab-admin/add-page','AdminController@getAddPage'); 
Route::get('ab-admin/page-list','AdminController@getPageList'); 
Route::post('ab-admin/add-page','AdminController@postAddPage'); 
Route::get('ab-admin/add-submenu','AdminController@getSubMenu'); 
Route::post('ab-admin/add-submenu','AdminController@postAddSubmenu');
Route::get('ab-admin/add-page-delete/{id}','AdminController@getDeletePage');


Route::get('ab-admin/language','AdminController@getLanguage');
Route::post('ab-admin/add-language','AdminController@postAddLanguage');
Route::get('ab-admin/language-list','AdminController@getLanguageList');
Route::get('ab-admin/language-delete/{id}','AdminController@getDeleteLanguage');



