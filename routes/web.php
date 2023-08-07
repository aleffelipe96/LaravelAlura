<?php

use Illuminate\Support\Facades\Route;

/**
 * Root Route
 */
Route::redirect('/', 'series');

/**
 * Auth Routes
 */
Route::get('entrar', 'AuthController@index')->name('login');
Route::post('entrar', 'AuthController@entrar')->name('login');
Route::get('registrar', 'RegistroController@create')->name('registro');
Route::post('registrar', 'RegistroController@store')->name('registro');
Route::get('sair', 'AuthController@logout')->name('logout');

/**
 * Series Routes
 */
Route::get('series', 'SeriesController@index')->name('series.index');
Route::get('series/criar', 'SeriesController@create')->name('series.criar')->middleware('autenticador');
Route::post('series/criar', 'SeriesController@save')->name('series.criar')->middleware('autenticador');
Route::post('series/{id}', 'SeriesController@delete')->name('series.deletar')->middleware('autenticador');
Route::post('series/{id}/editaNome', 'SeriesController@editaNome')->name('series.editar')->middleware('autenticador');

/**
 * Temporadas Routes
 */
Route::get('series/{id}/temporadas', 'TemporadasController@index')->name('temporadas.index');

/**
 * Episodios Routes
 */
Route::get('temporadas/{temporada}/episodios', 'EpisodiosController@index')->name('episodios.index');
Route::post('temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->name('episodios.index')->middleware('autenticador');
