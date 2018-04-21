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
	Route::post('/admin-dashboard','AdminController@dashboard')->name('dashboard');
	Route::get('/dashboard','AdminController@show_dashboard')->name('show_dashboard')->middleware('AuthAdminCheck');
	Route::get('/logout','SuperAdminController@logout')->name('admin_logout')->middleware('AuthAdminCheck');
	
Route::group(['middleware' => 'AuthAdminCheck'], function () {

	//Category Related Routes

	Route::get('/all_category','CategoriesController@index')->name('all_category');
	Route::get('/add_category','CategoriesController@add_category')->name('add_category');
	Route::get('/edit_category/{category_id}','CategoriesController@edit_category')->name('edit_category');
	Route::post('/update_category/{category_id}','CategoriesController@update_category')->name('update_category');
	Route::post('/store_category','CategoriesController@store_category')->name('store_category');
	Route::get('/delete_category/{category_id}', 'CategoriesController@delete_category')->name('delete_category');
	Route::get('/change_category_publication_status/{category_id}','CategoriesController@change_category_publication_status')									->name('change_category_publication_status');



	//Brand Related Route

	Route::get('/all_brand','BrandsController@index')->name('all_brand');
	Route::get('/add_brand','BrandsController@add_brand')->name('add_brand');
	Route::get('/edit_brand/{manufacture_id}','BrandsController@edit_brand')->name('edit_brand');
	Route::post('/update_brand/{manufacture_id}','BrandsController@update_brand')->name('update_brand');
	 Route::post('/store_brand','BrandsController@store_brand')->name('store_brand');
	Route::get('/delete_brand/{manufacture_id}', 'BrandsController@delete_brand')->name('delete_brand');
	Route::get('/change_brand_publication_status/{manufacture_id}','BrandsController@change_brand_publication_status')											->name('change_brand_publication_status');
	///Product related route

	Route::get('/all_products','ProductsController@index')->name('all_products');
	Route::get('/add_products','ProductsController@add_products')->name('add_products');
	Route::post('/store_products','ProductsController@store_products')->name('store_products');
	Route::get('/change_product_publication_status/{product_id}','ProductsController@change_product_publication_status')											->name('change_product_publication_status');

	Route::get('/delete_product/{product_id}', 'ProductsController@delete_product')->name('delete_product');
	Route::get('/edit_product/{product_id}','ProductsController@edit_product')->name('edit_product');
	Route::post('/update_product/{product_id}','ProductsController@update_product')->name('update_product');




	/////Slider Related Route
	Route::get('/all_slider','SliderController@index')->name('all_slider');
	Route::get('/add_slider','SliderController@add_slider')->name('add_slider');
	Route::post('/store_slider','SliderController@store_slider')->name('store_slider');
	Route::get('/change_slider_publication_status/{slider_id}','SliderController@change_slider_publication_status')											->name('change_slider_publication_status');

	Route::get('/delete_slider/{slider_id}', 'SliderController@delete_slider')->name('delete_slider');
});