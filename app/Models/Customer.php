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
    ];
}
