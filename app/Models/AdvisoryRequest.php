<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisoryRequest extends Model
{
    use HasFactory;
    
    protected $table = 'advisory_requests';
    
    protected $guarded = ['id'];
    
     public function users(){
        
        return $this->belongsTo(User::class,'user_id');
    }
    
}
