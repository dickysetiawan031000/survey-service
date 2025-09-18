<?php

namespace App\UseCases\Question;

use App\Domain\Question\Entities\Question;
use App\Domain\Question\Interfaces\QuestionRepositoryInterface;

class UpdateQuestion
{
    public function __construct(
        private QuestionRepositoryInterface $questionRepository
    ) {}

    public function execute(
        int $surveyId,
        int $id,
        string $text,
        string $type,
        ?array $options
    ): Question {

        $question = new Question(
            id: $id,
            survey_id: $surveyId,
            text: $text,
            type: $type,
            options: $options
        );

        return $this->questionRepository->update($question);
    }
}
