<?php

namespace App\UseCases\Question;

use App\Domain\Question\Interfaces\QuestionRepositoryInterface;

class DeleteQuestion
{
    public function __construct(private QuestionRepositoryInterface $repository) {}

    public function execute(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
