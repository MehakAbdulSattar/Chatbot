<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //protected $table = 'team_members';
    use HasFactory;
    protected $fillable = ['name', 'status', 'comments', 'user_id'];
}