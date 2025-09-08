<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\UseCases\Question\CreateQuestion;
use App\UseCases\Question\DeleteQuestion;
use App\UseCases\Question\GetQuestionsBySurvey;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    public function index(int $survey_id, GetQuestionsBySurvey $getQuestionsBySurvey)
    {
        $questions = $getQuestionsBySurvey->execute($survey_id);
        return QuestionResource::collection($questions);
    }

    public function store(CreateQuestionRequest $request, CreateQuestion $createQuestion)
    {
        $question = $createQuestion->execute(
            $request->survey_id,
            $request->text,
            $request->type,
            $request->options
        );

        return new QuestionResource($question);
    }

    public function destroy(int $survey, int $question, DeleteQuestion $deleteQuestion): JsonResponse
    {
        $deleted = $deleteQuestion->execute($question);

        if (!$deleted) {
            return response()->json(['message' => 'Question not found'], 404);
        }

        return response()->json(['message' => 'Question deleted successfully'], 200);
    }

}
