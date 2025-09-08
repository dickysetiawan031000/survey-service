<?php

namespace App\UseCases\Question;

use App\Domain\Question\Entities\Question;
use App\Domain\Question\Interfaces\QuestionRepositoryInterface;

class CreateQuestion
{
    public function __construct(private QuestionRepositoryInterface $repository) {}

    public function execute(int $survey_id, string $text, string $type = 'text', ?array $options = null): Question
    {
        $question = new Question(null, $survey_id, $text, $type, $options);
        return $this->repository->save($question);
    }
}
