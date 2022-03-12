<?php

use Illuminate\Support\Facades\Route;

/**
 * Series Routes
 */
Route::get('series', 'SeriesController@index')->name('series.index');
Route::get('series/criar', 'SeriesController@create')->name('series.criar');
Route::post('series/criar', 'SeriesController@save')->name('series.criar');
Route::post('series/{id}', 'SeriesController@delete')->name('series.deletar');
Route::get('series/{id}/temporadas', 'TemporadasController@index')->name('temporadas.index');
Route::post('series/{id}/editaNome', 'SeriesController@editaNome');

/**
 * Temporadas Routes
 */
Route::get('temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir');
