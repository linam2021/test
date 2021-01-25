<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usersAdmins extends Model
{
    use HasFactory;
    protected $fillable = [
        'heroId',
        'AdminId',
        'heroStatus'
    ];
}
