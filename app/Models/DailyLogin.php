<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyLogin extends Model
{
    use HasFactory;

    protected $fillable = [
        'login_date', 
        'login_count'
    ];
}
