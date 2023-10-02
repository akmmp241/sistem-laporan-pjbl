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
        'detail'
    ];

    public function dudi(): HasOne
    {
        return $this->hasOne(Dudi::class, 'dudi_id', 'id');
    }

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class, 'task_id', 'id');
    }
}
