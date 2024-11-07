<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchUser extends Model
{
    protected $fillable = [
        'user_id',
        'batch_id',
    ];
}
