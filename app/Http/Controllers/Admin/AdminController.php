<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\{User,Post,Requirement};
use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    
    
	public function dashboard()
    {
            $users = User::where('type','user')->count();
            $posts = Post::count();
            $requirements = Requirement::count();
            $online = User::where('is_active','1')->count();
            
			return view('admin.dashboard',compact('users','posts','requirements','online'));
       
    }
	
}
