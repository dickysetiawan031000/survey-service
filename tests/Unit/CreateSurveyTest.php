<?php

namespace Tests\Unit;

use App\Domain\Survey\Entities\Survey;
use App\Domain\Survey\Interfaces\SurveyRepositoryInterface;
use App\UseCases\Survey\CreateSurvey;
use PHPUnit\Framework\TestCase;

class CreateSurveyTest extends TestCase
{
    public function test_it_creates_a_survey()
    {
        // Data input
        $title = 'Customer Feedback';
        $description = 'Survey untuk customer feedback';
        $category = 'Feedback';

        // Expected entity setelah disimpan
        $expectedSurvey = new Survey(1, $title, $description, $category);

        // Mock repository
        $mockRepo = $this->createMock(SurveyRepositoryInterface::class);
        $mockRepo->expects($this->once()) // dipanggil sekali
        ->method('save')
            ->with($this->callback(function ($survey) use ($title, $description, $category) {
                // Pastikan entity yang dilempar ke repo sesuai input
                return $survey->title === $title &&
                    $survey->description === $description &&
                    $survey->category === $category;
            }))
            ->willReturn($expectedSurvey);

        // Inject ke use case
        $useCase = new CreateSurvey($mockRepo);

        // Eksekusi use case
        $result = $useCase->execute($title, $description, $category);

        // Assertion
        $this->assertInstanceOf(Survey::class, $result);
        $this->assertEquals(1, $result->id);
        $this->assertEquals($title, $result->title);
        $this->assertEquals($description, $result->description);
        $this->assertEquals($category, $result->category);
    }
}
