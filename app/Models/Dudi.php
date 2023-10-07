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

    protected $fillable = [
        'name'
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'dudi_id', 'id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'dudi_id', 'id');
    }
}
