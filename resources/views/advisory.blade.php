@extends('layout.app')
@push('css')
	<style>
		
		#time-range {
			margin: 0 auto;
			color: #000;
			font-weight: 300;
		}

		.slider-time,

		.slider-time2 {
			font-weight: 400;
		}

		.flat-slider.ui-corner-all,
		.flat-slider .ui-corner-all {
			border-radius: 0;
		}

		.flat-slider.ui-slider {
			border: 0;
			background: #ebebeb;
			border-radius: 6px;
		}

		.flat-slider.ui-slider-horizontal {
			height: 6px;
		}

		.flat-slider.ui-slider-vertical {
			height: 15em;
			width: 6px;
		}

		.flat-slider .ui-slider-handle {
			width: 22px;
			height: 22px;
			background: #008069;
			border-radius: 50%;
			border: none;
			cursor: pointer;
			box-shadow: 0 0 8px rgba(0, 0, 0, 0.15);
		}

		.flat-slider.ui-slider-horizontal .ui-slider-handle {
			top: 50%;
			margin-top: -11px;
		}

		.flat-slider.ui-slider-vertical .ui-slider-handle {
			left: 50%;
			margin-left: -11px;
		}

		.flat-slider .ui-slider-handle:hover {
			box-shadow: 0 0 8px rgba(0, 0, 0, 0.35);
		}

		.flat-slider .ui-slider-range {
			border: 0;
			border-radius: 6;
			background: #ebebeb;
		}

		.flat-slider.ui-slider-horizontal .ui-slider-range {
			top: 0;
			height: 6px;
		}

		.flat-slider.ui-slider-vertical .ui-slider-range {
			left: 0;
			width: 6px;
		}

	</style>
