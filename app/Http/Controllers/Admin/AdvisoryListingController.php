<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Requirement,Skill,Tag,Category,User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvisoryListingController extends Controller
{
    
    public function index()
    {
        $advisory_listing = Requirement::all();
       
        
        // dd($advisory_listing);
        
        return view('admin.advisory_listing.index',compact('advisory_listing'));  
    }
    
    public function create()
    {   
         
        $categories = Category::all();
        $skills = Skill::all();
        $tags = Tag::all();
        
        $users = User::all();
        return view('admin.advisory_listing.add',compact('categories','skills','tags','users'));
    }
     
    public function store(Request $request)
    {
            $data = $request->except(['_token','image']);
            
            if($request->file('image')){
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('admin/images/advisory_listings'), $imageName);
                $data['image'] = $imageName;
               
            }
            
            // dd($data);
             if(Requirement::create($data)){ 
                    
                 return redirect()->route('advisory_listing')->with('success','Advisory Listing Added!');
                }
            else{
                return redirect()->back()->with('error','Something went wrong!');
            }
    }
   
    public function edit($id)
    {
        $advisory_listing = Requirement::find($id);
        
        $categories = Category::all();
        $skills = Skill::all();
        $tags = Tag::all();
        
        $users = User::all();
        
         return view('admin.advisory_listing.edit',compact('advisory_listing','categories','skills','tags','users'));
    }
    public function update(Request $request, $id)
    {   
        
            $data = $request->except(['_token','_method','image']);
             
             
             if($request->file('image')){
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('admin/images/advisory_listings'), $imageName);
                $data['image'] = $imageName;
               
            }
             
             if(Requirement::whereId($id)->update($data)){ 
                 return redirect()->route('advisory_listing')->with('update','Advisory Listing Updated!');
                }
            else{
                return redirect()->back()->with('error','Something went wrong!');
            }
    }

    public function delete($id)
    {   
        
       $ids = Requirement::where('id',$id)->first();
        
        if ($ids != null) {
            $data =  $ids->delete();
            return redirect()->route('advisory_listing')->with('error','Advisory Listing Deleted!');
        }
    }
	
}
