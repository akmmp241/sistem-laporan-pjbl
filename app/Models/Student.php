<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'supervisor_id',
        'dudi_id',
        'nis',
        'name',
        'class'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'student_id', 'id');
    }

    public function dudi(): BelongsTo
    {
        return $this->belongsTo(Dudi::class, 'dudi_id', 'id');
    }

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(Supervisor::class, 'supervisor_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
