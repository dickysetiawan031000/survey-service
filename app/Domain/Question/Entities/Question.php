<?php

namespace App\Domain\Question\Entities;

class Question
{
    public ?int $id;
    public int $survey_id;
    public string $text;
    public string $type;
    public ?array $options;
    public ?string $created_at;
    public ?string $updated_at;

    public function __construct(
        ?int $id,
        int $survey_id,
        string $text,
        string $type = 'text',
        ?array $options = null,
        ?string $created_at = null,
        ?string $updated_at = null
    ) {
        $this->id = $id;
        $this->survey_id = $survey_id;
        $this->text = $text;
        $this->type = $type;
        $this->options = $options;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}
