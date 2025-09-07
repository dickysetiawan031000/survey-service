<?php

namespace App\UseCases\Survey;

use App\Domain\Survey\Interfaces\SurveyRepositoryInterface;

class DeleteSurvey
{
    public function __construct(
        private SurveyRepositoryInterface $surveyRepository
    ) {}

    public function execute(int $id): bool
    {
        return $this->surveyRepository->delete($id);
    }
}
