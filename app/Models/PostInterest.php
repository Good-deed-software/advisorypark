<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostInterest extends Model
{
    use HasFactory;
    
    protected $table = 'post_interest';
    
    protected $guarded = ['id'];
}
