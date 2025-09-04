<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSurveyRequest;
use App\Http\Resources\SurveyResource;
use App\UseCases\Survey\CreateSurvey;
use App\UseCases\Survey\GetAllSurveys;

class SurveyController extends Controller
{
    public function index(GetAllSurveys $getAllSurveys)
    {
        $surveys = $getAllSurveys->execute();

        return SurveyResource::collection($surveys);
    }
    public function store(CreateSurveyRequest $request, CreateSurvey $createSurvey)
    {
        $survey = $createSurvey->execute(
            $request->title,
            $request->description,
            $request->category
        );

        return new SurveyResource($survey);
    }
}
