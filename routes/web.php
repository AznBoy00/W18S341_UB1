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

//GET

Route::get('/', function(){
    return view('pages.homepage');
});

Route::get('/new/{language}', function(){
    return view('pages.homepage');
});

Route::get('/top/{language}', function(){
    return view('pages.sortedHomepage');
});

Route::get('/newpost', function () {
    return view('pages.newquestion');
});

Route::get('/favourites', function () {
    return view('pages.favourites');
});

Route::get('/newCat', function (){
    return view('pages.newCategory');
});

Route::get('/logout', function() {
    session()->flush();
    return back();
});

Route::get('/userProfile', function() {
    session()->flush();
    return view('pages.userProfile');
});

Route::get('/publicProfile/{username}', array(
    'uses' => 'ClientController@getPublicUserProfile'
));

Route::get('/post/{id}', array(
    'uses' => 'ClientController@getFullPostById'
));

Route::get('/post/{id}/favourite', array(
    'uses' => 'ClientController@favourite'
));

Route::get('/search={search}', array(
    'uses' => 'ClientController@getSearch'
));

Route::get('/notifications', array(
    'uses' => 'ClientController@getAllNotifications'
));

Route::get('/clearNotification/{id}', array(
    'uses' => 'ClientController@clearNotification'
));

Route::get('/notifications', array(
    'uses' => 'ClientController@getAllNotifications'
));

Route::get('/post/{id}/upvote', 'ClientController@upvote');
Route::get('/post/{id}/downvote', 'ClientController@downvote');
Route::get('/post/{id}/{id2}/upvoteA', 'ClientController@upvoteA');
Route::get('/post/{id}/{id2}/downvoteA', 'ClientController@downvoteA');
Route::get('/post/{id}/delete', 'ClientController@deleteQuestion');
Route::get('/post/{id}/delete', 'ClientController@deleteAnswer');
Route::get('/post/bestanswer/{qid}/{aid}/', 'ClientController@setBestAnswer');
Route::get('/post/unbestanswer/{qid}/{aid}/', 'ClientController@unsetBestAnswer');
Route::get('/addNewCategory', 'ClientController@saveCategory');
Route::get('/readAllNotifications', 'ClientController@readAllNotifications');
Route::get('/deleteNotification/{id}', 'ClientController@deleteNotification');


//POST
Route::post('/login', 'ClientController@authenticate');
Route::post('/newpost/do', 'ClientController@postQuestion');
Route::get('/newpost/doTest', 'ClientController@postQuestion');
Route::post('/register', 'ClientController@register');
Route::post('/post/{id}/newanswer', 'ClientController@postAnswer');
Route::post('/edit', 'ClientController@editQuestion');
Route::post('/editProfile', 'ClientController@updateUserProfile');

