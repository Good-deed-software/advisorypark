<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementInterest extends Model
{
    use HasFactory;
    
    protected $table = 'requirement_interest';
    
    protected $guarded = ['id'];
}
