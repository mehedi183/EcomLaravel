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
//frontend Route............................
Route::get('/', 'HomeController@index');









//Backend Route............................

Route::get('/admin','AdminController@index')->name('admin_login');
Route::get('/dashboard','AdminController@show_dashboard')->name('show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard')->name('dashboard');
Route::get('/logout','SUperAdminController@logout')->name('admin_logout');


//Category Related Routes

Route::get('/all_category','CategoriesController@index')->name('all_category');
Route::get('/add_category','CategoriesController@add_category')->name('add_category');
Route::post('/store_category','CategoriesController@store_category')->name('store_category');
Route::get('/change_category_publication_status/{category_id}','CategoriesController@change_category_publication_status')->name('change_category_publication_status');