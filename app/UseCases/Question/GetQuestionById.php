<?php

namespace App\UseCases\Question;

use App\Domain\Question\Interfaces\QuestionRepositoryInterface;
use App\Domain\Question\Entities\Question;

class GetQuestionById
{
    public function __construct(private QuestionRepositoryInterface $repository) {}

    public function execute(int $surveyId, int $id): ?Question
    {
        $question = $this->repository->findById($id);

        if (!$question || $question->survey_id !== $surveyId) {
            return null;
        }

        return $question;
    }
}
