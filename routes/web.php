<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','front\Post@home');
Route::get('/post/{id}','front\Post@post');
Route::get('/page/{id}','front\Post@page');


Route::view('/admin/login','admin.login');
Route::post('/admin/login_submit','Admin_auth@login_submit');

Route::get('/admin/logout', function () {
    session()->forget('BLOG_USER_ID');
	return redirect('/admin/login');
});

Route::group(['middleware'=>['admin_auth']],function(){
	Route::get('/admin/post/list','admin\Post@listing');
	Route::view('/admin/post/add','admin.post.add');	
	Route::post('/admin/post/submit','admin\Post@submit');
	Route::get('/admin/post/delete/{id}','admin\Post@delete');
	Route::get('/admin/post/edit/{id}','admin\Post@edit');
	Route::post('/admin/post/update/{id}','admin\Post@update');
	
	Route::get('/admin/page/list','admin\Page@listing');
	Route::view('/admin/page/add','admin.page.add');	
	Route::post('/admin/page/submit','admin\Page@submit');
	Route::get('/admin/page/delete/{id}','admin\Page@delete');
	Route::get('/admin/page/edit/{id}','admin\Page@edit');
	Route::post('/admin/page/update/{id}','admin\Page@update');
	
	Route::get('/admin/contact/list','admin\Contact@listing');
});