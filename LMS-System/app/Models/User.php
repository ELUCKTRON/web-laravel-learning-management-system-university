<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function subjects(){
        return $this->hasMany(Subject::class);
    }

    public function enrolledSubjects()
    {
        return $this->belongsToMany(Subject::class, 'enrollments')->withTimestamps();
    }

    public function solutions() {
        return $this->hasMany(Solution::class);
    }

}
