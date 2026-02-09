<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;
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
    // app/Models/User.php

    public function customer()
    {
        // Make sure 'user_id' matches the primary key name in your users table
        return $this->hasOne(Customer::class, 'user_id', 'user_id');
    }
}
