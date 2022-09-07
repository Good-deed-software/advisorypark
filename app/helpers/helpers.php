<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Category,Skill,Tag,Requirement,Post,Like,Comment,Save,Following,Follower,AdvisoryListing,AdvisoryRequest};

function get_categories(){
    $categories =   Category::where('status','1')->get();
    return $categories;  
}
?>