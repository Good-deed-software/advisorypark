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
														<h3>{{$requirement->users->name}}</h3>
														<span><img src="{{asset('front/images/clock.png')}}" alt="">{{$requirement->created_at->diffForHumans()}}</span>
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
													<li><img src="{{asset('front/images/icon8.png')}}" alt=""><span>{{$requirement->users->designation}}</span></li>
													<li><img src="{{asset('front/images/icon9.png')}}" alt=""><span>{{$requirement->users->address}}</span></li>
												</ul>
												<ul class="bk-links">
												
													<li>
													    @auth
													    <a href="{{route('save')}}?user_id={{Auth::user()->id}}&blog_type=requirement&blog_id={{$requirement->id}}" >
													     <i class="la la-bookmark"  {!! App\Models\Save::where('user_id',Auth::user()->id)->where('blog_type','requirement')->where('blog_id',$requirement->id)->where('status',1)->exists() == true ? 'style="background:#53d690;color:#fff"' : 'style="background:#fff;color:#000"' !!}></i> 
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
												@if($interest)
													@if($interest->status == 1)
													<button class="btn btn-success btn-sm" >Interested</button>
													@elseif($interest->status == 2)
													<button class="btn btn-danger btn-sm" >Not Interested</button>
													@else
													<button class="btn btn-success btn-sm" onclick="seen_notification({{$requirement->id}},'{{route('requirements_details',$requirement->slug)}}','{{App\Models\Notification::activity_requirement}}',1)">Interested ?</button>
													<button class="btn btn-danger btn-sm" onclick="seen_notification({{$requirement->id}},'{{route('requirements_details',$requirement->slug)}}','{{App\Models\Notification::activity_requirement}}',2)">Not Interested ?</button>
													@endif
												@else
												<button class="btn btn-success btn-sm" onclick="seen_notification({{$requirement->id}},'{{route('requirements_details',$requirement->slug)}}','{{App\Models\Notification::activity_requirement}}',1)">Interested ?</button>
												<button class="btn btn-danger btn-sm" onclick="seen_notification({{$requirement->id}},'{{route('requirements_details',$requirement->slug)}}','{{App\Models\Notification::activity_requirement}}',2)">Not Interested ?</button>
												@endif
												@php
													$cats = getPostCategories($requirement->category);
													$skills = getPostSkills($requirement->skill);
													$tags = getPostTags($requirement->tag);
												@endphp

												@foreach($cats as $id => $name)
											    	<span class="badge badge-info float-right mr-1">{{$name}}</span>
												@endforeach
												<br><br>
												<h3>{{$requirement->title}}</h3>
												<!--<ul class="job-dt">
													<li><a href="#" title="">Full Time</a></li>
													<li><span>$30 / hr</span></li>
												</ul>-->
												<p class="more">{{$requirement->description}}</p> 
												<!--<p>{{Str::limit($requirement->description,200)}} <a href="#" title="">view more</a></p>-->
												
												<ul class="skills">
												    @foreach($skills as $id => $name)
													<li><a href="javascript:void(0);" title="">{{$name}}</a></li>
													@endforeach
												</ul>
												
												<ul class="skill-tags">
												    @foreach($tags as $id => $name)
													<li><a href="javascript:void(0);" title="">{{$name}}</a></li>
													@endforeach
												</ul>
											</div>
											<div class="job-status-bar">
												<div class="row">
													<div class="col-md-9">
														<ul class="like-com">
															@auth
															<li>
																<a href="{{route('like')}}?user_id={{Auth::user()->id}}&blog_type=requirement&blog_id={{$requirement->id}}" {!! App\Models\Like::where('user_id',Auth::user()->id)->where('blog_type','requirement')->where('blog_id',$requirement->id)->where('status',1)->exists() == true ? 'style="color:#008069"' : '' !!}>
																<i class="la la-heart" ></i> Like {{App\Models\Like::where('blog_type','requirement')->where('blog_id',$requirement->id)->where('status',1)->count()}} 
																</a>
															</li>
															<li>
																<a href="javascript:void(0)" class="comment p-0">
																<i class="la la-comment"></i> Comment {{ count($requirement->comments) }}</a>
															</li>
															<li>
																<a href="javascript:void(0)" class="share">
																<i class="la la-share"></i> Share {{ count($requirement->comments) }}</a>
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
																<i class="la la-heart-o"></i> Like {{App\Models\Like::where('blog_type','requirement')->where('blog_id',$requirement->id)->where('status',1)->count()}}</a>
															</li>
															<li>
																<a href="javascript:void(0)" class="comment p-0">
																<i class="la la-comment"></i> Comment {{ count($requirement->comments) }}</a>
															</li>
															@endauth
														</ul>
													</div>

													<div class="col-md-3 float-right">
														</div>
												</div>
												
												<!-- <a><i class="la la-eye"></i>Views</a> -->
													
											</div>
											<div class="bg-light p-2 comment-box" style="display:none;">
											    <form action="{{route('comment')}}" method="post">
											        @csrf
											        <input type="hidden" name="user_id" value="@auth {{Auth::user()->id}} @endif">
											        <input type="hidden" name="blog_type" value="requirement">
											        <input type="hidden" name="blog_id" value="{{$requirement->id}}">
                                                    <div class="">
                                                        <textarea class="form-control ml-1 shadow-none textarea" placeholder="write a comment..." name="comment"></textarea>
                                                    </div>
                                                    <div class="mt-2 text-right">
                                                        <button class="btn btn-sm shadow-none" type="submit" style="background:#008069;color:#fff">
                                                            Post comment
                                                        </button>
                                                    </div>
                                                </form>
                                                 
                                                @foreach($requirement->comments as $cm)
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
