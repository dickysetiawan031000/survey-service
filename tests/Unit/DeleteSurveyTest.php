<?php

namespace Tests\Unit;

use App\Domain\Survey\Interfaces\SurveyRepositoryInterface;
use App\UseCases\Survey\DeleteSurvey;
use PHPUnit\Framework\TestCase;

class DeleteSurveyTest extends TestCase
{
    public function test_it_deletes_a_survey_successfully()
    {
        $mockRepo = $this->createMock(SurveyRepositoryInterface::class);
        $mockRepo->expects($this->once())
            ->method('delete')
            ->with(1)
            ->willReturn(true);

        $useCase = new DeleteSurvey($mockRepo);
        $result = $useCase->execute(1);

        $this->assertTrue($result);
    }

    public function test_it_returns_false_if_survey_not_found()
    {
        $mockRepo = $this->createMock(SurveyRepositoryInterface::class);
        $mockRepo->expects($this->once())
            ->method('delete')
            ->with(999)
            ->willReturn(false);

        $useCase = new DeleteSurvey($mockRepo);
        $result = $useCase->execute(999);

        $this->assertFalse($result);
    }
}
