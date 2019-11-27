<?php

use FadilArtisan\Route;

Route::get("", "KingsmanController@home");

Route::get("catalog", "KingsmanController@redirectCatalog");
Route::get("catalog/page/{page}", "KingsmanController@catalog");

Route::get("catalog/{id}", "CatalogController@get");

Route::get("catalog/designer/{id}", "CatalogController@designer");

Route::get("catalog/tambah", "CatalogController@tambah");

Route::post("catalog/create", "CatalogController@create");

Route::get("catalog/edit/{id}", "CatalogController@edit");

Route::post("catalog/update/{id}", "CatalogController@update");

Route::get("catalog/delete/{id}", "CatalogController@delete");

Route::get("contact", "KingsmanController@contact");

Route::get("cart", "KingsmanController@cart");

Route::get("login", "AuthController@login");
Route::get("register", "AuthController@register");

Route::post("auth/logout", "AuthController@logout");
Route::post("auth/check", "AuthController@check");
Route::post("auth/create", "AuthController@create");

Route::get("auth/user", "AuthController@get");
Route::get("auth/user/{id}", "AuthController@get");

Route::error("KingsmanController@error");

// return var_dump(Route::$_post);
