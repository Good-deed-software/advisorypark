@extends('layout.app')
@section('content')
		<div class="search-sec">
			<div class="container">
				<div class="search-box">
					<form>
					   
						 <input class="typeahead form-control" placeholder="Search keywords" id="search" type="text" name="search">
			        
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
										<a href="#" title="">Clear all filters</a>
									</div><!--filter-heading end-->
									<div class="paddy">
										<div class="filter-dd">
										    <form>
    											<div class="filter-ttl">
    												<button type="submit" class="btn btn-sm float-right" style="background:#008069;" title="">Apply</button>
    											</div>
										
    												<h6>Provide In</h6>
											       <input type="checkbox"  name="mode" value="Voice call"  {{ (request()->get('mode') == 'Voice call') ? 'checked' : '' }}>
												   <label class="p-1">Voice call</label> 
												   <input type="checkbox"  name="mode" value="Video call" {{ (request()->get('mode') == 'Video call') ? 'checked' : ''}}>
												   <label class="p-1">Video call</label> 
												   <input type="checkbox"  name="mode" value="Any Desk" {{ (request()->get('mode') == 'Any Desk') ? 'checked' : ''}}>
												   <label class="p-1">Any Desk</label> 
												   <input type="checkbox"  name="mode" value="Team Viewer" {{ (request()->get('mode') == 'Team Viewer') ? 'checked' : ''}}>
												   <label class="p-1">Team Viewer</label> 
												   
												   	<h6>Fees</h6>
													<p class="range-value">
														<input type="text" id="amount" value="" readonly>
													</p>
													<div id="slider-range" class="range-bar"></div>
											</form>
										</div>
									{{--<div class="filter-dd">
											<div class="filter-ttl">
												<h3>Categories</h3>
												<!--<a href="#" title="">Clear</a>-->
											</div>
											<form>
												@foreach($categories as $c)
												<input type="checkbox" name="search-categories[]" multiple placeholder="Search categories" value="{{$c->name}}">
            								    <label class="p-1">{{$c->name}}</label> 
            									@endforeach
												
											</form>
										</div>
										<div class="filter-dd">
											<div class="filter-ttl">
												<h3>Tags</h3>
												<!--<a href="#" title="">Clear</a>-->
											</div>
											<form>
												@foreach($tags as $t)
												<input type="checkbox" name="search-tags[]" multiple placeholder="Search tags" value="{{$t->name}}">
            									  <label class="p-1">{{$t->name}}</label> 
            									@endforeach
												
											</form>
										</div> --}}
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
														<span><img src="{{asset('front/images/clock.png')}}" alt="">{{$data->created_at->diffForHumans()}}</span>
													</div>
												</div>
										
											</div>
											<div class="epi-sec">
												<ul class="descp">
													<li><img src="{{asset('front/images/icon8.png')}}" alt=""><span>{{$data->users->designation}}</span></li>
													<li><img src="{{asset('front/images/icon9.png')}}" alt=""><span>India</span></li>
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
											            <img src='{{asset("front/images/advisory_listing/$data->image")}}' alt="" width="120" height="120">
											        </div>
											        <div class="col-md-10">
											            <!--<span class="badge badge-info float-right">{{$data->category}}</span>-->
        												<h3><strong>{{$data->listing_name}}</strong></h3>
        											    <!--	<ul class="job-dt">
        													<li><span>$300 - $350</span></li>
        												</ul>-->
        												<h6><strong>Description :</strong></h6>
        												<p>
        												    {{$data->about_listing}}    
        												</p>
        												
        												<h6><strong>Proficiency :</strong></h6>
        												<p>
        												    {{$data->experience}}    
        												</p>
        												<ul class="skills">
        												   
        													<li><strong>Fees : </strong><a href="#" title="">{{$data->fees}}</a></li>
        												
        												</ul>
        												<ul class="skills">
        												   
        													<li><strong>Task Completion Time : </strong><a href="#" title="">{{$data->duration_in_hours}} Hours,{{$data->duration_in_minutes}} Minutes</a></li>
        												
        												</ul>
        												<ul class="skills">
        												   
        													<li><strong>Experience : </strong><a href="#" title="">{{$data->exp_in_years}} Years,{{$data->exp_in_months}} Months</a></li>
        												
        												</ul>
        											
        												<ul class="skill-tags">
        												  
        													<li><strong>Available On : </strong><br>
        													 @php    $mode = json_decode($data->mode) @endphp
        													  @foreach($mode as $m)
        													    <a href="#" title="">{{$m}}</a>
        													  @endforeach
        													</li>
        												
        												</ul>
        											 </div>
        										</div>
												
											</div>
											<div class="job-status-bar">
											    <ul class="like-com">
												@auth
											        <li>
												    <a class="active" href="javascript:void(0);" onclick="talkToAdvisor({{$data->fees}},{{Auth::user()->id}},{{$data->added_by}},'{{$data->listing_name}}','{{$data->type}}','{{$data->category}}');" data-toggle="modal" data-target="#talkToadvisorModal">
												     <i class="las la-phone"></i> Talk to advisor</a>
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
							<!--<div class="col-lg-3">
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
													<span>$25/hr</span>
												</div>
											</div>
											<div class="job-info">
												<div class="job-details">
													<h3>Senior UI / UX Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div>
											<div class="job-info">
												<div class="job-details">
													<h3>Junior Seo Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>-->
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>
		
		<!--Talk to advisor modal-->
		<div class="modal fade" id="talkToadvisorModal" tabindex="-1" role="dialog" aria-labelledby="talkToAdvisorModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="talkToAdvisorModalLabel">Talk to Advisor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="request-form" >
                    @csrf
                    <input type="hidden" value="" id="user_id" name="user_id">
                    <input type="hidden" value="" id="listing_user_id" name="listing_user_id">
                    <input type="hidden" value="" id="listing_name" name="listing_name">
                    <input type="hidden" value="" id="type" name="type">
                    <input type="hidden" value="" id="category" name="category">
                    
                  <div class="form-group">
                    <label for="total-fees" class="col-form-label">Total fees:</label>
                    <input type="text"  value="0" readonly class="form-control" id="total_fees" name="fees">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Write about your requirement</label>
                    <textarea class="form-control" id="message-text" name="title" placeholder="Write about your requirement" required></textarea>
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
		<!--Talk to advisor modal-->

@endsection
@push('js')

<script>

    $(function(){
       
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
            
            
            
        
    });
</script>
@endpush