<?php

namespace App\Infrastructure\Mappers;

use App\Domain\Question\Entities\Question;
use App\Infrastructure\Persistence\Models\QuestionModel;

class QuestionMapper
{
    public static function toEntity(QuestionModel $model): Question
    {
        return new Question(
            id: $model->id,
            survey_id: $model->survey_id,
            text: $model->text,
            type: $model->type,
            options: is_array($model->options) ? $model->options : json_decode($model->options, true),
            created_at: $model->created_at,
            updated_at: $model->updated_at
        );
    }

    public static function toModel(Question $entity, ?QuestionModel $model = null): QuestionModel
    {
        $model = $model ?? new QuestionModel();
        $model->survey_id = $entity->survey_id;
        $model->text = $entity->text;
        $model->type = $entity->type;
        $model->options = $entity->options ? json_encode($entity->options) : null;

        return $model;
    }
}
