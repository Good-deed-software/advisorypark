<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Category,Skill,Tag,Requirement,Post,Like,Comment,Save,Following,Follower,AdvisoryListing,AdvisoryRequest};
use Auth;
use Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    
    
	public function index() 
    {
        // \DB::enableQueryLog();
        $categories =   Category::where('status','1')->get();  
        // dd(\DB::getQueryLog());
        
        
        $skills     =   Skill::where('status','1')->get();
        $tags       =   Tag::where('status','1')->get();
    
        if(Auth::check()){
            $posts      =   Post::with('users','categories','comments')->where('created_by','!=',Auth::user()->id)->orderby('id','desc')->get();
            $users      =   User::where('id','!=',Auth::user()->id)->limit(5)->orderby('id','desc')->get();
        }else{
            $posts      =   Post::with('users','categories','comments')->orderby('id','desc')->get();
            $users      =   User::limit(5)->orderby('id','desc')->get();
        }
		return view('index',compact('categories','skills','tags','posts','users'/*,'likes'*/));
       
    }
    
    public function profile()
    {   
        
        if(Auth::check()){
            
            $posts      =  Post::where('created_by',Auth::user()->id)->orderby('id','desc')->get();
            
            // dd($posts);
         
            $following  =  Following::where('auth_id',Auth::user()->id)->where('status',1)->count();
         
            $follower   =  Follower::where('auth_id',Auth::user()->id)->where('status',1)->count();
         
            $advisory_listings = AdvisoryListing::orderby('id','desc')->get();
         
            $advisory_request = AdvisoryRequest::with('users')->where('listing_user_id',Auth::user()->id)->orderby('id','desc')->get();
            
            $saved_post = Save::with('posts','users')->where('user_id',Auth::user()->id)->where('status','1')->orderby('id','desc')->get();
            
            // dd($saved_post);
		    
		    return view('profile',compact('posts','following','follower','advisory_listings','advisory_request','saved_post'));
        
            
        }else{
            return redirect()->route('index');
        }
         
       
    }
    
    public function profileUpdate(Request $request)
    {   
        $data = $request->except(['_token']);
        
        // dd($data);
        
        if($request->ajax()){
            
            $data = $request->except(['_token']);
            
            if($request->file('image')){
                  
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('front/images/users'), $imageName);
                $data['image'] = $imageName;
               
            }
            
            if($request->file('cover_image')){
                  
                $imageName = $request->cover_image->getClientOriginalName();
                $request->cover_image->move(public_path('front/images/users'), $imageName);
                $data['cover_image'] = $imageName;
               
            }
            
            // dd($data);
            
            if(User::whereId($request->id)->update($data)){
                return response()->json(['status'=>true,'message'=>'Profile Updated!']);
            }
        }
        
        User::whereId($request->id)->update($data);
        return redirect()->back()->with('success','Profile Updated!');
    }
    
    public function topAdvisors()
    {
        
		return view('top-advisors');
       
    }
    
    public function advisory(Request $request)
    {   
        if($request->search){
            $categories =   Category::where('status','1')->get(); 
            
            $skills     =   Skill::where('status','1')->get();
            $tags       =   Tag::where('status','1')->get();
            
           $advisory_listings = AdvisoryListing::where('listing_name', 'LIKE', '%'. $request->get('search'). '%')->get();
           
            $comments   =   Comment::orderby('id','desc')->get();
        }
        elseif($request->mode){
            
            $categories =   Category::where('status','1')->get(); 
            
            $skills     =   Skill::where('status','1')->get();
            $tags       =   Tag::where('status','1')->get();
            
           // $advisory_listings = AdvisoryListing::where('mode', 'LIKE', '%'. $request->get('mode'). '%')->where('added_by','!=',Auth::user()->id)->get();
            $advisory_listings = AdvisoryListing::where('mode', 'LIKE', '%'. $request->get('mode'). '%')->get();
           
            $comments   =   Comment::orderby('id','desc')->get();
        }
        else{
            if(Auth::check()){
               
                $categories =   Category::where('status','1')->get(); 
                
                $skills     =   Skill::where('status','1')->get();
                $tags       =   Tag::where('status','1')->get();
                
                $advisory_listings = AdvisoryListing::orderby('id','desc')->where('added_by','!=',Auth::user()->id)->get();
                
              
                $comments   =   Comment::orderby('id','desc')->get();
            }else{
                
                $categories =   Category::where('status','1')->get(); 
                
                $skills     =   Skill::where('status','1')->get();
                $tags       =   Tag::where('status','1')->get();
                
                // $advisory_listings = AdvisoryListing::orderby('id','desc')->where('added_by','!=',Auth::user()->id)->get();
                $advisory_listings = AdvisoryListing::orderby('id','desc')->get();
                
              
                $comments   =   Comment::orderby('id','desc')->get();
            }
        }
       
		return view('advisory',compact('categories','skills','tags','advisory_listings','comments'/*,'likes'*/));

    }

    public function SendAdvisoryRequest(Request $request)
    {
        $data = $request->except('_token');
        
        // dd($data);
        
        if($data){
            AdvisoryRequest::create($data);
        
            return response()->json(['status'=>true,'message'=>'Request Sent Successfully!']);
        }else{
             return response()->json(['status'=>false,'message'=>'Something went wrong!']);
        }
        
    }
    
    public function autocomplete(Request $request)
    {
        $data = AdvisoryListing::select("listing_name as value", "id")
                    ->where('listing_name', 'LIKE', '%'. $request->get('search'). '%')
                    ->where('added_by','!=',Auth::user()->id)
                    ->get();
        
            return response()->json($data);
       
        
    }
    
    public function getState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name","id"]);
        return response()->json($data);
    }
    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name","id"]);
        return response()->json($data);
    }
    
    public function accountSetting()
    {   
         $advisory_request = AdvisoryRequest::with('users')->where('listing_user_id',Auth::user()->id)->where('status','pending')->orderby('id','desc')->get();
        
		 return view('account-setting',compact('advisory_request'));
       
    }
    
    public function changeStatus(Request $request)
    {
        $data = $request->except('_token');
        
        // dd($data);
        
        if($data){
            
            AdvisoryRequest::whereId($request->id)->update(['status'=>$request->status]);
            
            if($request->status == 'accepted'){
                 $message = 'Request Accepted!';
            }else{
                 $message = 'Request Rejected!';
            }
            
            return response()->json(['status'=>true,'message'=>$message]);
            
        }else{
             return response()->json(['status'=>false,'message'=>'Something went wrong!']);
        }
    }
    
    public function messages()
    {   
		return view('messages');
       
    }
    
    public function requirements(Request $request)
    {   
	    $data = $request->except(['_token']); 
	    
        $validator = Validator::make($request->all(), [
            'title'     => 'required', 
            'category'  => 'required', 
            'skill'     => 'required', 
            'tag'       => 'required', 
        ]);
        
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            
            $data['category'] = implode(',',$request->category);
            $data['skill'] = implode(',',$request->skill);
            $data['tag'] = implode(',',$request->tag);
            
            $data['slug'] = Str::slug($request->title);
            
            $data['created_by'] = Auth::user()->id;
            
            Requirement::create($data);
            
            return redirect()->back()->withSuccess('New Requirement Updated!');
        }
       
        
       
    }
    
    public function posts(Request $request)
    {   
		$data = $request->except(['_token']); 
	    
        $validator = Validator::make($request->all(), [
            'title'     => 'required', 
            'category'  => 'required', 
            'skill'     => 'required', 
            'tag'       => 'required', 
        ]);
        
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            
            $data['category'] = implode(',',$request->category);
            $data['skill'] = implode(',',$request->skill);
            $data['tag'] = implode(',',$request->tag);
            
             $data['slug'] = Str::slug($request->title);
            
            $data['created_by'] = Auth::user()->id;
            
            Post::create($data);
            
            return redirect()->back()->withSuccess('New Post Updated!');
        }
       
    }
    
    public function postDetails($slug)
    {   
        
        $categories =   Category::where('status','1')->get();
        
        $skills     =   Skill::where('status','1')->get();
        $tags       =   Tag::where('status','1')->get();
        
        $comments   =   Comment::orderby('id','desc')->get();
        
        $post = Post::with('users')->where('slug',$slug)->first();
        
        return view('post-details',compact('post','categories','skills','tags','comments'));
    }
    
    
    public function like(Request $request)
    {   
        $exists =  Like::where('user_id',$request->user_id)
                ->where('blog_type',$request->blog_type)
                ->where('blog_id',$request->blog_id)
                ->exists();
                
        if($exists == false){
            
                $like = new Like;
                $like->user_id = $request->user_id;
                $like->blog_type = $request->blog_type;
                $like->blog_id = $request->blog_id;
                $like->status = 1;
                
                $like->save();
                
                return redirect()->back()->with('success','Liked!');
        }
        else{
           
            if(Like::where('user_id',$request->user_id)
                ->where('blog_type',$request->blog_type)
                ->where('blog_id',$request->blog_id)
                ->where('status',1)
                ->exists() == true){
                   
                    Like::where('user_id',$request->user_id)
                        ->where('blog_type',$request->blog_type)
                        ->where('blog_id',$request->blog_id)
                        ->where('status',1)
                        ->update(['status'=>0]);
                        
                return redirect()->back()->with('error','Disliked');
            }
            elseif(Like::where('user_id',$request->user_id)
                ->where('blog_type',$request->blog_type)
                ->where('blog_id',$request->blog_id)
                ->where('status',0)
                ->exists() == true){
                    
                    Like::where('user_id',$request->user_id)
                        ->where('blog_type',$request->blog_type)
                        ->where('blog_id',$request->blog_id)
                        ->where('status',0)
                        ->update(['status'=>1]);
                        
                     return redirect()->back()->with('success','Liked');
            } else{
               
                return redirect()->back();
            }
        }
        
    }
    
    
    public function comment(Request $request)
    {
        if(Auth::check())
        {
            $user = User::find($request->user_id);
                
            $comment = new Comment;
            $comment->user_id = $request->user_id;
            $comment->blog_type = $request->blog_type;
            $comment->blog_id = $request->blog_id;
            $comment->user_name = $user->name;
            $comment->comment = $request->comment;
            
            $comment->save();
            
            return redirect()->back()->with('success','Commented!');
        }else{
            return redirect()->route('login')->with('error','Login First!');
        }
    }
    
     public function save(Request $request)
    {   
        $exists =  Save::where('user_id',$request->user_id)
                ->where('blog_type',$request->blog_type)
                ->where('blog_id',$request->blog_id)
                ->exists();
                
        if($exists == false){
            
                $save = new Save;
                $save->user_id = $request->user_id;
                $save->blog_type = $request->blog_type;
                $save->blog_id = $request->blog_id;
                $save->status = 1;
                
                $save->save();
                
                return redirect()->back()->with('success','Saved!');
        }
        else{
           
            if(Save::where('user_id',$request->user_id)
                ->where('blog_type',$request->blog_type)
                ->where('blog_id',$request->blog_id)
                ->where('status',1)
                ->exists() == true){
                   
                    Save::where('user_id',$request->user_id)
                        ->where('blog_type',$request->blog_type)
                        ->where('blog_id',$request->blog_id)
                        ->where('status',1)
                        ->update(['status'=>0]);
                        
                return redirect()->back()->with('error','Unsaved');
            }
            elseif(Save::where('user_id',$request->user_id)
                ->where('blog_type',$request->blog_type)
                ->where('blog_id',$request->blog_id)
                ->where('status',0)
                ->exists() == true){
                    
                    Save::where('user_id',$request->user_id)
                        ->where('blog_type',$request->blog_type)
                        ->where('blog_id',$request->blog_id)
                        ->where('status',0)
                        ->update(['status'=>1]);
                        
                     return redirect()->back()->with('success','Saved');
            } else{
               
                return redirect()->back();
            }
        }
        
    }
    
    
     public function following(Request $request)
    {   
        $exists =  Following::where('auth_id',$request->auth_id)
                   ->where('user_id',$request->user_id)
                   ->exists();
                
        if($exists == false){
            
                $following = new Following;
                $following->auth_id = $request->auth_id;
                $following->user_id = $request->user_id;
                $following->status = 1;
                
                $following->save();
                
                $follower = new Follower;
                $follower->auth_id = $request->user_id;
                $follower->user_id = $request->auth_id;
                $follower->status = 0;
                
                $follower->save();
                
                return redirect()->back()->with('success','Followed!');
        }
        else{
           
            if(Following::where('auth_id',$request->auth_id)
                   ->where('user_id',$request->user_id)
                   ->where('status',1)
                   ->exists() == true){
                   
                    Following::where('auth_id',$request->auth_id)
                                ->where('user_id',$request->user_id)
                                ->where('status',1)
                                ->update(['status'=>0]);
                        
                return redirect()->back()->with('error','Unfollowed!');
            }
            elseif(Following::where('auth_id',$request->auth_id)
                    ->where('user_id',$request->user_id)
                    ->where('status',0)
                    ->exists() == true){
                    
                    Following::where('auth_id',$request->auth_id)
                                ->where('user_id',$request->user_id)
                                ->where('status',0)
                                ->update(['status'=>1]);
                        
                     return redirect()->back()->with('success','Followed!');
            } else{
               
                return redirect()->back();
            }
        }
        
    }
    
    
    public function CheckStatus()
    {   
        $data = User::where('is_active','1')->pluck('id');
        return response()->json(['status'=>true,'data'=>$data]);
    }
    
    
    public function advisoryListingCreate(Request $request)
    {   
       
        // dd($request->all());
        $data = $request->except(['_token','id']); 
        
        if($request->file('image')){
                  
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('front/images/advisory_listing'), $imageName);
            $data['image'] = $imageName;
           
        }
        
        $data['slug'] = Str::slug($request->listing_name);
            
        $data['added_by'] = Auth::user()->id;
        $data['mode'] = json_encode($request->mode);
	    if($data){
            AdvisoryListing::create($data);
            
            return response()->json(['status'=>true,'message'=>'Advisory Listing Added!']);
        }else{
            return response()->json(['status'=>false,'message'=>'Something went wrong!']);
        }
    }
    
     public function advisoryListingEdit($id)
    {
        $data = AdvisoryListing::find($id);
        return response()->json($data);
    }
    
    public function advisoryListingUpdate(Request $request)
    {   
      
        $data = $request->except(['_token','method']); 
        
        if($request->file('image')){
                  
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('front/images/advisory_listing'), $imageName);
            $data['image'] = $imageName;
           
        }
        $data['mode'] = json_encode($request->mode);
        
        if($data){
            AdvisoryListing::whereId($request->id)->update($data);
            
            return response()->json(['status'=>true,'message'=>'Advisory Listing Updated!']);
        }else{
            return response()->json(['status'=>false,'message'=>'Something went wrong!']);
        }
    }
    
    
    public function advisoryListingDelete($id)
    {
        AdvisoryListing::find($id)->delete();
      
        return response()->json(['status'=>false,'message'=>'Advisory Listing Deleted!']);
    }
   
    

}
