<?php

use Illuminate\Support\Facades\Route;


Route::apiResource('surveys', \App\Http\Controllers\SurveyController::class);
Route::apiResource('surveys.questions', \App\Http\Controllers\QuestionController::class);

//Route::get('surveys/{surveyId}/questions', [\App\Http\Controllers\QuestionController::class, 'index']);
//Route::post('surveys/{surveyId}/questions', [\App\Http\Controllers\QuestionController::class, 'store']);

