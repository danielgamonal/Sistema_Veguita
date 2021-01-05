<?php

Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard');

    //Modulo Usuario
    Route::get('/users', 'Admin\UserController@getUsers');

    //Modulo Productos
    Route::get('/products', 'Admin\ProductController@getHome');
    Route::get('/product/add', 'Admin\ProductController@getProductAdd');

    //Categorias
    Route::get('/categories', 'Admin\CategoriesController@getHome');
    Route::post('/category/add', 'Admin\CategoriesController@postCategoryAdd');
});