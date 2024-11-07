<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function scopeFilter($query, $params)
    {
        $query->when(@$params['search'], function ($query, $search) {
            $query->where('activity', 'LIKE', "%{$search}%");
        });

        $query->when(@$params['year'], function ($query, $year) {
            $query->whereYear('report_date', $year);
        });

        $query->when(@$params['month'], function ($query, $month) {
            $query->whereMonth('report_date', $month);
        });
    }


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

    public function learningOutComes(): BelongsToMany
    {
        return $this->belongsToMany(LearningOutComes::class);
    }
}
