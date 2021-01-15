<?php

Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');

    //Modulo Usuario
    Route::get('/users/{status}', 'Admin\UserController@getUsers')->name('user_list');
    Route::get('/user/{id}/edit', 'Admin\UserController@getUserEdit')->name('user_edit');

    //Modulo Productos
    Route::get('/products', 'Admin\ProductController@getHome')->name('products');
    Route::get('/product/add', 'Admin\ProductController@getProductAdd')->name('product_add');
    Route::get('/product/{id}/edit', 'Admin\ProductController@getProductEdit')->name('`product_edit');
    Route::post('/product/add', 'Admin\ProductController@postProductAdd')->name('product_add');
    Route::post('/product/{id}/edit', 'Admin\ProductController@postProductEdit')->name('product_edit');
    Route::post('/product/{id}/gallery/add', 'Admin\ProductController@postProductGalleryAdd')->name('product_gallery_add');
    Route::get('/product/{id}/gallery/add{gid}/delete', 'Admin\ProductController@getProductGalleryDelete')->name('product_gallery_delete');

    //Categorias
    Route::get('/categories/{module}', 'Admin\CategoriesController@getHome')->name('categories');
    Route::post('/category/add', 'Admin\CategoriesController@postCategoryAdd')->name('category_add');
    Route::get('/category/{id}/edit', 'admin\CategoriesController@getCategoryEdit')->name('category_edit');
    Route::post('/category/{id}/edit', 'admin\CategoriesController@postCategoryEdit')->name('category_edit');
    Route::get('/category/{id}/delete', 'admin\CategoriesController@getCategoryDelete')->name('category_delete');
});