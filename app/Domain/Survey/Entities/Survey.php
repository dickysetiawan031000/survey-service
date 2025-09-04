<?php

namespace App\Domain\Survey\Entities;

class Survey
{
    public function __construct(
        public ?int $id,
        public string $title,
        public ?string $description = null,
        public ?string $category = null,
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }
}

