<?php
use Illuminate\Http\Request;
use App\Models\{User,Category,Skill,Tag,Requirement,Post,Like,Comment,Save,Following,Follower,AdvisoryListing,AdvisoryRequest};

function getPostCategories($categories = null){
    if($categories){
        $cats = explode(',',$categories);
        $data =   Category::whereIn('id',$cats)->pluck('name','id');
        return $data;  
    }
}

function getPostSkills($skills = null){
    if($skills){
        $skill = explode(',',$skills);
        $data =   Skill::whereIn('id',$skill)->pluck('name','id');
        return $data;  
    }
}

function getPostTags($tags = null){
    if($tags){
        $tag = explode(',',$tags);
        $data =   Tag::whereIn('id',$tag)->pluck('name','id');
        return $data;  
    }
}

function addNewCategory($request_){
    $data = [];
    $new_entries = [];
    foreach($request_ as $v){
        $cat = Category::find($v);
        if(!empty($cat)){
            $data[] = $cat->id; 
        }else{
            $new_entries[] = $v;
        }
    }

    $result = [];
    if(count($data) !== count($request_)){
        $new = Category::addNewCategories($new_entries);
        if(!empty($new)){
            $result = array_merge($new, $data);;
        }
    }

    return $result;
}

function addNewSkill($request_){
    $data = [];
    $new_entries = [];
    foreach($request_ as $v){
        $skill = Skill::find($v);
        if(!empty($skill)){
            $data[] = $skill->id; 
        }else{
            $new_entries[] = $v;
        }
    }

    $result = [];
    if(count($data) !== count($request_)){
        $new = Skill::addNewSkills($new_entries);
        if(!empty($new)){
            $result = array_merge($new, $data);;
        }
    }

    return $result;
}

function addNewTag($request_){
    $data = [];
    $new_entries = [];
    foreach($request_ as $v){
        $tag = Tag::find($v);
        if(!empty($tag)){
            $data[] = $tag->id; 
        }else{
            $new_entries[] = $v;
        }
    }

    $result = [];
    if(count($data) !== count($request_)){
        $new = Tag::addNewTags($new_entries);
        if(!empty($new)){
            $result = array_merge($new, $data);;
        }
    }

    return $result;
}

?>