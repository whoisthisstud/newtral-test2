<?php

use App\Http\Controllers\NewtralUniqueClientsFromLoadsController;
use Illuminate\Support\Facades\Route;

Route::get('/', NewtralUniqueClientsFromLoadsController::class )->name('newtral');
