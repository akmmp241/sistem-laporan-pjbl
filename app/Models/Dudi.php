<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dudi extends Model
{
    use HasFactory;

    protected $table = 'dudis';

    public function tasks(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'dudi_id', 'id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
