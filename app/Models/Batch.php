<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
    ];

    public function learningOutcomes()
    {
        return $this->hasMany(LearningOutComes::class);
    }
}
