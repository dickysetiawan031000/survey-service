<?php

namespace Tests\Unit;

use App\Domain\Survey\Entities\Survey;
use App\Domain\Survey\Interfaces\SurveyRepositoryInterface;
use App\UseCases\Survey\GetAllSurveys;
use PHPUnit\Framework\TestCase;

class GetAllSurveysTest extends TestCase
{
    public function test_it_returns_all_surveys()
    {
        // Arrange: bikin dummy surveys
        $surveys = collect([
            new Survey(1, 'Customer Satisfaction', 'Survey kepuasan pelanggan'),
            new Survey(2, 'Employee Feedback', 'Survey internal karyawan'),
        ]);

        // Mock repository
        $mockRepo = $this->createMock(SurveyRepositoryInterface::class);
        $mockRepo->method('getAll')->willReturn($surveys);

        // Inject ke use case
        $useCase = new GetAllSurveys($mockRepo);

        // Act
        $result = $useCase->execute();

        // Assert
        $this->assertCount(2, $result);
        $this->assertEquals('Customer Satisfaction', $result[0]->getTitle());
        $this->assertEquals('Employee Feedback', $result[1]->getTitle());
    }
}
