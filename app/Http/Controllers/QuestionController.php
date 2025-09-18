<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\UseCases\Question\CreateQuestion;
use App\UseCases\Question\GetQuestionsBySurvey;
use App\UseCases\Question\GetQuestionById;
use App\UseCases\Question\UpdateQuestion;
use App\UseCases\Question\DeleteQuestion;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    public function index(int $surveyId, GetQuestionsBySurvey $getQuestionsBySurvey)
    {
        $questions = $getQuestionsBySurvey->execute($surveyId);
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

    public function show(int $surveyId, int $id, GetQuestionById $getQuestionById)
    {
        $question = $getQuestionById->execute($surveyId, $id);

        if (!$question) {
            return response()->json(['message' => 'Question not found'], 404);
        }

        return new QuestionResource($question);
    }

    public function update(
        UpdateQuestionRequest $request,
        int $surveyId,
        int $id,
        UpdateQuestion $updateQuestion
    ) {
        $question = $updateQuestion->execute(
            $surveyId,
            $id,
            $request->text,
            $request->type,
            $request->options
        );

        return new QuestionResource($question);
    }

    public function destroy(int $surveyId, int $id, DeleteQuestion $deleteQuestion): JsonResponse
    {
        $deleted = $deleteQuestion->execute($id);

        if (!$deleted) {
            return response()->json(['message' => 'Question not found'], 404);
        }

        return response()->json(['message' => 'Question deleted successfully'], 200);
    }
}
