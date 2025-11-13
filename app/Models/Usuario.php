<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users'; // tabla

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Verifica si el usuario es ADMIN
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Verifica si es usuario normal
    public function isUser()
    {
        return $this->role === 'user';
    }
}
