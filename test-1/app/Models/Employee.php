<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'address',
        'birth_date',
        'hire_date',
        'status'
    ];
}
