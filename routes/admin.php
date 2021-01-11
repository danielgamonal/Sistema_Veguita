<?php



Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard');

    //Modulo Usuario
    Route::get('/users', 'Admin\UserController@getUsers');

    //Modulo Productos
    Route::get('/products', 'Admin\ProductController@getHome');
    Route::get('/product/add', 'Admin\ProductController@getProductAdd');
    Route::get('/product/{id}/edit', 'Admin\ProductController@getProductEdit');
    Route::post('/product/add', 'Admin\ProductController@postProductAdd');
    Route::post('/product/{id}/edit', 'Admin\ProductController@postProductEdit');

    //Categorias
    Route::get('/categories/{module}', 'Admin\CategoriesController@getHome');
    Route::post('/category/add', 'Admin\CategoriesController@postCategoryAdd');
    Route::get('/category/{id}/edit', 'admin\CategoriesController@getCategoryEdit');
    Route::post('/category/{id}/edit', 'admin\CategoriesController@postCategoryEdit');
    Route::get('/category/{id}/delete', 'admin\CategoriesController@getCategoryDelete');
});