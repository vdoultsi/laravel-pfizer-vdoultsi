<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_skills extends Model
{
    use HasFactory;

    protected $table = 'user_skill';
     
    protected $fillable = [
        'user_id',
        'skill_id'
    ];
}
