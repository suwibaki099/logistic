<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifications extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'company',
        'role',
        'time',
        'status',
        'password',
        'upload',
    ];
}
