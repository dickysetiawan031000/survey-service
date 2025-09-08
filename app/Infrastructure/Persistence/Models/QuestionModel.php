<?php

namespace App\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'survey_id',
        'text',
        'type',
        'options',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function survey(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SurveyModel::class, 'survey_id');
    }
}
