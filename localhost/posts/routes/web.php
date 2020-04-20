<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/', 'welcome');
Route::get('/', 'NewController@welcome')->name('welcome');

// Route::get('/posts/{id}/{person?}', function ($myid, $person = "kirwa")
// {
//     return ("id is = " . $myid . " and person is = $person");
// });

// Route::get('/posts/{id}/{author?}', function ($id, $author = "kirwa") {
//     $posts = [
//         1 => ["title" => "First Post..!"],
//         2 => ["title" => "Second Post"],
//     ];
//     return (view("posts.articles",[
//         "data" => $posts[$id],
//         "author" => $author
//     ]
//     ));
// });

// Route::get('/posts/{id}/{author?}', "NewController@posts");

// Route::get('/about', function () {
//     return view('about');
// });

// Route::view('/about', 'about');
Route::get('/about', "NewController@about")->name('about');

Route::get('/posts/archive', "PostController@archive");
Route::get('/posts/all', "PostController@all");

Route::patch('/posts/{post}/restore', "PostController@restore");

Route::delete('/posts/{post}/forcedelete', "PostController@forcedelete");


// Route::resource('/posts', 'PostController')
				// ->only('index', 'show', 'create', 'store');


// Route::resource('/posts', 'PostController')->except('destroy');
Route::resource('/posts', 'PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/secret', 'HomeController@secret')
				->name('secret')
				->middleware('can:secret.page');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
