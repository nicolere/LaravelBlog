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

//Routes automatiques pour authentification
Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/articles', 'ArticleController@index');

//Demande du formulaire lors de l'appel de l'url contact
Route::get('/contact', 'ContactController@create');

//Route pour la soumission du formulaire
Route::post('/contact', 'ContactController@store');

//Route affichage d'un article
Route::get('/articles/{post_name}', 'ArticleController@show');

//Route pour la soumission d'un comentaire
Route::post('/articles/{post_name}', 'CommentController@store');

//Route Bonus BotMan
Route::match(['get', 'post'], '/botman', 'BotManController@bot');

//Route pour le chat 
Route::get('/chat', 'ChatsController@index')->name('chat');

//Route des messages du chat
Route::get('/message', 'MessageController@index')->name('message');
Route::post('/message', 'MessageController@store')->name('message.store');


