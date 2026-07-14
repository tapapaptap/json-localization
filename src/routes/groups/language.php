<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\LanguageController;

Route::controller(LanguageController::class)->prefix('language')->group(function () {
    Route::get('/', 'index')->name('language.index');
});