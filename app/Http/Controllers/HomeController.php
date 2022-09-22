<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Category,Skill,Tag,Requirement,Post,Like,Comment,Save,Following,Follower,AdvisoryListing,AdvisoryRequest,BusinessProfile};
use Auth;
use Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    
    
	public function index() 
    {
        $config['categories'] =   Category::where('status','1')->get();       
        $config['skills']     =   Skill::where('status','1')->get();
        $config['tags']       =   Tag::where('status','1')->get();
    
        if(Auth::check()){
            $posts      =   Post::with('users','comments')->where('created_by','!=',Auth::user()->id)->orderby('id','desc')->get();
            $users      =   User::where('id','!=',Auth::user()->id)->limit(5)->orderby('id','desc')->get();
        }else{
            $posts      =   Post::with('users','comments')->orderby('id','desc')->get();
            $users      =   User::limit(5)->orderby('id','desc')->get();
        }
		return view('index',compact('config','posts','users'/*,'likes'*/));
       
    }
    
    public function profile()
    {   
        
        if(Auth::check()){
            
            $posts                =   Post::where('created_by',Auth::user()->id)->orderby('id','desc')->get();
            
            $following            =   Following::where('auth_id',Auth::user()->id)->where('status',1)->count();
         
            $follower             =   Follower::where('auth_id',Auth::user()->id)->where('status',1)->count();
         
            $advisory_listings    =   AdvisoryListing::where('added_by',Auth::user()->id)->orderby('id','desc')->get();
            
            $business_profile     =   BusinessProfile::orderby('id','desc')->get();
         
            $advisory_request     =   AdvisoryRequest::with('users')->where('listing_user_id',Auth::user()->id)->orderby('id','desc')->get();
           
            $request_sent         =   AdvisoryRequest::with('listing_user')->where('user_id',Auth::user()->id)->orderby('id','desc')->get();
            
            $saved_post           =   Save::with('posts','users')->where('blog_type','post')->where('user_id',Auth::user()->id)->where('status','1')->orderby('id','desc')->get();
            
            $config['categories'] =   Category::where('status','1')->get();       
            $config['skills']     =   Skill::where('status','1')->get();
            $config['tags']       =   Tag::where('status','1')->get();

		    
		    return view('profile',compact('config','posts','following','follower','advisory_listings','business_profile','advisory_request','request_sent','saved_post'));
        
            
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
        // dd($request);
        $config['categories'] =   Category::where('status','1')->get();       
        $config['skills']     =   Skill::where('status','1')->get();
        $config['tags']       =   Tag::where('status','1')->get();
        
        if($request->search){
            
            $advisory_listings = AdvisoryListing::where('listing_name', 'LIKE', '%'. $request->get('search'). '%')->get();
        }
        elseif($request->mode){
           
            $advisory_listings = AdvisoryListing::where('mode', 'LIKE', '%'. $request->get('mode'). '%')->get();
        }
        elseif($request->from && $request->to){
            
            $advisory_listings = AdvisoryListing::whereBetween('fees', [$request->from, $request->to])->get();
        }
        else{
           
            if(Auth::check()){           
                
                $advisory_listings = AdvisoryListing::orderby('id','desc')->where('added_by','!=',Auth::user()->id)->get();
                
            }else{
                        
                $advisory_listings = AdvisoryListing::orderby('id','desc')->get();
            }
        }
       
		return view('advisory',compact('config','advisory_listings'));

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
         $advisory_request     =   AdvisoryRequest::with('users')->where('listing_user_id',Auth::user()->id)->where('status','pending')->orderby('id','desc')->get();
         $config['categories'] =   Category::where('status','1')->get();       
         $config['skills']     =   Skill::where('status','1')->get();
         $config['tags']       =   Tag::where('status','1')->get();
		 return view('account-setting',compact('advisory_request','config'));
       
    }
    
    public function changeStatus(Request $request)
    {
        $data = $request->except('_token');
        
        // dd($data);
        
        if($data){
            
            $message = "";
            if($request->status == '2'){
                 AdvisoryRequest::whereId($request->id)->update(['status'=>$request->status,'reason_for_reject'=>Null]);
                 $message = 'Request Accepted!';
            }
            elseif($request->status == '3'){
                AdvisoryRequest::whereId($request->id)->update(['status'=>$request->status,'reason_for_reject'=>$request->reason]);
                 $message = 'Request Rejected!';
            }
            elseif($request->status == '4'){
                AdvisoryRequest::whereId($request->id)->update(['status'=>$request->status,'reason_for_reject'=>Null]);
                 $message = 'Payment Done!';
            }
            elseif($request->status == '5'){
                AdvisoryRequest::whereId($request->id)->update(['status'=>$request->status,'feedback'=>$request->feedback]);
                 $message = 'Satisfied!';
            }
            elseif($request->status == '6'){
                AdvisoryRequest::whereId($request->id)->update(['status'=>$request->status,'feedback'=>$request->feedback]);
                 $message = 'Dissatisfied!';
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
            
            $data['category']   = implode(',',$request->category);
            $data['skill']      = implode(',',$request->skill);
            $data['tag']        = implode(',',$request->tag);
            
            $data['slug']       = Str::slug($request->title);
            
            $data['created_by'] = Auth::user()->id;
            
            Requirement::create($data);
            
            return redirect()->back()->withSuccess('New Requirement Updated!');
        }
       
        
       
    }
    
    public function posts(Request $request)
    {   
		$data = $request->except(['_token','id']); 
	    
        $validator = Validator::make($request->all(), [
            'title'     => 'required', 
            'category'  => 'required', 
            'skill'     => 'required', 
            'tag'       => 'required', 
        ]);

        /* check if category is new*/
        $new_cat = addNewCategory($request->category);
        if(!empty($new_cat)){
            $request->category = $new_cat;
        }
        /* check if skill is new*/
        $new_skill = addNewSkill($request->skill);
        if(!empty($new_skill)){
            $request->skill = $new_skill;
        }
        /* check if tag is new */
        $new_tag = addNewTag($request->skill);
        if(!empty($new_tag)){
            $request->tag = $new_tag;
        }
        
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            if($request->file('image')){   
                $imageName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move(public_path('front/images/posts'), $imageName);
                $data['image'] = $imageName;
            }
            
            $data['category']   = implode(',',$request->category);
            $data['skill']      = implode(',',$request->skill);
            $data['tag']        = implode(',',$request->tag); 
            $data['slug']       = Str::slug($request->title);
            $data['created_by'] = Auth::user()->id;
            
            Post::create($data);
            
            return redirect()->back()->withSuccess('New Post Updated!');
        }
       
    }

    public function postEdit($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }
    
    public function postDetails($slug)
    {   
        $config['categories'] =   Category::where('status','1')->get();       
        $config['skills']     =   Skill::where('status','1')->get();
        $config['tags']       =   Tag::where('status','1')->get();
        
        $post = Post::with('users','comments')->where('slug',$slug)->first();
        
        return view('post-details',compact('post','config'));
    }

    public function postUpdate(Request $request)
    {   
        if(!$request->id){
            return redirect()->back()->withError('Something went wrong !');
        }

		$data = $request->except(['_token','id']); 
	    
        $validator = Validator::make($request->all(), [
            'title'     => 'required', 
            'category'  => 'required', 
            'skill'     => 'required', 
            'tag'       => 'required', 
        ]);

        /* check if category is new*/
        $new_cat = addNewCategory($request->category);
        if(!empty($new_cat)){
            $request->category = $new_cat;
        }
        /* check if skill is new*/
        $new_skill = addNewSkill($request->skill);
        if(!empty($new_skill)){
            $request->skill = $new_skill;
        }
        /* check if tag is new */
        $new_tag = addNewTag($request->tag);
        if(!empty($new_tag)){
            $request->tag = $new_tag;
        }
        
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            if($request->file('image')){   
                $imageName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move(public_path('front/images/posts'), $imageName);
                $data['image'] = $imageName;
            }
            
            $data['category']   = implode(',',$request->category);
            $data['skill']      = implode(',',$request->skill);
            $data['tag']        = implode(',',$request->tag); 
            $data['slug']       = Str::slug($request->title);
            
            Post::find($request->id)->update($data);
            
            return redirect()->back()->withSuccess('New Post Updated!');
        }
       
    }

    public function postDelete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return response()->json([
            'status' => true,
            'message' => "Post deleted Successfully"
        ]);
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
                $following->status  = 1;
                
                $following->save();
                
                $follower = new Follower;
                $follower->auth_id = $request->user_id;
                $follower->user_id = $request->auth_id;
                $follower->status  = 0;
                
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
        
        $data['slug']       = Str::slug($request->listing_name);
            
        $data['added_by']   = Auth::user()->id;
        $data['mode']       = json_encode($request->mode);
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
   
    public function businessProfileCreate(Request $request)
    {   
       
        $data = $request->except(['_token','id']); 

        $images=array();
            if($files=$request->file('org_images')){
                foreach($files as $file){
                    $imageName = $file->getClientOriginalName();
                    $file->move(public_path('front/images/business_profile'),$imageName);
                    $images[] = $imageName;
                }
                $data['org_images'] = implode(',',$images);
            }
           
        $data['user_id'] = Auth::user()->id;
        $data['nature_of_business'] = json_encode($request->nature_of_business);

        // dd($data);
	    if($data){
            BusinessProfile::create($data);
            
            return response()->json(['status'=>true,'message'=>'Business Profile Added!']);
        }else{
            return response()->json(['status'=>false,'message'=>'Something went wrong!']);
        }
    }
    
     public function businessProfileEdit($id)
    {
        $data = BusinessProfile::find($id);
        return response()->json($data);
    }
    
    public function businessProfileUpdate(Request $request)
    {   
       
        $data = $request->except(['_token','method']); 
        
        $images=array();
            if($files=$request->file('org_images')){
                foreach($files as $file){
                    $imageName = $file->getClientOriginalName();
                    $file->move(public_path('front/images/business_profile'),$imageName);
                    $images[] = $imageName;
                }
                $data['org_images'] = implode(',',$images);
            }
           
        $data['nature_of_business'] = json_encode($request->nature_of_business);
        
        if($data){
            BusinessProfile::whereId($request->id)->update($data);
            
            return response()->json(['status'=>true,'message'=>'Business Profile Updated!']);
        }else{
            return response()->json(['status'=>false,'message'=>'Something went wrong!']);
        }
    }
    
    
    public function businessProfileDelete($id)
    {   
        
        BusinessProfile::find($id)->delete();
      
        return response()->json(['status'=>false,'message'=>'Business Profile Deleted!']);
    }

}
