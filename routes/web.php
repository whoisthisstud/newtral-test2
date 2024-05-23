<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\NewtralUniqueClientsFromLoadsController')->name('newtral');


//Route::get('/{code:short_code}', 'App\Http\Controllers\NewtralController')->name('newtral.redirect');
