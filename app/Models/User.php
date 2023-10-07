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
    public static $SUPERVISOR = 2;
    public static $STUDENT = 3;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'class',
        'password',
    ];

    public function supervisor(): HasOne
    {
        return $this->hasOne(Supervisor::class, 'user_id', 'id');
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'user_id', 'id');
    }
}
