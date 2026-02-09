<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Specify the table (optional if it follows Laravel convention)
    protected $table = 'customers';

    // Primary key
    protected $primaryKey = 'customer_id';

    // Fields that are mass assignable
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        // Do not put email/password here if they are in the users table
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
