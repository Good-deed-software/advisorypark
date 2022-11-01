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
												@auth
												@if(!$interest)
													@if(\Session::get('type') == 'Advisor' && $requirement->created_by != Auth::user()->id)  
													<button class="btn btn-success btn-sm" onclick="interestedOrNot({{$requirement->id}},'{{route('requirements_details',$requirement->slug)}}','{{App\Models\Notification::activity_requirement}}',1)">Interested ?</button>
													<button class="btn btn-danger btn-sm" onclick="interestedOrNot({{$requirement->id}},'{{route('requirements_details',$requirement->slug)}}','{{App\Models\Notification::activity_requirement}}',2)">Not Interested ?</button>
													@endif
												@endif
												@endauth
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
													<div class="col-md-8">
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
																<i class="la la-share"></i> Share </a>
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

													<div class="col-md-4">
													@if($interest)
														<button class="btn btn-sm float-right btn-outline-<?=($interest->status == 1)?'success':'danger'?>">@if($interest->status == 1) Interested @else Not Interested @endif</button>
													@endif
													</div>
												</div>
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
							@auth
							<div class="col-lg-3 pd-right-none no-pd" style="display:<?=(Auth::check() && $requirement->created_by == Auth::user()->id)?'block':'none'?>">
								<div class="right-sidebar">
								<div class="widget widget-jobs">
										<div class="sd-title">
											<h3>Interested Advisors</h3>
											<i class="la la-ellipsis-v"></i>
										</div>
										<div class="jobs-list">
											@if($all_interested->isNotEmpty())
											
											@foreach($all_interested as $i)
											<div class="job-info">
												<div class="job-details">
													<h3>{{$i->users->name}}</h3>
													<p>{{$i->users->designation}}</p>
												</div>
												<div class="">
													@if(App\Models\AdvisoryRequest::where('user_id',$i->users->id)->where('advisor_id',Auth::user()->id)->where('listing_id',$i->requirement_id)->where('status',4)->first())
													<a href="tel:{{$i->users->contact}}"type="button" class="btn btn-sm theme-color"><i class="las la-phone"></i> {{$i->users->contact}}</a>
													@else
													<button type="button" class="btn btn-sm theme-bg text-light" onclick="talkToAdvisorWR({{$i->users->id}},{{Auth::user()->id}},'{{$requirement->id}}','{{$requirement->title}}');" data-toggle="modal" data-target="#talkToadvisorWRModal"><i class="las la-user"></i> Talk To Advisor</button>
													@endif
												</div>
											</div>
											@endforeach
											@else
												No Advisor Interested.
											@endif
										</div>
									</div>
									
								</div>
							</div>
							@endauth
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>

		<!--Talk to advisor without requirement modal-->
		<div class="modal fade" id="talkToadvisorWRModal" tabindex="-1" role="dialog" aria-labelledby="talkToAdvisorModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="talkToAdvisorModalLabel">Talk to Advisor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="request-form" method="post" action="{{route('send_advisory_request')}}">
                    @csrf
                    <input type="hidden" value="" id="user_id" name="user_id">
                    <input type="hidden" value="" id="advisor_id" name="advisor_id">
                    <input type="hidden" value="" id="listing_id" name="listing_id">
                    <input type="hidden" value="" id="listing_name" name="listing_name">

                  <div class="form-group">
                    <label for="total-fees" class="col-form-label">Total fees:</label>
                    <input type="text"  value="0" class="form-control" id="total_fees" name="fees">
                  </div>
                
              </div>
              <div class="modal-footer">
                <!--<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>-->
                <button type="submit" class="btn btn-sm" style="background-color:#008069;color:#fff;">Send request</button>
              </div>
              </form>
            </div>
          </div>
        </div>
		<!--Talk to advisor without requirement modal-->

@endsection
@push('js')

    
    

    <script>

		/*--------------Talk to advisor Without Requirement----------------*/
		function talkToAdvisorWR(user_id,advisor_id,listing_id,listing_name){
			$("#user_id").val(user_id);
			$("#advisor_id").val(advisor_id);
			$("#listing_id").val(listing_id);
			$("#listing_name").val(listing_name);
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
