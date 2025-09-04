<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Survey\Entities\Survey;
use App\Domain\Survey\Interfaces\SurveyRepositoryInterface;
use App\Infrastructure\Persistence\Models\SurveyModel;
use App\Infrastructure\Mappers\SurveyMapper;

class SurveyRepository implements SurveyRepositoryInterface
{
    public function save(Survey $survey): Survey
    {
        $model = SurveyMapper::toModel($survey);
        $model->save();

        return SurveyMapper::toEntity($model);
    }

    public function getAll(): \Illuminate\Support\Collection
    {
        $models = SurveyModel::all();
        return $models->map(fn($model) => SurveyMapper::toEntity($model));
    }

}
