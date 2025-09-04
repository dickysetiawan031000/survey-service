<?php

namespace App\UseCases\Survey;

use App\Domain\Survey\Entities\Survey;
use App\Domain\Survey\Interfaces\SurveyRepositoryInterface;

class CreateSurvey
{
    public function __construct(
        private SurveyRepositoryInterface $surveyRepository
    ) {}

    public function execute(string $title, ?string $description, ?string $category): Survey
    {
        $survey = new Survey(
            id: null,
            title: $title,
            description: $description,
            category: $category,
        );

        return $this->surveyRepository->save($survey);
    }
}
