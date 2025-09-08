<?php

namespace App\UseCases\Question;

use App\Domain\Question\Interfaces\QuestionRepositoryInterface;

class GetQuestionsBySurvey
{
    public function __construct(private QuestionRepositoryInterface $repository) {}

    public function execute(int $surveyId)
    {
        return $this->repository->getBySurveyId($surveyId);
    }
}
