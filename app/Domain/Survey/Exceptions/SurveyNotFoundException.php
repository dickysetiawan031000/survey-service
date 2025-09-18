<?php

namespace App\Domain\Survey\Exceptions;

use Exception;

class SurveyNotFoundException extends Exception
{
    protected $message = 'Survey not found';
}
