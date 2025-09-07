<?php

namespace App\UseCases\Survey;

use App\Domain\Survey\Entities\Survey;
use App\Domain\Survey\Interfaces\SurveyRepositoryInterface;

class GetSurveyById
{
    public function __construct(private SurveyRepositoryInterface $repository) {}

    public function execute(int $id): ?Survey
    {
        return $this->repository->findById($id);
    }
}
