<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    protected $fillable = [
        'batch_id',
        'user_id',
        'position_id',
        'project_id',
        'activity',
        'report_date',
        'status',
        'cheked_by',
        'rejected_reason',
    ];

    public function batch(): BelongsTo
    {
        return $this->belongsTo(Batch::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function checker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'cheked_by');
    }
}
