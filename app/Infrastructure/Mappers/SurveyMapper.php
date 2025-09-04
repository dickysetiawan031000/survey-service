<?php

namespace App\Infrastructure\Mappers;

use App\Domain\Survey\Entities\Survey;
use App\Infrastructure\Persistence\Models\SurveyModel;

class SurveyMapper
{
    public static function toEntity(SurveyModel $model): Survey
    {
        return new Survey(
            id: $model->id,
            title: $model->title,
            description: $model->description,
            category: $model->category,
        );
    }

    public static function toModel(Survey $entity): SurveyModel
    {
        $model = new SurveyModel();
        $model->title = $entity->title;
        $model->description = $entity->description;
        $model->category = $entity->category;
        return $model;
    }
}
