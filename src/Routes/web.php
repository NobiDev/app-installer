<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'install',
    'as' => 'AppInstaller::',
    'namespace' => 'NobiDev\AppInstaller\Controllers',
    'middleware' => ['web', 'installer']
], static function () {
    Route::get('/', ['as' => 'install.index', 'uses' => 'InstallIndexController@index']);
    Route::get('/server', ['as' => 'install.server', 'uses' => 'InstallServerController@index']);
    Route::get('/folders', ['as' => 'install.folders', 'uses' => 'InstallFolderController@index']);
    Route::get('/database', ['as' => 'install.database', 'uses' => 'InstallDatabaseController@database']);
    Route::post('/database', ['as' => 'install.setDatabase', 'uses' => 'InstallDatabaseController@setDatabase']);
    Route::get('/migrations', ['as' => 'install.migrations', 'uses' => 'InstallDatabaseController@migrations']);
    Route::post('/migrations', ['as' => 'install.runMigrations', 'uses' => 'InstallDatabaseController@runMigrations']);
    Route::get('/keys', ['as' => 'install.keys', 'uses' => 'InstallKeysController@index']);
    Route::post('/keys', ['as' => 'install.setKeys', 'uses' => 'InstallKeysController@setKeys']);
    Route::get('/finish', ['as' => 'install.finish', 'uses' => 'InstallIndexController@finish']);
});