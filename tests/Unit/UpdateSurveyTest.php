<?php

namespace Tests\Unit;

use App\Domain\Survey\Entities\Survey;
use App\Domain\Survey\Interfaces\SurveyRepositoryInterface;
use App\UseCases\Survey\UpdateSurvey;
use PHPUnit\Framework\TestCase;

class UpdateSurveyTest extends TestCase
{
    public function test_it_updates_a_survey_successfully()
    {
        $id = 1;
        $oldSurvey = new Survey($id, 'Old Title', 'Old Description', 'Old Category');

        $newTitle = 'Updated Title';
        $newDescription = 'Updated Description';
        $newCategory = 'Updated Category';

        $updatedSurvey = new Survey($id, $newTitle, $newDescription, $newCategory);

        $mockRepo = $this->createMock(SurveyRepositoryInterface::class);

        // mock findById agar return survey lama
        $mockRepo->expects($this->once())
            ->method('findById')
            ->with($id)
            ->willReturn($oldSurvey);

        // mock update agar return survey baru
        $mockRepo->expects($this->once())
            ->method('update')
            ->with($this->callback(function ($survey) use ($newTitle, $newDescription, $newCategory) {
                return $survey->title === $newTitle &&
                    $survey->description === $newDescription &&
                    $survey->category === $newCategory;
            }))
            ->willReturn($updatedSurvey);

        $useCase = new UpdateSurvey($mockRepo);

        $result = $useCase->execute($id, $newTitle, $newDescription, $newCategory);

        $this->assertEquals($updatedSurvey->id, $result->id);
        $this->assertEquals($updatedSurvey->title, $result->title);
        $this->assertEquals($updatedSurvey->description, $result->description);
        $this->assertEquals($updatedSurvey->category, $result->category);
    }
}
