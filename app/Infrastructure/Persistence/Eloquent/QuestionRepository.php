<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Question\Entities\Question;
use App\Domain\Question\Interfaces\QuestionRepositoryInterface;
use App\Infrastructure\Persistence\Models\QuestionModel;
use App\Infrastructure\Mappers\QuestionMapper;
use Illuminate\Support\Collection;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function save(Question $question): Question
    {
        $model = QuestionMapper::toModel($question);
        $model->save();

        return QuestionMapper::toEntity($model);
    }

    public function update(Question $question): Question
    {
        $model = QuestionModel::findOrFail($question->id);
        $model = QuestionMapper::toModel($question, $model);
        $model->save();

        return QuestionMapper::toEntity($model);
    }

    public function delete(int $id): bool
    {
        $model = QuestionModel::find($id);
        if (!$model) return false;
        return $model->delete();
    }

    public function findById(int $id): ?Question
    {
        $model = QuestionModel::find($id);
        return $model ? QuestionMapper::toEntity($model) : null;
    }

    public function getBySurveyId(int $survey_id): Collection
    {
        return QuestionModel::where('survey_id', $survey_id)
            ->get()
            ->map(fn($model) => QuestionMapper::toEntity($model));
    }
}