@endpush
@section('content')
		<div class="search-sec">
			<div class="container">
				<div class="search-box">
					<form>
					   
						 <input class="typeahead form-control" placeholder="Search Advisory Listings..." id="search" type="text" name="search">
			        
						 <!--<a href="{{route('login')}}" title="">Signup / Login</a>-->
					
						<!--<button type="submit">Search</button>-->
					</form>
				</div><!--search-box end-->
			</div>
		</div><!--search-sec end-->


		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3">
								<div class="filter-secs">
									<div class="filter-heading">
										<h3 style="color:#008069;">Filters</h3>
										<a href="{{route('advisory')}}" title="">Clear all filters</a>
									</div><!--filter-heading end-->
									<div class="paddy">
										<div class="filter-dd">
										    <form>
    											
    												<h6>Provide In</h6>
											       <input type="checkbox"  name="mode" value="Voice call"  {{ (request()->get('mode') == 'Voice call') ? 'checked' : '' }}>
												   <label class="p-1">Voice call</label> <br>
												   <input type="checkbox"  name="mode" value="Video call" {{ (request()->get('mode') == 'Video call') ? 'checked' : ''}}>
												   <label class="p-1">Video call</label> <br>
												   <input type="checkbox"  name="mode" value="Any Desk" {{ (request()->get('mode') == 'Any Desk') ? 'checked' : ''}}>
												   <label class="p-1">Any Desk</label> <br>
												   <input type="checkbox"  name="mode" value="Team Viewer" {{ (request()->get('mode') == 'Team Viewer') ? 'checked' : ''}}>
												   <label class="p-1">Team Viewer</label> <br>
												   
												   	<h6>Fees</h6>
													<div id="time-range">
														<p><span class="slider-time text-dark">₹1</span> to <span class="slider-time2">₹10000</span>
														</p>
														<div class="sliders_step1">
															<div class="flat-slider" id="slider-range">
																<input type="hidden" name="from" id="sliderfrom" value="@if(request()->get('from')){{ request()->get('from') }}@endif">
																<input type="hidden" name="to" id="sliderto" value="@if(request()->get('to')){{ request()->get('to') }}@endif">
															</div>
														</div>
													</div>
													<br>
													<div class="filter-ttl">
														<button type="submit" class="btn btn-sm float-right" style="background:#008069;color:#fff" title="">Apply</button>
													</div>
											</form>
										</div>
									
									<!--	<div class="filter-dd">
											<div class="filter-ttl">
												<h3>Availabilty</h3>
												<a href="#" title="">Clear</a>
											</div>
											<ul class="avail-checks">
												<li>
													<input type="radio" name="cc" id="c1">
													<label for="c1">
														<span></span>
													</label>
													<small>Hourly</small>
												</li>
												<li>
													<input type="radio" name="cc" id="c2">
													<label for="c2">
														<span></span>
													</label>
													<small>Part Time</small>
												</li>
												<li>
													<input type="radio" name="cc" id="c3">
													<label for="c3">
														<span></span>
													</label>
													<small>Full Time</small>
												</li>
											</ul>
										</div>
										<div class="filter-dd">
											<div class="filter-ttl">
												<h3>Job Type</h3>
												<a href="#" title="">Clear</a>
											</div>
											<form class="job-tp">
												<select>
													<option>Select a job type</option>
													<option>Select a job type</option>
													<option>Select a job type</option>
													<option>Select a job type</option>
												</select>
												<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
											</form>
										</div>
										<div class="filter-dd">
											<div class="filter-ttl">
												<h3>Pay Rate / Hr ($)</h3>
												<a href="#" title="">Clear</a>
											</div>
											<div class="rg-slider">
			                                    <input class="rn-slider slider-input" type="hidden" value="5,50" />
			                                </div>
			                                <div class="rg-limit">
			                                	<h4>1</h4>
			                                	<h4>100+</h4>
			                                </div>
										</div>
										<div class="filter-dd">
											<div class="filter-ttl">
												<h3>Experience Level</h3>
												<a href="#" title="">Clear</a>
											</div>
											<form class="job-tp">
												<select>
													<option>Select a experience level</option>
													<option>3 years</option>
													<option>4 years</option>
													<option>5 years</option>
												</select>
												<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
											</form>
										</div>
										<div class="filter-dd">
											<div class="filter-ttl">
												<h3>Countries</h3>
												<a href="#" title="">Clear</a>
											</div>
											<form class="job-tp">
												<select>
													<option>Select a country</option>
													<option>United Kingdom</option>
													<option>United States</option>
													<option>Russia</option>
												</select>
												<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
											</form>
										</div>-->
									</div>
								</div><!--filter-secs end-->
							</div>
							
						
							<div class="col-lg-9">
								<div class="main-ws-sec">
									<div class="posts-section">
									   @if(count($advisory_listings) > 0)
									   @foreach($advisory_listings as $data)
										<div class="post-bar">
											<div class="post_topbar">
												<div class="usy-dt">
													<img src="http://via.placeholder.com/50x50" alt="">
													<div class="usy-name">
														<h3>{{$data->users->name}}</h3>
														<span><i class="fa fa-clock-o theme-color"></i> {{$data->created_at->diffForHumans()}}</span>
													</div>
												</div>
										
											</div>
											<div class="epi-sec">
												<ul class="descp">
													<li><span> <i class="fa fa-globe theme-color"></i> {{$data->users->designation}}</span></li>
													<li> <span> <i class="fa fa-map-marker theme-color"></i> India</span></li>
												</ul>
												<ul class="bk-links">
													<li>
													    @auth
													    <a href="{{route('save')}}?user_id={{Auth::user()->id}}&blog_type=requirement&blog_id={{$data->id}}" >
													     <i class="la la-bookmark"  {!! App\Models\Save::where('user_id',Auth::user()->id)->where('blog_type','requirement')->where('blog_id',$data->id)->where('status',1)->exists() == true ? 'style="background:#53d690;color:#fff"' : 'style="background:#fff;color:#000"' !!}></i> 
													    </a>
													    @else
													    <a href="{{route('login')}}" title="">
													     <i class="la la-bookmark" ></i> 
													    </a>
													    @endauth
													</li>
													<!--<li><a href="#" title=""><i class="la la-envelope"></i></a></li>-->
													<!--<li><a href="#" title="" class="bid_now">Bid Now</a></li>-->
												</ul>
											</div>
											<div class="job_descp">
											    <div class="row">
											        <div class="col-md-2">
														@if($data->image)
											            <img src='{{asset("front/images/advisory_listing/$data->image")}}' alt="" width="120" height="120" style="border-radius: 3px;box-shadow: 0 0 8px rgb(0 0 0 / 63%);">
											        	@else
											            <img src='{{asset("front/images/empty.png")}}' alt="" width="120" height="120" style="border-radius: 3px;box-shadow: 0 0 8px rgb(0 0 0 / 63%);">
														@endif
													</div>
											        <div class="col-md-10">
											            <!--<span class="badge badge-info float-right">{{$data->category}}</span>-->
														<div class="row">
															<div class="col-md-7">
																<h3><strong>{{$data->listing_name}}</strong></h3>
															
																<h6><strong>Description :</strong></h6>
																<p>
																	{{$data->about_listing}}    
																</p>
																
																<h6><strong>Proficiency :</strong></h6>
																<p>
																	{{$data->experience}}    
																</p>
															</div>
															<div class="col-md-5">
																<ul class="skills">
																	
																	<li><strong>Fees : </strong><span class="theme-color"><strong>₹ {{$data->fees}}</strong></span></li>
																
																</ul>
																<ul class="skills">
																	
																	<li><strong>Task Completion Time : </strong><span >{{$data->duration_in_hours}} Hours {{$data->duration_in_minutes}} Minutes</span></li>
																
																</ul>
																<ul class="skills">
																	
																	<li><strong>Experience : </strong><span >{{$data->exp_in_years}} Years {{$data->exp_in_months}} Months</span></li>
																
																</ul>
															
																<ul class="skill-tags">
																	
																	<li>
																		<strong>Available On : </strong><br>
																		@php    $mode = json_decode($data->mode) @endphp
																		@foreach($mode as $m)
																			
																		<!-- <a href="#" title="">{{$m}}</a> -->
																		@if($m == "Voice call")<img data-toggle="tooltip" title="Voice call" src='{{asset("front/images/voice-call.png")}}'height="30px" style="margin-top: 2px;margin-right: 3px;" alt="" >  @endif
																		@if($m == "Video call")<img data-toggle="tooltip" title="Video call" src='{{asset("front/images/video-call.png")}}' height="35px" style="margin-right: 3px;" alt="">@endif
																		@if($m == "Any Desk")<img data-toggle="tooltip" title="Any Desk" src='{{asset("front/images/any-desk.png")}}' height="31px" style="margin-top: 1px;margin-right: 3px;" alt="">@endif
																		@if($m == "Team Viewer")<img data-toggle="tooltip" title="Team Viewer" src='{{asset("front/images/team-viewer.png")}}' height="32px" style="margin-top: 1px;" alt="">@endif
																		@endforeach
																	</li>
																
																</ul>
															</div>
														</div>
        												
        												
        											 </div>
        										</div>
												
											</div>
											<div class="job-status-bar">
											    <ul class="like-com">
												@auth
												<li>
														@if(\Session::get('type') == 'User')
														<a class="active" href="javascript:void(0);" onclick="talkToAdvisor({{$data->fees}},{{Auth::user()->id}},{{$data->added_by}},'{{$data->listing_name}}','{{$data->type}}','{{$data->category}}');" data-toggle="modal" data-target="#talkToadvisorModal">
														<i class="las la-phone"></i> Talk to advisor</a>
														@endif
													</li>
												 {{--<li>
												    <a href="{{route('like')}}?user_id={{Auth::user()->id}}&blog_type=requirement&blog_id={{$data->id}}" {!! App\Models\Like::where('user_id',Auth::user()->id)->where('blog_type','requirement')->where('blog_id',$data->id)->where('status',1)->exists() == true ? 'style="color:#008069"' : '' !!}>
													   <i class="la la-heart" ></i> Like {{App\Models\Like::where('blog_type','requirement')->where('blog_id',$data->id)->where('status',1)->count()}} 
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
                                                 </li> --}}
												 
												 @else
												 <li>
												    <a class="active" href="{{route('login')}}" >
												     <i class="las la-phone"></i> Talk to advisor</a>
												 </li>
												 {{--<li>
												    <a href="{{route('login')}}">
												     <i class="la la-heart-o"></i> Like {{App\Models\Like::where('blog_type','requirement')->where('blog_id',$data->id)->where('status',1)->count()}}</a>
												 </li>
												 <li>
												    <a href="javascript:void(0)" onclick="openComment({{$data->id}})" class="comment p-0">
												     <i class="la la-comment"></i> Comment {{ count($data->comments) }}</a>
												 </li>
												 <li>
												    <a href="{{route('login')}}" class="share">
												     <i class="la la-share"></i> Share</a>
												 </li>--}}
												 @endauth
											</ul>
											    <a><i class="la la-eye"></i>Views</a>
										    </div>
											{{-- <div class="bg-light p-2" id="comment-box-{{$data->id}}" style="display:none;">
											    <form action="{{route('comment')}}" method="post">
											        @csrf
											        <input type="hidden" name="user_id" value="@auth {{Auth::user()->id}} @endif">
											        <input type="hidden" name="blog_type" value="requirement">
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
                                            </div> --}}
										</div>
									   @endforeach
									   @else
									   <h5 class="text-center">No Listing Found.</h5>
									   @endif
									
									</div><!--posts-section end-->
								</div><!--main-ws-sec end-->
							</div>
							
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>
		
		

