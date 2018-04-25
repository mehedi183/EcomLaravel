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
Route::get('/', 'HomeController@index')->name('home');



//product_by_category
Route::get('product_by_category/{category_id}', 'HomeController@show_product_by_category')->name('show_product_by_category');



//product_by_brand
Route::get('product_by_brand/{menufacture_id}', 'HomeController@show_product_by_brand')->name('show_product_by_brand');


//view product on single page
Route::get('view_product/{product_id}', 'HomeController@view_product')->name('view_product');

//Add to Cart
Route::post('/add_to_cart', 'CartController@add_to_cart')->name('add_to_cart');
Route::get('/show_cart', 'CartController@show_cart')->name('show_cart');
Route::get('/remove_item_from_cart/{id}', 'CartController@remove_item_from_cart')->name('remove_item_from_cart');
Route::post('/update_cart', 'CartController@update_cart')->name('update_cart');

////Check Out Routes

Route::get('/login_check', 'CheckOutController@login_check')->name('login_check');
Route::post('/customer_registration', 'CheckOutController@customer_registration')->name('customer_registration');
Route::get('/checkout','CheckOutController@checkout')->name('checkout');
Route::post('/save_shipping_details','CheckOutController@save_shipping_details')->name('save_shipping_details');

//Payment Routes
Route::get('/payment', 'CheckOutController@payment')->name('payment');
Route::post('/place_order', 'CheckOutController@place_order')->name('place_order');




// Customer Logout

Route::post('customer_login}','CustomerController@customer_login')->name('customer_login');
Route::get('logout/{customer_id}','CustomerController@customer_logout')->name('customer_logout');


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
	

	////Manage Order related Route
	Route::get('/manage_order', 'ManageOrderController@manage_order')->name('manage_order');
	Route::get('/view_order/{order_id}', 'ManageOrderController@view_order')->name('view_order');








});

