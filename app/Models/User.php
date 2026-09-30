<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'nis',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isTeacher()
    {
        return $this->role === 'guru';
    }

    public function isStudent()
    {
        return $this->role === 'siswa';
    }
}
