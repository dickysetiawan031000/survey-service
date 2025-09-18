<?php

namespace App\UseCases\Survey;

use App\Domain\Survey\Entities\Survey;
use App\Domain\Survey\Exceptions\SurveyNotFoundException;
use App\Domain\Survey\Interfaces\SurveyRepositoryInterface;

class UpdateSurvey
{
    public function __construct(
        private SurveyRepositoryInterface $surveyRepository
    ) {}

    public function execute(int $id, string $title, ?string $description, ?string $category): Survey
    {
        $existingSurvey = $this->surveyRepository->findById($id);
        if (!$existingSurvey) {
            throw new SurveyNotFoundException();
        }

        $updatedSurvey = new Survey(
            $existingSurvey->id,
            $title,
            $description,
            $category
        );

        return $this->surveyRepository->update($updatedSurvey);
    }
}
