<?php


Route::get('/','HomeController@index');
#----product show --------------------
Route::get('/product_by_category/{id}','HomeController@show_product_by_category');
Route::get('/manufacture_by_product/{id}','HomeController@show_manufacture_brand_by_manufacture_id');

Route::get('/view_product/{id}','HomeController@view_product');



#---------------  Admin panel------------------------------
Route::get('/admin','AdminController@index');
Route::post('/admin_dashbord','AdminController@dashbord');
Route::get('/logout','SuperAdminConroller@logout');
Route::get('/dashbord','SuperAdminConroller@index');


#---------------  catogory ------------------------------

Route::get('/add_category','CategoryController@index');
Route::post('/save_category','CategoryController@store');
Route::get('/edit_category/{id}','CategoryController@edit_category');
Route::post('/update_category/{id}','CategoryController@update_category');
Route::get('/delete_category/{id}','CategoryController@delete_category');
Route::get('/all-category','CategoryController@all_category');

Route::get('/active_category/{id}','CategoryController@active');
Route::get('/inactive_category/{id}','CategoryController@inactive');


#------------------- MANUFACTURE--------------------------------
Route::get('/add_manufacture','ManufactureController@index');
Route::post('/save_manufacture','ManufactureController@store');
Route::get('/all_manufacture','ManufactureController@all_manufacture');
Route::get('/active_manufacture/{id}','ManufactureController@active');
Route::get('/inactive_manufacture/{id}','ManufactureController@inactive');
Route::get('/edit_manufacture/{id}','ManufactureController@edit_menufacture');

Route::post('/update_manufacture/{id}','ManufactureController@update_manufacture');
Route::get('/delete_manufacture/{id}','ManufactureController@delete_menufacture');


#---------------- product ------------

Route::get('/add_product','ProductController@index');
Route::post('/save_product','ProductController@save_product');
Route::get('/all_product','ProductController@all_product');
Route::get('/active_product/{id}','ProductController@active');
Route::get('/inactive_product/{id}','ProductController@inactive');
Route::get('/delete_product/{id}','ProductController@delete_product');

#-----------slider ----------------------------------------

Route::get('/add_slider','SliderController@index');
Route::get('/all_slider','SliderController@all_slider');
Route::post('/save_slider','SliderController@save_slider');
Route::get('/active_slider/{id}','SliderController@active');
Route::get('/inactive_slider/{id}','SliderController@inactive');
Route::get('/delete_slider/{id}','SliderController@delete_slider');
Route::get('/slide','SliderController@slider');

#------CARD ------------------------------------------
Route::post('/add_to_card','CardController@add_to_card');
Route::get('/show_card','CardController@show_card');
Route::get('/delete_cart_item/{id}','CardController@delete');
Route::post('/update_cart','CardController@update_cart');

#-------checkout------------------
Route::get('/login_check','CheckOutController@login_check');
Route::post('/customer_registation','CheckOutController@customer_registation');
Route::get('/chechout','CheckOutController@chechout');
Route::post('/save_shipping_details','CheckOutController@save_shipping_details');

Route::post('/customer_login','CheckOutController@customer_login');

Route::get('/customer_logout','CheckOutController@customer_logout');

Route::get('/payment','CheckOutController@payment');
Route::post('/order_place','CheckOutController@order_place');
Route::get('/manage_order','CheckOutController@manage_order');
Route::get('/view_order/{id}','CheckOutController@view_order');