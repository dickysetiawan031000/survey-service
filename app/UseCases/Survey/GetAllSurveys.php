<?php

namespace App\UseCases\Survey;

use App\Domain\Survey\Interfaces\SurveyRepositoryInterface;

class GetAllSurveys
{
    private SurveyRepositoryInterface $surveyRepository;

    public function __construct(SurveyRepositoryInterface $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    public function execute()
    {
        return $this->surveyRepository->getAll();
    }
}
