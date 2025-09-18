<?php

namespace App\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyModel extends Model
{
    protected $table = 'surveys';

    protected $fillable = [
        'title',
        'description',
        'category',
    ];

    public function questions()
    {
        return $this->hasMany(QuestionModel::class, 'survey_id');
    }
}
