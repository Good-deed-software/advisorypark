@extends('layout.app')

@section('content')
	
		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3 col-md-4 pd-left-none no-pd">
								<div class="main-left-sidebar no-margin">
									<div class="suggestions full-width">
										<div class="sd-title">
											<h3>Suggestions</h3>
											<!--<i class="la la-ellipsis-v"></i>-->
										</div><!--sd-title end-->
										<div class="suggestions-list">
										   @foreach($users as $u) 
											<div class="suggestion-usd">
												<img src='{{asset("front/images/user/$u->image")}}' alt="">
												<div class="sgt-text">
													<h4>{{$u->name}} @auth <i id="user_status_{{$u->id}}" class="user_active_status fa fa-circle {{($u->is_active == '1') ? 'text-success' : 'text-danger' }} " aria-hidden="true"></i>@endauth</h4>
													<span>{{$u->designation}}</span>
												</div>
												
												@auth
												<a class="float-right" href="{{route('following')}}?auth_id={{Auth::user()->id}}&user_id={{$u->id}}">
												    <i {!! App\Models\Following::where('auth_id',Auth::user()->id)->where('user_id',$u->id)->where('status',1)->exists() == true ? ' class="la la-check-square la-2x bg-primary" style="color:#fff"' : 'class="la la-plus-square la-2x" style="background:#fff;color:#000"' !!}></i>
												</a>
												 @else
											    <a class="float-right" href="{{route('login')}}">
											        <i class="la la-plus-square la-2x" ></i> 
											    </a>
											    @endauth
												
											</div>
										   @endforeach	
											<div class="view-more">
												<a href="#" title="">View More</a>
											</div>
										</div><!--suggestions-list end-->
									</div><!--suggestions end-->
									<div class="tags-sec full-width">
										<ul>
											<li><a href="#" title="">Help Center</a></li>
											<li><a href="#" title="">About</a></li>
											<li><a href="#" title="">Privacy Policy</a></li>
											<li><a href="#" title="">Community Guidelines</a></li>
											<li><a href="#" title="">Cookies Policy</a></li>
											<li><a href="#" title="">Career</a></li>
											<li><a href="#" title="">Language</a></li>
											<li><a href="#" title="">Copyright Policy</a></li>
										</ul>
										<div class="cp-sec">
											<!--<img src="{{asset('front/images/logo2.png')}}" alt="">-->
											<p><img src="{{asset('front/images/cp.png')}}" alt="">Copyright 2018</p>
										</div>
									</div><!--tags-sec end-->
								</div><!--main-left-sidebar end-->
							</div>
							<div class="col-lg-6 col-md-8 no-pd">
								<div class="main-ws-sec">
									<div class="post-topbar">
										<div class="user-picy">
											<img src="http://via.placeholder.com/100x100" alt="">
										</div>
										<div class="post-st">
											<ul>
											<!--	<li><a class="post_project" href="#" title="">Post a Requirement</a></li>-->
												<li><a class="post-jb active" href="#" title="">Post</a></li>
											</ul>
										</div><!--post-st end-->
									</div><!--post-topbar end-->
									<div class="posts-section">
									  @if(count($posts) > 0)
									  @foreach($posts as $data)
										<div class="post-bar">
											<div class="post_topbar">
												<div class="usy-dt">
													<img src="http://via.placeholder.com/50x50" alt="">
													<div class="usy-name">
														<h3>{{$data->users->name}}</h3>
														<span><img src="{{asset('front/images/clock.png')}}" alt="">{{$data->created_at->diffForHumans()}}</span>
													</div>
												</div>
											<!--<div class="ed-opts">
													<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
													<ul class="ed-options">
														<li><a href="#" title="">Edit Post</a></li>
														<li><a href="#" title="">Unsaved</a></li>
														<li><a href="#" title="">Unbid</a></li>
														<li><a href="#" title="">Close</a></li>
														<li><a href="#" title="">Hide</a></li>
													</ul>
												</div>-->
											</div>
											<div class="epi-sec">
												<ul class="descp">
													<li><img src="{{asset('front/images/icon8.png')}}" alt=""><span>{{$data->users->designation}}</span></li>
													<li><img src="{{asset('front/images/icon9.png')}}" alt=""><span>India</span></li>
												</ul>
												<ul class="bk-links">
												
													<li>
													    @auth
													    <a href="{{route('save')}}?user_id={{Auth::user()->id}}&blog_type=post&blog_id={{$data->id}}" >
													     <i class="la la-bookmark"  {!! App\Models\Save::where('user_id',Auth::user()->id)->where('blog_type','post')->where('blog_id',$data->id)->where('status',1)->exists() == true ? 'style="background:#53d690;color:#fff"' : 'style="background:#fff;color:#000"' !!}></i> 
													    </a>
													    @else
													    <a href="{{route('login')}}" title="">
													     <i class="la la-bookmark" ></i> 
													    </a>
													    @endauth
													 </li>
													<!--<li><a href="#" title=""><i class="la la-envelope"></i></a></li>-->
												</ul>
											</div>
											<div class="job_descp">
											    <span class="badge badge-info float-right">{{$data->categories->name}}</span>
												<a href="{{route('post_details',$data->slug)}}"><h3>{{$data->title}}</h3></a>
												<!--<ul class="job-dt">
													<li><a href="#" title="">Full Time</a></li>
													<li><span>$30 / hr</span></li>
												</ul>-->
												<p class="more">{{$data->description}}</p> 
												<!--<p>{{Str::limit($data->description,200)}} <a href="#" title="">view more</a></p>-->
												
												@php 
												    $kk = \DB::select("select name from skills where id in ($data->skill)");
												  
												@endphp 
												
												
												
												<ul class="skills">
												    @foreach($kk as $v)
													<li><a href="#" title="">{{$v->name}}</a></li>
													@endforeach
												</ul>
												
												
												
												@php 
												    $kk = \DB::select("select name from tags where id in ($data->tag)");
												  
												@endphp 
												
												<ul class="skill-tags">
												    @foreach($kk as $v)
													<li><a href="#" title="">{{$v->name}}</a></li>
													@endforeach
												</ul>
											</div>
											<div class="job-status-bar">
												<ul class="like-com">
													@auth
													 <li>
													    <a href="{{route('like')}}?user_id={{Auth::user()->id}}&blog_type=post&blog_id={{$data->id}}" {!! App\Models\Like::where('user_id',Auth::user()->id)->where('blog_type','post')->where('blog_id',$data->id)->where('status',1)->exists() == true ? 'style="color:#008069"' : '' !!}>
    													   <i class="la la-heart" ></i> Like {{App\Models\Like::where('blog_type','post')->where('blog_id',$data->id)->where('status',1)->count()}} 
    													 </a>
													 </li>
													 <li>
													    <a href="javascript:void(0)" onclick="openComment({{$data->id}})" class="comment p-0">
													     <i class="la la-comment"></i> Comment {{ count($data->comments) }}</a>
													 </li>
													 <li>
													    <a href="javascript:void(0)" class="share">
													     <i class="la la-share"></i> Share </a>
													 </li>
													 
													 <li class="social-media-icons" style="display: none;">
                                                        <a target="_blank" href="https://api.whatsapp.com/send?text={{route('post_details',$data->slug)}}" data-action="share/whatsapp/share">
                                                            <i class="la la-whatsapp"></i>
                                                        </a> 
                                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('post_details',$data->slug)}}">
                                                            <i class="la la-facebook"></i>
                                                        </a> 
                                                        <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{route('post_details',$data->slug)}}">
                                                            <i class="la la-linkedin"></i>
                                                        </a>
                                                        <a target="_blank" href="https://telegram.me/share/url?url={{route('post_details',$data->slug)}}">
                                                            <i class="la la-telegram"></i>
                                                        </a> 
                                                        <a target="_blank" href="https://twitter.com/intent/tweet?text={{route('post_details',$data->slug)}}">
                                                            <i class="la la-twitter"></i>
                                                        </a> 
                                                     </li>
													 
													 @else
													 <li>
													    <a href="{{route('login')}}">
													     <i class="la la-heart-o"></i> Like {{App\Models\Like::where('blog_type','post')->where('blog_id',$data->id)->where('status',1)->count()}}</a>
													 </li>
													 <li>
													    <a href="javascript:void(0)" onclick="openComment({{$data->id}})" class="comment p-0">
													     <i class="la la-comment"></i> Comment {{ count($data->comments) }}</a>
													 </li>
													 <li>
													    <a href="{{route('login')}}" class="share">
													     <i class="la la-share"></i> Share</a>
													 </li>
													 @endauth
												</ul>
												<a><i class="la la-eye"></i>Views</a>
											</div>
											<div class="bg-light p-2 comment-box" id="comment-box-{{$data->id}}" style="display:none;">
											    <form action="{{route('comment')}}" method="post">
											        @csrf
											        <input type="hidden" name="user_id" value="@auth {{Auth::user()->id}} @endif">
											        <input type="hidden" name="blog_type" value="post">
											        <input type="hidden" name="blog_id" value="{{$data->id}}">
                                                    <div class="">
                                                        <textarea class="form-control ml-1 shadow-none textarea" placeholder="write a comment..." name="comment"></textarea>
                                                    </div>
                                                    <div class="mt-2 text-right">
                                                        <button class="btn btn-sm shadow-none" type="submit" style="background:#008069;color:#fff">
                                                            Post comment
                                                        </button>
                                                    </div>
                                                </form>
                                                 
                                                @foreach($data->comments as $cm)
                                                <div class="commented-section m-2">
                                                    <div class="d-flex flex-row align-items-center commented-user">
                                                       <h5 class="mr-2"> {{$cm->user_name}}</h5>
                                                        <span class="dot mb-1"></span>
                                                        <span class="mb-1 ml-2">{{$cm->created_at->diffForHumans()}}</span>
                                                    </div>
                                                    <div class="comment-text-sm offset-1">
                                                        <p>{{$cm->comment}}</p>
                                                    </div>
                                                </div>
                                                @endforeach 
                                            </div>
										</div>
									  @endforeach
									  @else
					  				   <h5 class="text-center">No Post Found.</h5>
					  				  @endif
									
									</div>
								</div>
							</div>
							<div class="col-lg-3 pd-right-none no-pd">
								<div class="right-sidebar">
								<div class="widget widget-jobs">
										<div class="sd-title">
											<h3>Most Viewed This Week</h3>
											<i class="la la-ellipsis-v"></i>
										</div>
										<div class="jobs-list">
											<div class="job-info">
												<div class="job-details">
													<h3>Senior Product Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>₹500/hr</span>
												</div>
											</div>
											<div class="job-info">
												<div class="job-details">
													<h3>Senior UI / UX Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>₹550/hr</span>
												</div>
											</div>
											<div class="job-info">
												<div class="job-details">
													<h3>Junior Seo Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>₹200/hr</span>
												</div>
											</div>
										</div>
									</div>
									{{--<div class="widget suggestions full-width">
										<div class="sd-title">
											<h3>Most Viewed People</h3>
											<i class="la la-ellipsis-v"></i>
										</div>
										<div class="suggestions-list">
											@foreach($users as $u) 
											<div class="suggestion-usd">
												<img src='{{asset("front/images/user/$u->image")}}' alt="">
												<div class="sgt-text">
													<h4>{{$u->name}}</h4>
													<span>{{$u->designation}}</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
										    @endforeach	
											<div class="view-more">
												<a href="#" title="">View More</a>
											</div>
										</div>
									</div>--}}
								</div>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</main>





	<!--	<div class="chatbox-list">
			<div class="chatbox">
				<div class="chat-mg">
					<a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
					<span>2</span>
				</div>
				<div class="conversation-box">
					<div class="con-title mg-3">
						<div class="chat-user-info">
							<img src="http://via.placeholder.com/34x33" alt="">
							<h3>John Doe <span class="status-info"></span></h3>
						</div>
						<div class="st-icons">
							<a href="#" title=""><i class="la la-cog"></i></a>
							<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
							<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
						</div>
					</div>
					<div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
						<div class="chat-msg">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
							<span>Sat, Aug 23, 1:10 PM</span>
						</div>
						<div class="date-nd">
							<span>Sunday, August 24</span>
						</div>
						<div class="chat-msg st2">
							<p>Cras ultricies ligula.</p>
							<span>5 minutes ago</span>
						</div>
						<div class="chat-msg">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
							<span>Sat, Aug 23, 1:10 PM</span>
						</div>
					</div>
					<div class="typing-msg">
						<form>
							<textarea placeholder="Type a message here"></textarea>
							<button type="submit"><i class="fa fa-send"></i></button>
						</form>
						<ul class="ft-options">
							<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
							<li><a href="#" title=""><i class="la la-camera"></i></a></li>
							<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="chatbox">
				<div class="chat-mg">
					<a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
				</div>
				<div class="conversation-box">
					<div class="con-title mg-3">
						<div class="chat-user-info">
							<img src="http://via.placeholder.com/34x33" alt="">
							<h3>John Doe <span class="status-info"></span></h3>
						</div>
						<div class="st-icons">
							<a href="#" title=""><i class="la la-cog"></i></a>
							<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
							<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
						</div>
					</div>
					<div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
						<div class="chat-msg">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
							<span>Sat, Aug 23, 1:10 PM</span>
						</div>
						<div class="date-nd">
							<span>Sunday, August 24</span>
						</div>
						<div class="chat-msg st2">
							<p>Cras ultricies ligula.</p>
							<span>5 minutes ago</span>
						</div>
						<div class="chat-msg">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
							<span>Sat, Aug 23, 1:10 PM</span>
						</div>
					</div>
					<div class="typing-msg">
						<form>
							<textarea placeholder="Type a message here"></textarea>
							<button type="submit"><i class="fa fa-send"></i></button>
						</form>
						<ul class="ft-options">
							<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
							<li><a href="#" title=""><i class="la la-camera"></i></a></li>
							<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="chatbox">
				<div class="chat-mg bx">
					<a href="#" title=""><img src="http://via.placeholder.com/34x33" alt=""></a>
					<span>2</span>
				</div>
				<div class="conversation-box">
					<div class="con-title">
						<h3>Messages</h3>
						<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
					</div>
					<div class="chat-list">
						<div class="conv-list active">
							<div class="usrr-pic">
								<img src="http://via.placeholder.com/50x50" alt="">
								<span class="active-status activee"></span>
							</div>
							<div class="usy-info">
								<h3>John Doe</h3>
								<span>Lorem ipsum dolor <img src="{{asset('front/images/smley.png')}}" alt=""></span>
							</div>
							<div class="ct-time">
								<span>1:55 PM</span>
							</div>
							<span class="msg-numbers">2</span>
						</div>
						<div class="conv-list">
							<div class="usrr-pic">
								<img src="http://via.placeholder.com/50x50" alt="">
							</div>
							<div class="usy-info">
								<h3>John Doe</h3>
								<span>Lorem ipsum dolor <img src="{{asset('front/images/smley.png')}}" alt=""></span>
							</div>
							<div class="ct-time">
								<span>11:39 PM</span>
							</div>
						</div>
						<div class="conv-list">
							<div class="usrr-pic">
								<img src="http://via.placeholder.com/50x50" alt="">
							</div>
							<div class="usy-info">
								<h3>John Doe</h3>
								<span>Lorem ipsum dolor <img src="{{asset('front/images/smley.png')}}" alt=""></span>
							</div>
							<div class="ct-time">
								<span>0.28 AM</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-->