@endsection
@push('js')

<script>

    $(function(){


		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
       
      	$('#request-form').validate({ 
           rules: {
               title: {
                required: true,
               },
           },
           messages: {
              title: {
                required: "Enter about your requirement",
              }
          },
           submitHandler: function(form) 
          {
              $.ajax({
                  url: "{{route('send_advisory_request')}}", 
                  type: "POST",             
                  data: $(form).serialize(),
                  cache: false,             
                  processData: false, 
                  dataType: "json", 
                  success: function(data) 
                  {
                     if(data.status){
                         toastr.success("Success!", data.message);
                               
                        setTimeout(function(){ 
                           window.location.href = "{{route('profile')}}";
                         }, 1000);
                     }else{
                         toastr.error("Opps!", data.message);
                               
                     }
                  }
              });
              return false;
          },
       });
    })


    /*-----Autocomplete Search----*/
    $( "#search" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: "{{route('autocomplete')}}",
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#search').val(ui.item.label);
           console.log(ui.item); 
           return false;
        }
      });

    /*----open comment box-------*/
    
    function openComment(id){
        console.log(id);
       
        $('#comment-box-'+id).slideToggle();
    }
    
    /*--------------Talk to advisor----------------*/
    function talkToAdvisor(fees,user_id,listing_user_id,listing_name,type,category){
    
        $("#total_fees").val(fees);
        $("#user_id").val(user_id);
        $("#listing_user_id").val(listing_user_id);
        $("#listing_name").val(listing_name);
        $("#type").val(type);
        $("#category").val(category);
    }


    $(document).ready(function(){
        
        /*----select2-------*/
            
            $(".multiple").select2({
                placeholder: "Select Skill",
                allowClear: true,
                tags: true
            });
            
            $(".multiple1").select2({
                placeholder: "Select Category",
                allowClear: true,
                tags: true
            });
            
            $(".multiple2").select2({
                placeholder: "Select Tag",
                allowClear: true,
                tags: true
            });
            
            
            
             /*----show socialite on share click-------*/
            
            $(".share").on('click',function(){
                $(".social-media-icons").fadeToggle();
            });
            
			/*----filter price slider-------*/
			$("#slider-range").slider({
				range: true,
				min: 1,
				max: 10000,
				step: 1,
				values: [1, 10000],
				slide: function(e, ui) {
					console.log(ui.value); 
					// $( "#sliderVal" ).val( "₹" + ui.values[ 0 ] + " - ₹" + ui.values[ 1 ] );
					$( "#sliderfrom" ).val(ui.values[ 0 ]);
					$( "#sliderto" ).val(ui.values[ 1 ] );
					var min = Math.floor(ui.values[0]);
					$('.slider-time').html('₹'+ min);

					var max = Math.floor(ui.values[1]);
					
					$('.slider-time2').html('₹'+ max);

					

				}
			});
            
            
        
    });
</script>
@endpush