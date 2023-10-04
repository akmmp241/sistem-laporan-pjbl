<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dudi extends Model
{
    use HasFactory;

    protected $table = 'dudis';

    public function tasks(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'dudi_id', 'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
