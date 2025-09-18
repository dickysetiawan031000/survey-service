<?php

use Illuminate\Support\Facades\Route;


Route::apiResource('surveys', \App\Http\Controllers\SurveyController::class);
Route::apiResource('surveys.questions', \App\Http\Controllers\QuestionController::class);
