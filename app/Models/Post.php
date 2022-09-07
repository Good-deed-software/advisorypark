<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $table = 'posts';
    
    protected $guarded = ['id'];
    
    public function users(){
        
        return $this->belongsTo(User::class,'created_by');
    }
    
    public function comments(){
        
        $instance = $this->hasMany(Comment::class,'blog_id','id');
        $instance->getQuery()->where('blog_type', 'post');
        
        return $instance;
    }
    
   
    public function categories(){
        
        return $this->belongsTo(Category::class,'category');
    }
    
    
}
