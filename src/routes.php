<?php
/**
 * Created by PhpStorm.
 * User: hanishkumar.kumar
 * Date: 5/1/2017
 * Time: 11:00 AM
 */

//Route::get('chat1', 'Hanish\ChatApp\ChatAppController@index');
Route::get('send_requests/chat/{id}', 'Hanish\ChatApp\ChatAppController@index');
Route::get('send_requests/chat/{id}/{to}', 'Hanish\ChatApp\ChatAppController@index');
Route::post('send_message/{from}/{to}', 'Hanish\ChatApp\ChatAppController@sendmsg');