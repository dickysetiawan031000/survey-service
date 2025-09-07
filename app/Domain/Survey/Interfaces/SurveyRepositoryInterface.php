<?php

namespace App\Domain\Survey\Interfaces;

use App\Domain\Survey\Entities\Survey;
use Illuminate\Support\Collection;

interface SurveyRepositoryInterface
{
    public function save(Survey $survey): Survey;
    public function getAll(): Collection;
    public function findById(int $id): ?Survey;
    public function update(Survey $survey): Survey;
    public function delete(int $id): bool;
}
