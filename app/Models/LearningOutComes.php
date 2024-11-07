<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LearningOutComes extends Model
{
    protected $fillable = [
        'code',
        'name',
        'position_id',
        'batch_id',
    ];


    public function batch(): BelongsTo
    {
        return $this->belongsTo(Batch::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function reports(): BelongsToMany
    {
        return $this->belongsToMany(Report::class);
    }
}
