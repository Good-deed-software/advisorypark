@extends('layout.app')

@section('content')
	
		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
						    
						    <div class="col-lg-3 col-md-4 pd-left-none no-pd">
							
							</div>
							<div class="col-lg-6 col-md-8 no-pd">
								<div class="main-ws-sec">
									<div class="posts-section">
									  
										<div class="post-bar">
											<div class="post_topbar">
												<div class="usy-dt">
													<img src="http://via.placeholder.com/50x50" alt="">
													<div class="usy-name">
														<h3>{{$post->users->name}}</h3>
														<span><img src="{{asset('front/images/clock.png')}}" alt="">{{$post->created_at->diffForHumans()}}</span>
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
													<li><img src="{{asset('front/images/icon8.png')}}" alt=""><span>{{$post->users->designation}}</span></li>
													<li><img src="{{asset('front/images/icon9.png')}}" alt=""><span>{{$post->users->address}}</span></li>
												</ul>
												<ul class="bk-links">
												
													<li>
													    @auth
													    <a href="{{route('save')}}?user_id={{Auth::user()->id}}&blog_type=requirement&blog_id={{$post->id}}" >
													     <i class="la la-bookmark"  {!! App\Models\Save::where('user_id',Auth::user()->id)->where('blog_type','requirement')->where('blog_id',$post->id)->where('status',1)->exists() == true ? 'style="background:#53d690;color:#fff"' : 'style="background:#fff;color:#000"' !!}></i> 
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
												<h3>{{$post->title}}</h3>
												<!--<ul class="job-dt">
													<li><a href="#" title="">Full Time</a></li>
													<li><span>$30 / hr</span></li>
												</ul>-->
												<p class="more">{{$post->description}}</p> 
												<!--<p>{{Str::limit($post->description,200)}} <a href="#" title="">view more</a></p>-->
												
												
												@php 
												    $kk = \DB::select("select name from tags where id in ($post->tag)");
												  
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
													    <a href="{{route('like')}}?user_id={{Auth::user()->id}}&blog_type=requirement&blog_id={{$post->id}}" {!! App\Models\Like::where('user_id',Auth::user()->id)->where('blog_type','requirement')->where('blog_id',$post->id)->where('status',1)->exists() == true ? 'style="color:#008069"' : '' !!}>
    													   <i class="la la-heart" ></i> Like {{App\Models\Like::where('blog_type','requirement')->where('blog_id',$post->id)->where('status',1)->count()}} 
    													 </a>
													 </li>
													 <li>
													    <a href="javascript:void(0)" class="comment p-0">
													     <i class="la la-comment"></i> Comment {{ count($comments) }}</a>
													 </li>
													 <li>
													    <a href="javascript:void(0)" class="share">
													     <i class="la la-share"></i> Share {{ count($comments) }}</a>
													 </li>
													 
													 <li class="social arrow-left social-edia-icons" style="display: none;">
                                                        <a target="_blank" href="https://api.whatsapp.com/send?text=https://www.hrlabindia.com/blog_details/94" data-action="share/whatsapp/share">
                                                            <i class="la la-whatsapp"></i>
                                                        </a> 
                                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.hrlabindia.com/blog_details/94">
                                                            <i class="la la-facebook"></i>
                                                        </a> 
                                                        <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=https://www.hrlabindia.com/blog_details/94">
                                                            <i class="la la-linkedin"></i>
                                                        </a>
                                                        <a target="_blank" href="https://telegram.me/share/url?url=https%3A%2F%2Fwww.hrlabindia.com%2Fblog_details%2F94">
                                                            <i class="la la-telegram"></i>
                                                        </a> 
                                                        <a target="_blank" href="https://twitter.com/intent/tweet?text=https%3A%2F%2Fwww.hrlabindia.com%2Fblog_details%2F94">
                                                            <i class="la la-twitter"></i>
                                                        </a> 
                                                     </li>
													 
													 @else
													 <li>
													    <a href="{{route('login')}}">
													     <i class="la la-heart-o"></i> Like {{App\Models\Like::where('blog_type','requirement')->where('blog_id',$post->id)->where('status',1)->count()}}</a>
													 </li>
													 <li>
													    <a href="javascript:void(0)" class="comment p-0">
													     <i class="la la-comment"></i> Comment {{ count($comments) }}</a>
													 </li>
													 @endauth
												</ul>
												<a><i class="la la-eye"></i>Views</a>
											</div>
											<div class="bg-light p-2 comment-box" style="display:none;">
											    <form action="{{route('comment')}}" method="post">
											        @csrf
											        <input type="hidden" name="user_id" value="@auth {{Auth::user()->id}} @endif">
											        <input type="hidden" name="blog_type" value="requirement">
											        <input type="hidden" name="blog_id" value="{{$post->id}}">
                                                    <div class="">
                                                        <textarea class="form-control ml-1 shadow-none textarea" placeholder="write a comment..." name="comment"></textarea>
                                                    </div>
                                                    <div class="mt-2 text-right">
                                                        <button class="btn btn-sm shadow-none" type="submit" style="background:#008069;color:#fff">
                                                            Post comment
                                                        </button>
                                                    </div>
                                                </form>
                                                 
                                                @foreach($comments as $cm)
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
									  
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 pd-left-none no-pd">
							
							</div>
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>

@endsection
@push('js')

    
    

    <script>
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
            
            
             /*----open comment box-------*/
            
            $('.comment').click(function(){
                $('.comment-box').slideToggle();
            })
            
            
            
             /*----show socialite on share click-------*/
            
            $(".share").on('click',function(){
                $(".social-media-icons").fadeToggle();
            });
        
        
        
            
        });
    </script>
@endpush
