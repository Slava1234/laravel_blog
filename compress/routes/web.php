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

Auth::routes();

// Logout
Route::get('/out', function () {
    if(Auth::check()){
        Auth::logout();
    }
    return redirect()->route('index');
});

Route::group(['middlewareGroups' => ['web']], function(){



    /*Route::get('blog/{slug}', [
        'uses' => 'BlogController@getSingle',
        'as ' => 'blog.single'
    ])->where('slug', "[\w\d\-\_]+");*/

    /*Route::get('/', [
        'uses' => 'PageController@getIndex',
        'as'   => 'index'
    ]);*/

    Route::get('/', function(){
        return 22;
    });

    /*Route::get('/contact', [
        'uses' => 'PageController@getContact',
        'as'   => 'contact'
    ]);

    Route::get('/about', [
        'uses' => 'PageController@getAbout',
        'as'   => 'about'
    ]);

    Route::get('blog', [
        'uses' => 'BlogController@getIndex',
        'as' => 'blog.index'
    ]);

    // категории
    Route::get('cat/{category}', [
        'uses' => 'PageController@getCategory',
        'as' => 'category.index'
    ]);

    // Посик
    Route::get('search', [
        'uses' => 'BlogController@postSearch',
        'as' => 'blog.search'
    ]);*/

    /*
    * Админ
    */
    //Route::resource('posts', 'PostController');

    /* Категории */
    //Route::resource('categories', 'CategoryController', ['except' => ['create']]);

    // поиск постов в админ панели
    /*Route::get('admin/post/search', [
        'uses' => 'PostController@searchPost',
        'as' => 'admin.post.search'
    ]);*/

    /* Комментарии */
    /*Route::post('/post_comment', [
        'uses' => 'PostCommentController@storeNewComment',
        'as' => 'post.comment',
    ]);

    Route::resource('comments', 'CommentsController');*/






/*
    Admin:
    1. посты
    2. категории
    3. комментарии


*/


















});
