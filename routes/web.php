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

/**
 * If the user requests the home page, then return view (welcome.blade)
 */
Route::get('/', function () {
    return view('posts');
});

/**
 * If the user request the /post page, then return view
 * $post variable available because of assoc array
 * {post} wildcard = listen to random url, you can give it any name you want!
 */
Route::get('posts/{post}', function ($slug) {
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if (!file_exists($path))
        return redirect('/');

    $post = file_get_contents($path);

    return view('post', [
        'post' => $post // pass selected html to view
    ]);
});
