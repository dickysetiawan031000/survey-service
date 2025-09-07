<?php

namespace Tests\Unit;

use App\Domain\Survey\Entities\Survey;
use App\Domain\Survey\Interfaces\SurveyRepositoryInterface;
use App\UseCases\Survey\GetSurveyById;
use PHPUnit\Framework\TestCase;

class GetSurveyByIdTest extends TestCase
{
    public function test_it_returns_survey_when_found()
    {
        // Data dummy
        $survey = new Survey(1, 'Customer Feedback', 'Desc', 'Feedback');

        // Mock repository
        $mockRepo = $this->createMock(SurveyRepositoryInterface::class);
        $mockRepo->method('findById')->with(1)->willReturn($survey);

        // Use case
        $useCase = new GetSurveyById($mockRepo);

        // Eksekusi
        $result = $useCase->execute(1);

        // Assertion
        $this->assertInstanceOf(Survey::class, $result);
        $this->assertEquals(1, $result->id);
        $this->assertEquals('Customer Feedback', $result->title);
    }

    public function test_it_returns_null_when_not_found()
    {
        // Mock repository
        $mockRepo = $this->createMock(SurveyRepositoryInterface::class);
        $mockRepo->method('findById')->with(999)->willReturn(null);

        // Use case
        $useCase = new GetSurveyById($mockRepo);

        // Eksekusi
        $result = $useCase->execute(999);

        // Assertion
        $this->assertNull($result);
    }
}
