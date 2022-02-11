<?php

use Illuminate\Support\Facades\Route;

/**
 * Series Routes
 */
Route::get('series', 'SeriesController@index')->name('series.home');
Route::get('series/criar', 'SeriesController@create')->name('series.criar');
Route::post('series/criar', 'SeriesController@save')->name('series.criar');
Route::post('series/{id}', 'SeriesController@delete')->name('series.deletar');
