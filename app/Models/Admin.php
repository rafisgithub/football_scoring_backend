<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use Notifiable,HasFactory;

    // Define the fields that can be mass assigned.
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // Hide fields from array or JSON conversion.
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Cast attributes to native types.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
