<?php

namespace App\Domain\Question\Interfaces;

use App\Domain\Question\Entities\Question;
use Illuminate\Support\Collection;

interface QuestionRepositoryInterface
{
    public function save(Question $question): Question;
    public function update(Question $question): Question;
    public function delete(int $id): bool;
    public function findById(int $id): ?Question;
    public function getBySurveyId(int $surveyId): Collection;
}
