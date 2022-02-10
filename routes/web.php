<?php

use Illuminate\Support\Facades\Route;

/**
 * Series Routes
 */
Route::get('series', 'SeriesController@index');
Route::get('series/criar', 'SeriesController@create');