@endsection
@push('js')

     <style>
        .morecontent span {
            display: none;
        }
        .morelink {
            display: block;
        }
        .availability-status{
           width: 50px;
            height: 50px;
            border-radius: 100%;
            border: 2px solid #ffffff;
            
            background: #1bcfb4;
        }
    </style>
    

    <script>
        /*----open comment box-------*/
    
        function openComment(id){
            console.log(id);
            
            
            $('#comment-box-'+id).slideToggle();
        }
    
        $(document).ready(function(){
            
            /*----select2-------*/
            
            $(".multiple").select2({
                placeholder: "Select",
                allowClear: true,
                tags: true
            });
            
            
            
            $('body').on('change','#category_r',function(){
                
                var category = $(this).text();
                console.log(category);
            })
            
             $('body').on('change','#skill_r',function(){
                var skill = $(this).attr('data-val');
                console.log(skill);
            })
            
            $('body').on('change','#tag_r',function(){
                var tag = $(this).attr('data-val');
                console.log(tag);
            })
            
            
             /*----success/error toastr-------*/
           /* toastr.options.timeOut = 3000;
            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @elseif(Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif*/
            
            
             /*----show socialite on share click-------*/
            
            $(".share").on('click',function(){
                $(".social-media-icons").fadeToggle();
            });
        
        
        
            /*----show more/show less-------*/
            var showChar = 200;  
            var ellipsestext = "...";
            var moretext = "Show more";
            var lesstext = "Show less";
            
        
            $('.more').each(function() {
                var content = $(this).html();
         
                if(content.length > showChar) {
         
                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar, content.length - showChar);
         
                    var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
         
                    $(this).html(html);
                }
         
            });
         
            $(".morelink").click(function(){
                if($(this).hasClass("less")) {
                    $(this).removeClass("less");
                    $(this).html(moretext);
                } else {
                    $(this).addClass("less");
                    $(this).html(lesstext);
                }
                $(this).parent().prev().toggle();
                $(this).prev().toggle();
                return false;
            });
            
           
            
        });
        
        
        
        setInterval(ajaxCall, 5000);
        
        function ajaxCall(){
            $.getJSON("{{route('check.status')}}", (data) => {
                
                $(".user_active_status").addClass("text-danger");
                
                data.data.forEach((x)=>{
                    
                    $("#user_status_"+x).removeClass("text-danger");
                    $("#user_status_"+x).addClass("text-success");
                    
                })
            });
        }
        
        
    </script>
@endpush
