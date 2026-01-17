<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    public $timestamps = false; // 🔥 IMPORTANT FIX

     // ✅ Add this
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password_hash',
        'status',
        'role_id',
    ];

    protected $hidden = [
        'password_hash',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
}
