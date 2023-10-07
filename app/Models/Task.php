<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'dudi_id',
        'image',
        'detail',
        'date',
        'student_id'
    ];

    public function report(): HasOne
    {
        return $this->hasOne(Report::class, 'task_id', 'id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function dudi(): BelongsTo
    {
        return $this->belongsTo(Dudi::class, 'dudi_id', 'id');
    }
}
