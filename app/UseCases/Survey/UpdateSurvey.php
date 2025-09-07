<?php

namespace App\UseCases\Survey;

use App\Domain\Survey\Entities\Survey;
use App\Domain\Survey\Interfaces\SurveyRepositoryInterface;

class UpdateSurvey
{
    public function __construct(
        private SurveyRepositoryInterface $surveyRepository
    ) {}

    public function execute(int $id, string $title, ?string $description, ?string $category): Survey
    {
        // Cari survey lama
        $existingSurvey = $this->surveyRepository->findById($id);
        if (!$existingSurvey) {
            throw new \Exception("Survey not found");
        }

        // Update field
        $updatedSurvey = new Survey(
            $existingSurvey->id,
            $title,
            $description,
            $category
        );

        // Simpan ke repository
        return $this->surveyRepository->update($updatedSurvey);
    }
}
