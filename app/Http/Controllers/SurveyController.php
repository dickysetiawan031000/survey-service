<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSurveyRequest;
use App\Http\Requests\UpdateSurveyRequest;
use App\Http\Resources\SurveyResource;
use App\UseCases\Survey\CreateSurvey;
use App\UseCases\Survey\DeleteSurvey;
use App\UseCases\Survey\GetAllSurveys;
use App\UseCases\Survey\GetSurveyById;
use App\UseCases\Survey\UpdateSurvey;
use Illuminate\Http\JsonResponse;

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

    public function update(UpdateSurveyRequest $request, int $id, UpdateSurvey $updateSurvey)
    {
        $survey = $updateSurvey->execute(
            $id,
            $request->title,
            $request->description,
            $request->category
        );

        return new SurveyResource($survey);
    }

    public function show(int $id, GetSurveyById $getSurveyById)
    {
        $survey = $getSurveyById->execute($id);
        return new SurveyResource($survey);
    }

    public function destroy(int $id, DeleteSurvey $deleteSurvey): JsonResponse
    {
        $deleted = $deleteSurvey->execute($id);

        if (!$deleted) {
            return response()->json(['message' => 'Survey not found'], 404);
        }

        return response()->json(['message' => 'Survey deleted successfully']);
    }
}
