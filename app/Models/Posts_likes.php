<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts_likes extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'ip_address', 'voted'];
}
