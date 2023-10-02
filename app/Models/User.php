<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'class',
        'password',
    ];

    public function dudi(): HasOne
    {
        return $this->hasOne(Dudi::class, 'dudi_id', 'id');
    }

    public function reports(): BelongsTo
    {
        return $this->belongsTo(Report::class, 'user_id', 'id');
    }
}
