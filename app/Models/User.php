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

    public static $ADMIN = 1;
    public static $STUDENT = 2;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'class',
        'password',
    ];

    public function dudi(): BelongsTo
    {
        return $this->belongsTo(Dudi::class, 'dudi_id', 'id');
    }

    public function reports(): BelongsTo
    {
        return $this->belongsTo(Report::class, 'user_id', 'id');
    }
}
