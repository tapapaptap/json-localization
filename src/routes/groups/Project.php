<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ProjectController;

Route::apiResource('project', ProjectController::class)
    ->middleware('auth:sanctum');
