<?php

use FadilArtisan\Route;

Route::get("", "KingsmanController@home");

Route::get("catalog/{1}", "KingsmanController@catalog");
Route::get("catalog/tambah", "CatalogController@tambah");

Route::get("contact", "KingsmanController@contact");

Route::get("login", "AuthController@login");
Route::get("register", "AuthController@register");

Route::post("auth/logout", "AuthController@logout");
Route::post("auth/check", "AuthController@check");
Route::post("auth/create", "AuthController@create");

Route::get("auth/user", "AuthController@get");
Route::get("auth/user/{id}", "AuthController@get");

Route::error("ErrorController@index");

// return var_dump(Route::$_post);
