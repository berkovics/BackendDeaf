<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deaf extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "phonenumber",
        "address",
        "email"
    ];
}
