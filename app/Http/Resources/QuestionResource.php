<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $question = $this->resource;

        return [
            'id' => $this->id,
            'survey_id' => $this->survey_id,
            'text' => $this->text,
            'type' => $this->type,
            'options' => $this->options, // kalau JSON simpan di DB bisa decode dulu
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
