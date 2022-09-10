@extends('layout.app')

@section('content')
		<section class="cover-sec">
		    @php $cover_image = Auth::user()->cover_image; @endphp
		     @if(Auth::user()->cover_image !== null)
			<img src='{{asset("front/images/users/$cover_image")}}' alt="" height="375px">
			@else
			<img src="http://via.placeholder.com/1600x400" alt="" height="375px">
			@endif
			<a href="#" id="cover" title=""><i class="fa fa-camera"></i> Change Cover</a>
			<input type="file" id="my_cover" style="display: none;" data-id="{{Auth::user()->id}}" />
		</section>


		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3">
								<div class="main-left-sidebar">
									<div class="user_profile">
									    
										<div class="user-pro-img">
										    @php $image = Auth::user()->image; @endphp
										    @if(Auth::user()->image !== null)
											<img src='{{asset("front/images/users/$image")}}' alt="" height="210px">
											@else
											<img src='{{asset("front/images/users/image.jpg")}}' alt="" height="210px">
											@endif
										
											    <a href="#" id="image" title=""><i class="fa fa-camera"></i></a>
											    <input type="file" id="my_file" style="display: none;" data-id="{{Auth::user()->id}}" />
										    </form>
										</div><!--user-pro-img end-->
										<div class="user_pro_status">
											
											<ul class="flw-status">
												<li>
													<span>Following</span>
													<b>{{$following}}</b>
												</li>
												<li>
													<span>Followers</span>
													<b>{{$follower}}</b>
												</li>
											</ul>
										</div><!--user_pro_status end-->
										<div class=" tab-feed st2">
										    <ul class="social_links" >
										   
										  @if(\Session::get('type') == 'User')  
										  
											<li data-tab="info-dd" ><a href="#" title="">My Profile</a></li>
											<li ><a href="{{route('logout')}}" title="">Logout</a></li>
											
										  @elseif(\Session::get('type') == 'Advisor')
										  
										    <li data-tab="info-dd" ><a href="#" title="">My Profile</a></li>
											<li data-tab="business-dd" ><a href="#" title="">My Business Profile</a></li>
											<li data-tab="advisory-listing-dd"><a href="#" title="">My Advisory Listing</a></li>
											<li data-tab="myleads-dd"><a href="#" title="">My Leads</a></li>
											<li data-tab="letsconnect-dd"><a href="#" title="">Let's Connect</a></li>
											<!--<li data-tab="outbox-dd"><a href="#" title="">Outbox</a></li>-->
											<li data-tab="myposts-dd"><a href="#" title="">My Posts</a></li>
											<li data-tab="myscorecard-dd"><a href="#" title="">My Score card</a></li>
											<li ><a href="{{route('logout')}}" title="">Logout</a></li>
											
										  @endif
										</ul>
										</div>
										
									</div><!--user_profile end-->
							
								</div>
							</div>
							<div class="col-lg-9">
								<div class="main-ws-sec">
									<div class="user-tab-sec">
										<h3>{{Auth::user()->name}}</h3>
										<div class="star-descp">
											<span>{{Auth::user()->designation}} at Self Employed</span>
											<ul class="mr-3">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
											</ul>
											<!--<a href="#" title="">Status</a>-->
										    <ul>
												<li><a href="#" title=""><i class="la la-globe"></i></a></li>
    											<li><a href="#" title=""><i class="fa fa-facebook-square"></i></a></li>
    											<li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
    											<li><a href="#" title=""><i class="fa fa-pinterest"></i></a></li>
    											<li><a href="#" title=""><i class="fa fa-instagram"></i></a></li>
    											<li><a href="#" title=""><i class="fa fa-youtube-play text-danger"></i></a></li>
    										</ul>   
										</div><!--star-descp end-->
										 
										<div class="tab-feed st2">
											<ul>
												
												<li data-tab="info-dd" class="animated fadeIn active">
													<a href="#" title="" class="true">
														<img src="{{asset('front/images/ic2.png')}}" alt="">
														<span>Info</span>
													</a>
												</li>
												<li data-tab="feed-dd">
													<a href="#" title="">
														<img src="{{asset('front/images/ic1.png')}}" alt="">
														<span>Feed</span>
													</a>
												</li>
												<li data-tab="saved-jobs">
													<a href="#" title="">
														<img src="{{asset('front/images/ic4.png')}}" alt="">
														<span>Saved Post</span>
													</a>
												</li>
												<li data-tab="my-bids">
													<a href="#" title="">
														<img src="{{asset('front/images/ic5.png')}}" alt="">
														<span>My Bids</span>
													</a>
												</li>
												<!--<li data-tab="portfolio-dd">
													<a href="#" title="">
														<img src="{{asset('front/images/ic3.png')}}" alt="">
														<span>Portfolio</span>
													</a>
												</li>-->
												<li data-tab="payment-dd">
													<a href="#" title="">
														<img src="{{asset('front/images/ic6.png')}}" alt="">
														<span>Payment</span>
													</a>
												</li>
											</ul>
										</div><!-- tab-feed end-->
									</div>
									<div class="product-feed-tab current" id="info-dd">
									  <form id="profile-form" onsubmit="return false;">
										<div class="user-profile-ov">
											<h3><a href="#" title="" class="overview-open">My Profile</a> <a href="#" title="" class="overview-open"></a></h3>
										    <div class="row mb-2">
										        
										            <input type="hidden" class="form-control" name="id" value="{{Auth::user()->id}}">
										        <div class="col-md-6">
										            <label>Name<span class="text-danger">*</span></label>
										            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Name" disabled>
										        </div>
										        <div class="col-md-6">
										             <label>Your Advisory Park Id<span class="text-danger">*</span></label>
										            <input type="text" class="form-control" name="advisory_park_id" value="{{Auth::user()->advisory_park_id}}" placeholder="Your Advisory Park Id" disabled>
										        </div>
										    </div>
										    <div class="row mb-2">
										        <div class="col-md-6">
										            <label>Gender<span class="text-danger">*</span></label><br>
										            <label class="p-1">Male</label> <input type="radio" class="" name="gender" {{Auth::user()->gender == 'male' ? 'checked' :''}} value="male">
										            <label class="p-1">Female</label> <input type="radio" class="" name="gender" {{Auth::user()->gender == 'female' ? 'checked' :''}} value="female">
										        </div>
										        <div class="col-md-6">
										             <label>Address</label>
										            <textarea class="form-control" name="address" placeholder="Address">{{Auth()->user()->address}}</textarea>
										        </div>
										    </div>
										    <div class="row mb-2">
										        <div class="col-md-4">
										            <label>Country<span class="text-danger">*</span></label>
										            <select class="form-control" name="country">
										                <option selected>India</option>
										            </select>
										        </div>
										        <div class="col-md-4">
										            <label>State<span class="text-danger">*</span></label>
										            <select class="form-control" name="state">
										                <option selected>Select</option>
										                <option value="Andhra Pradesh" {{Auth()->user()->state == 'Andhra Pradesh' ? 'selected' : ''}}>Andhra Pradesh</option>
										                <option value="Andaman and Nicobar Islands" {{Auth()->user()->state == 'Andaman and Nicobar Islands' ? 'selected' : ''}}>Andaman and Nicobar Islands</option>
										                <option value="Arunachal Pradesh" {{Auth()->user()->state == 'Arunachal Pradesh' ? 'selected' : ''}}>Arunachal Pradesh</option>
										                <option value="Assam" {{Auth()->user()->state == 'Assam' ? 'selected' : ''}}>Assam</option>
										                <option value="Bihar" {{Auth()->user()->state == 'Bihar' ? 'selected' : ''}}>Bihar</option>
										                <option value="Chattisgarh" {{Auth()->user()->state == 'Chattisgarh' ? 'selected' : ''}}>Chattisgarh</option>
										                <option value="Chandigarh" {{Auth()->user()->state == 'Chandigarh' ? 'selected' : ''}}>Chandigarh</option>
										                <option value="Dadra and Nagar Haveli and Daman & Diu" {{Auth()->user()->state == 'Dadra and Nagar Haveli and Daman & Diu' ? 'selected' : ''}}>Dadra and Nagar Haveli and Daman & Diu</option>
										                <option value="Delhi" {{Auth()->user()->state == 'Delhi' ? 'selected' : ''}}>Delhi</option>
										                <option value="Goa" {{Auth()->user()->state == 'Goa' ? 'selected' : ''}}>Goa</option>
										                <option value="Gujarat" {{Auth()->user()->state == 'Gujarat' ? 'selected' : ''}}>Gujarat</option>
										                <option value="Haryana" {{Auth()->user()->state == 'Haryana' ? 'selected' : ''}}>Haryana</option>
										                <option value="Himachal Pradesh" {{Auth()->user()->state == 'Himachal Pradesh' ? 'selected' : ''}}>Himachal Pradesh</option>
										                <option value="Jammu & Kashmir" {{Auth()->user()->state == 'Jammu & Kashmir' ? 'selected' : ''}}>Jammu & Kashmir</option>
										                <option value="Jharkhand" {{Auth()->user()->state == 'Jharkhand' ? 'selected' : ''}}>Jharkhand</option>
										                <option value="Karnataka" {{Auth()->user()->state == 'Karnataka' ? 'selected' : ''}}>Karnataka</option>
										                <option value="Kerala" {{Auth()->user()->state == 'Kerala' ? 'selected' : ''}}>Kerala</option>
										                <option value="Ladakh" {{Auth()->user()->state == 'Ladakh' ? 'selected' : ''}}>Ladakh</option>
										                <option value="Lakshadweep" {{Auth()->user()->state == 'Lakshadweep' ? 'selected' : ''}}>Lakshadweep</option>
										                <option value="Madhya Pradesh" {{Auth()->user()->state == 'Madhya Pradesh' ? 'selected' : ''}}>Madhya Pradesh</option>
										                <option value="Maharashtra" {{Auth()->user()->state == 'Maharashtra' ? 'selected' : ''}}>Maharashtra</option>
										                <option value="Manipur" {{Auth()->user()->state == 'Manipur' ? 'selected' : ''}}>Manipur</option>
										                <option value="Meghalaya" {{Auth()->user()->state == 'Meghalaya' ? 'selected' : ''}}>Meghalaya</option>
										                <option value="Mizoram" {{Auth()->user()->state == 'Mizoram' ? 'selected' : ''}}>Mizoram</option>
										                <option value="Nagaland" {{Auth()->user()->state == 'Nagaland' ? 'selected' : ''}}>Nagaland</option>
										                <option value="Odisha" {{Auth()->user()->state == 'Odisha' ? 'selected' : ''}}>Odisha</option>
										                <option value="Puducherry" {{Auth()->user()->state == 'Puducherry' ? 'selected' : ''}}>Puducherry</option>
										                <option value="Punjab" {{Auth()->user()->state == 'Punjab' ? 'selected' : ''}}>Punjab</option>
										                <option value="Rajasthan" {{Auth()->user()->state == 'Rajasthan' ? 'selected' : ''}}>Rajasthan</option>
										                <option value="Sikkim" {{Auth()->user()->state == 'Sikkim' ? 'selected' : ''}}>Sikkim</option>
										                <option value="Tamil Nadu" {{Auth()->user()->state == 'Tamil Nadu' ? 'selected' : ''}}>Tamil Nadu</option>
										                <option value="Telangana" {{Auth()->user()->state == 'Telangana' ? 'selected' : ''}}>Telangana</option>
										                <option value="Tripura" {{Auth()->user()->state == 'Tripura' ? 'selected' : ''}}>Tripura</option>
										                <option value="Uttarakhand" {{Auth()->user()->state == 'Uttarakhand' ? 'selected' : ''}}>Uttarakhand</option>
										                <option value="Uttar Pradesh" {{Auth()->user()->state == 'Uttar Pradesh' ? 'selected' : ''}}>Uttar Pradesh</option>
										                <option value="West Bengal" {{Auth()->user()->state == 'West Bengal' ? 'selected' : ''}}>West Bengal</option>

										            </select>
										        </div>
										        <div class="col-md-4">
										            <label>City<span class="text-danger">*</span></label>
										            <input type="text" name="city" class="form-control" value="{{Auth::user()->city}}">
										        </div>
										    </div>
										    <div class="row mb-2">
										        <div class="col-md-4">
										            <label>Pincode</label>
										            <input type="number" class="form-control" name="pincode" value="{{Auth::user()->pincode}}" placeholder="Pincode" >
										        </div>
										        <div class="col-md-4">
										             <label>Contact<span class="text-danger">*</span></label>
										            <input type="number" class="form-control" name="contact" value="{{Auth::user()->contact}}" placeholder="Contact" >
										        </div>
										         <div class="col-md-4">
										             <label>Email<span class="text-danger">*</span></label>
										            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="E-mail" disabled>
										        </div>
										        
										    </div>
										    <div class="row mb-2">
										       <div class="col-md-6">
										            <label>Language Known</label>
										            <input type="text" class="form-control" name="language_known" value="{{Auth::user()->language_known}}" placeholder="Hindi/English/Tamil Etc..." >
										        </div>
										        <div class="col-md-6">
										            <label>Work Status<span class="text-danger">*</span></label>
										            <select class="form-control" name="work_status">
										                <option value="Job" {{Auth()->user()->state == 'Job' ? 'selected' : ''}}>Job</option>
										                <option value="Own Business" {{Auth()->user()->state == 'Own Business' ? 'selected' : ''}}>Own Business</option>
										            </select>
										        </div>
										   </div>
										    <div class="row mb-2">
										       <div class="col-md-12">
										            <label>Education</label>
										             <textarea class="form-control" name="education" rows="6" cols="50" placeholder="Education(Optional to show)">{{Auth::user()->education}}</textarea>
										            
										        </div>
										   </div>
										    <div class="row mb-2">
										       <div class="col-md-12">
										            <label>Qualification/ Achivments/ Certification/ Awards</label>
										             <textarea class="form-control" name="qualifications" rows="4" cols="50" placeholder="Write Complete Qualification/ Achivments/ Certification/ Awards">{{Auth::user()->qualifications}}</textarea>
										            
										        </div>
										   </div>
										    <div class="row mb-2">
										       <div class="col-md-12">
										            <label>Experience</label>
										             <textarea class="form-control" name="experience" rows="5" cols="50" placeholder="Experience(Optional to show)">{{Auth::user()->experience}}</textarea>
										            
										        </div>
										   </div>
										    <div class="row mb-2">
										       <div class="col-md-12">
										            <label>Write more about yourself</label>
										             <textarea class="form-control" name="about_us" rows="4" cols="50" placeholder="About Us(Optional to show)">{{Auth::user()->about_us}}</textarea>
										            
										        </div>
										   </div>
										   <div class="row mb-2">
										       <div class="col-md-12">
										            <button type="submit" class="btn float-right" style="background:#008069">Update</button>
										        </div>
										   </div>
										</div>	
									  </form>
										<!--<div class="user-profile-ov st2">
											<h3><a href="#" title="" class="exp-bx-open">Experience </a><a href="#" title="" class="exp-bx-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="exp-bx-open"><i class="fa fa-plus-square"></i></a></h3>
											<h4>Web designer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
											<h4>UI / UX Designer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id.</p>
											<h4>PHP developer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
											<p class="no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
										</div>
										<div class="user-profile-ov">
											<h3><a href="#" title="" class="ed-box-open">Education</a> <a href="#" title="" class="ed-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title=""><i class="fa fa-plus-square"></i></a></h3>
											<h4>Master of Computer Science</h4>
											<span>2015 - 2018</span>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
										</div>
									
										<div class="user-profile-ov">
											<h3><a href="#" title="" class="skills-open">Skills</a> <a href="#" title="" class="skills-open"><i class="fa fa-pencil"></i></a> <a href="#"><i class="fa fa-plus-square"></i></a></h3>
											<ul>
												<li><a href="#" title="">HTML</a></li>
												<li><a href="#" title="">PHP</a></li>
												<li><a href="#" title="">CSS</a></li>
												<li><a href="#" title="">Javascript</a></li>
												<li><a href="#" title="">Wordpress</a></li>
												<li><a href="#" title="">Photoshop</a></li>
												<li><a href="#" title="">Illustrator</a></li>
												<li><a href="#" title="">Corel Draw</a></li>
											</ul>
										</div>-->
									</div>
									<div class="product-feed-tab " id="feed-dd">
										<div class="posts-section">
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
												
											</div>
											<div class="epi-sec">
												<ul class="descp">
													<li><img src="{{asset('front/images/icon8.png')}}" alt=""><span>{{$data->users->designation}}</span></li>
													<li><img src="{{asset('front/images/icon9.png')}}" alt=""><span>{{$data->users->address}}</span></li>
												</ul>
												<ul class="bk-links">
													<!--<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>-->
													<!--<li><a href="#" title=""><i class="la la-envelope"></i></a></li>-->
												</ul>
											</div>
											<div class="job_descp">
												<h3>{{$data->title}}</h3>
												<!--<ul class="job-dt">
													<li><a href="#" title="">Full Time</a></li>
													<li><span>$30 / hr</span></li>
												</ul>-->
												<p class="more">{{$data->description}}</p>
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
											<div class="process-comm">
												<div class="spinner">
													<div class="bounce1"></div>
													<div class="bounce2"></div>
													<div class="bounce3"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="product-feed-tab" id="saved-jobs">
										<div class="posts-section">
										    @if(count($saved_post) > 0)
										    @foreach($saved_post as $data)
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="http://via.placeholder.com/50x50" alt="">
														<div class="usy-name">
															<h3>{{$data->users->name}}</h3>
															<span><img src="images/clock.png" alt="">{{$data->posts->created_at->diffForHumans()}}</span>
														</div>
													</div>
													
												</div>
												<div class="epi-sec">
													<ul class="descp">
														<li><img src="images/icon8.png" alt=""><span>{{$data->users->designation}}</span></li>
														<li><img src="images/icon9.png" alt=""><span>{{$data->users->address}}</span></li>
													</ul>
													<ul class="bk-links">
														<!--<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>-->
														<!--<li><a href="#" title=""><i class="la la-envelope"></i></a></li>-->
													</ul>
												</div>
												<div class="job_descp">
												  
												    @php 
													
												    $category = $data->posts->category;
												
												    $kk = \DB::select("select name from skills where id in ($category)");
												 
    												@endphp 
												    @foreach($kk as $v)
												    <span class="badge badge-info float-right">{{$v->name}}</span>
    												@endforeach
												   <h3>{{$data->posts->title}}</h3>
													<!--<ul class="job-dt">
														<li><a href="#" title="">Full Time</a></li>
														<li><span>$30 / hr</span></li>
													</ul>-->
													<p class="more">{{$data->posts->description}}</p>
													
													
													@php 
													
													    $skill = $data->posts->skill;
													
    												    $kk = \DB::select("select name from skills where id in ($skill)");
    												 
    												@endphp 
    												
    												<ul class="skills">
    												    @foreach($kk as $v)
    													<li><a href="#" title="">{{$v->name}}</a></li>
    													@endforeach
    												</ul>
													
													@php 
													    $tag = $data->posts->tag;
    												    $kk = \DB::select("select name from tags where id in ($tag)");
    												  
    												@endphp 
    												
    												<ul class="skill-tags">
    												    @foreach($kk as $v)
    													<li><a href="#" title="">{{$v->name}}</a></li>
    													@endforeach
    												</ul>
												</div>
												<!--<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a href="#"><i class="la la-heart"></i> Like</a>
															<img src="images/liked-img.png" alt="">
															<span>25</span>
														</li> 
														<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
													</ul>
													<a><i class="la la-eye"></i>Views 50</a>
												</div>-->
											</div>
											@endforeach
											@else
											 <h5 class="text-center">No Post Found.</h5>
											@endif
											<div class="process-comm">
												<a href="#" title=""><img src="images/process-icon.png" alt=""></a>
											</div>
										</div>
									</div>
									<div class="product-feed-tab" id="my-bids">
										<div class="posts-section">
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="http://via.placeholder.com/50x50" alt="">
														<div class="usy-name">
															<h3>John Doe</h3>
															<span><img src="images/clock.png" alt="">3 min ago</span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
													<ul class="descp">
														<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
														<li><img src="images/icon9.png" alt=""><span>India</span></li>
													</ul>
													<ul class="bk-links">
														<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
														<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
														<li><a href="#" title="" class="bid_now">Bid Now</a></li>
													</ul>
												</div>
												<div class="job_descp">
													<h3>Simple Classified Site</h3>
													<ul class="job-dt">
														<li><span>$300 - $350</span></li>
													</ul>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
													<ul class="skill-tags">
														<li><a href="#" title="">HTML</a></li>
														<li><a href="#" title="">PHP</a></li>
														<li><a href="#" title="">CSS</a></li>
														<li><a href="#" title="">Javascript</a></li>
														<li><a href="#" title="">Wordpress</a></li> 	
														<li><a href="#" title="">Photoshop</a></li> 	
														<li><a href="#" title="">Illustrator</a></li> 	
														<li><a href="#" title="">Corel Draw</a></li> 	
													</ul>
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a href="#"><i class="la la-heart"></i> Like</a>
															<img src="images/liked-img.png" alt="">
															<span>25</span>
														</li> 
														<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
													</ul>
													<a><i class="la la-eye"></i>Views 50</a>
												</div>
											</div><!--post-bar end-->
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="http://via.placeholder.com/50x50" alt="">
														<div class="usy-name">
															<h3>John Doe</h3>
															<span><img src="images/clock.png" alt="">3 min ago</span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
													<ul class="descp">
														<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
														<li><img src="images/icon9.png" alt=""><span>India</span></li>
													</ul>
													<ul class="bk-links">
														<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
														<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
														<li><a href="#" title="" class="bid_now">Bid Now</a></li>
													</ul>
												</div>
												<div class="job_descp">
													<h3>Ios Shopping mobile app</h3>
													<ul class="job-dt">
														<li><span>$300 - $350</span></li>
													</ul>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
													<ul class="skill-tags">
														<li><a href="#" title="">HTML</a></li>
														<li><a href="#" title="">PHP</a></li>
														<li><a href="#" title="">CSS</a></li>
														<li><a href="#" title="">Javascript</a></li>
														<li><a href="#" title="">Wordpress</a></li> 	
														<li><a href="#" title="">Photoshop</a></li> 	
														<li><a href="#" title="">Illustrator</a></li> 	
														<li><a href="#" title="">Corel Draw</a></li> 	
													</ul>
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a href="#"><i class="la la-heart"></i> Like</a>
															<img src="images/liked-img.png" alt="">
															<span>25</span>
														</li> 
														<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
													</ul>
													<a><i class="la la-eye"></i>Views 50</a>
												</div>
											</div><!--post-bar end-->
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="http://via.placeholder.com/50x50" alt="">
														<div class="usy-name">
															<h3>John Doe</h3>
															<span><img src="images/clock.png" alt="">3 min ago</span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
													<ul class="descp">
														<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
														<li><img src="images/icon9.png" alt=""><span>India</span></li>
													</ul>
													<ul class="bk-links">
														<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
														<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
														<li><a href="#" title="" class="bid_now">Bid Now</a></li>
													</ul>
												</div>
												<div class="job_descp">
													<h3>Simple Classified Site</h3>
													<ul class="job-dt">
														<li><span>$300 - $350</span></li>
													</ul>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
													<ul class="skill-tags">
														<li><a href="#" title="">HTML</a></li>
														<li><a href="#" title="">PHP</a></li>
														<li><a href="#" title="">CSS</a></li>
														<li><a href="#" title="">Javascript</a></li>
														<li><a href="#" title="">Wordpress</a></li> 	
														<li><a href="#" title="">Photoshop</a></li> 	
														<li><a href="#" title="">Illustrator</a></li> 	
														<li><a href="#" title="">Corel Draw</a></li> 	
													</ul>
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a href="#"><i class="la la-heart"></i> Like</a>
															<img src="images/liked-img.png" alt="">
															<span>25</span>
														</li> 
														<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
													</ul>
													<a><i class="la la-eye"></i>Views 50</a>
												</div>
											</div><!--post-bar end-->
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="http://via.placeholder.com/50x50" alt="">
														<div class="usy-name">
															<h3>John Doe</h3>
															<span><img src="images/clock.png" alt="">3 min ago</span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
													<ul class="descp">
														<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
														<li><img src="images/icon9.png" alt=""><span>India</span></li>
													</ul>
													<ul class="bk-links">
														<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
														<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
														<li><a href="#" title="" class="bid_now">Bid Now</a></li>
													</ul>
												</div>
												<div class="job_descp">
													<h3>Ios Shopping mobile app</h3>
													<ul class="job-dt">
														<li><span>$300 - $350</span></li>
													</ul>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
													<ul class="skill-tags">
														<li><a href="#" title="">HTML</a></li>
														<li><a href="#" title="">PHP</a></li>
														<li><a href="#" title="">CSS</a></li>
														<li><a href="#" title="">Javascript</a></li>
														<li><a href="#" title="">Wordpress</a></li> 	
														<li><a href="#" title="">Photoshop</a></li> 	
														<li><a href="#" title="">Illustrator</a></li> 	
														<li><a href="#" title="">Corel Draw</a></li> 	
													</ul>
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a href="#"><i class="la la-heart"></i> Like</a>
															<img src="images/liked-img.png" alt="">
															<span>25</span>
														</li> 
														<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
													</ul>
													<a><i class="la la-eye"></i>Views 50</a>
												</div>
											</div><!--post-bar end-->
											<div class="process-comm">
												<a href="#" title=""><img src="images/process-icon.png" alt=""></a>
											</div><!--process-comm end-->
										</div><!--posts-section end-->
									</div>
									<div class="product-feed-tab" id="payment-dd">
										<div class="billing-method">
											<ul>
												<li>
													<h3>Add Billing Method</h3>
													<a href="#" title=""><i class="fa fa-plus-circle"></i></a>
												</li>
												<li>
													<h3>See Activity</h3>
													<a href="#" title="">View All</a>
												</li>
												<li>
													<h3>Total Money</h3>
													<span>$0.00</span>
												</li>
											</ul>
											<div class="lt-sec">
												<img src="images/lt-icon.png" alt="">
												<h4>All your transactions are saved here</h4>
												<a href="#" title="">Click Here</a>
											</div>
										</div><!--billing-method end-->
										<div class="add-billing-method">
											<h3>Add Billing Method</h3>
											<h4><img src="images/dlr-icon.png" alt=""><span>With workwise payment protection , only pay for work delivered.</span></h4>
											<div class="payment_methods">
												<h4>Credit or Debit Cards</h4>
												<form>
													<div class="row">
														<div class="col-lg-12">
															<div class="cc-head">
																<h5>Card Number</h5>
																<ul>
																	<li><img src="images/cc-icon1.png" alt=""></li>
																	<li><img src="images/cc-icon2.png" alt=""></li>
																	<li><img src="images/cc-icon3.png" alt=""></li>
																	<li><img src="images/cc-icon4.png" alt=""></li>
																</ul>
															</div>
															<div class="inpt-field pd-moree">
																<input type="text" name="cc-number" placeholder="">
																<i class="fa fa-credit-card"></i>
															</div><!--inpt-field end-->
														</div>
														<div class="col-lg-6">
															<div class="cc-head">
																<h5>First Name</h5>
															</div>
															<div class="inpt-field">
																<input type="text" name="f-name" placeholder="">
															</div><!--inpt-field end-->
														</div>
														<div class="col-lg-6">
															<div class="cc-head">
																<h5>Last Name</h5>
															</div>
															<div class="inpt-field">
																<input type="text" name="l-name" placeholder="">
															</div><!--inpt-field end-->
														</div>
														<div class="col-lg-6">
															<div class="cc-head">
																<h5>Expiresons</h5>
															</div>
															<div class="rowwy">
																<div class="row">
																	<div class="col-lg-6 pd-left-none no-pd">
																		<div class="inpt-field">
																			<input type="text" name="f-name" placeholder="">
																		</div><!--inpt-field end-->
																	</div>
																	<div class="col-lg-6 pd-right-none no-pd">
																		<div class="inpt-field">
																			<input type="text" name="f-name" placeholder="">
																		</div><!--inpt-field end-->
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="cc-head">
																<h5>Cvv (Security Code) <i class="fa fa-question-circle"></i></h5>
															</div>
															<div class="inpt-field">
																<input type="text" name="l-name" placeholder="">
															</div><!--inpt-field end-->
														</div>
														<div class="col-lg-12">
															<button type="submit">Continue</button>
														</div>
													</div>
												</form>
												<h4>Add Paypal Account</h4>
											</div>
										</div><!--add-billing-method end-->
									</div>
									<div class="product-feed-tab" id="business-dd">
									
										<div class="user-profile-ov">
											 <h3>
											    <a href="#" title="" class="overview-open">Business Profile</a> 
											    <!--<button type="button" title="" class="overview-open w-25 float-right form-control" style="background:#008069"><i class="fa fa-plus"></i> Add Business Profile</button>-->
											    <button type="button" class="btn w-25 float-right " data-toggle="modal" data-target=".business-profile-modal" style="background:#008069"><i class="fa fa-plus"></i> Add Business Profile</button>

                    
										    </h3>
										    <table class="table">
                                              <thead>
                                                <tr>
                                                  <th scope="col">#</th>
                                                  <th scope="col">Name of the Organization</th>
                                                  <th scope="col"></th>
                                                  <th scope="col"></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <th scope="row"></th>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                </tr>
                                                
                                              </tbody>
                                            </table>
										    
										    	
										</div>	
									
									</div>
									<div class="product-feed-tab" id="advisory-listing-dd">
									
										<div class="user-profile-ov">
											 <h3>
											    <a href="#" title="" class="overview-open">Advisory Listing</a> 
											    <!--<button type="button" title="" class="overview-open w-25 float-right form-control" style="background:#008069"><i class="fa fa-plus"></i> Add Business Profile</button>-->
											    <button type="button" class="btn w-25 float-right " data-toggle="modal" data-target=".advisory-listing-modal" style="background:#008069"><i class="fa fa-plus"></i> Add Advisory Listing</button>
										    </h3>
										    <!--<table class="table">-->
										    <div class="table-responsive">
										        <table id="example" class="table display responsive" cellspacing="0" style="width:100%">
                                              <thead>
                                                <tr>
                                                  <th scope="col">#</th>
                                                  <th scope="col">Listing Name</th>
                                                  <th scope="col">Advisory Type</th>
                                                  <th scope="col">Category</th>
                                                  <th scope="col">Duration</th>
                                                  <th scope="col">Fees</th>
                                                  <th scope="col">Available</th>
                                                  <th scope="col">Description</th>
                                                  <th scope="col">Experience</th>
                                                  <th scope="col">Action</th>
                                                  									
                                                </tr>
                                              </thead>
                                              <tbody>
                                                  @foreach($advisory_listings as $k=>$data)
                                                   <tr >
                                                      <td>{{++$k}}</td>
                                                      <td>{{$data->listing_name}}</td>
                                                      <td>{{$data->type}}</td>
                                                      <td>{{$data->category}}</td>
                                                      <td>{{$data->duration_in_hours}},{{$data->duration_in_minutes}}</td>
                                                      <td>{{$data->fees}}</td>
                                                      <td>
                                                          @php $mode = json_decode($data->mode)@endphp 
                                                          @foreach($mode as $v)
                                                          {{$v}},
                                                          @endforeach
                                                      </td>
                                                      <td>{{$data->about_listing}}</td>
                                                      <td>{{$data->experience}}</td>
                                                      <td>
                                                          
                                                        <li class="list-inline-item">
                                                            <button class="btn btn-primary btn-sm rounded-0 edit" type="button" data-toggle="tooltip" data-placement="top" title="Edit" data-id="{{$data->id}}"><i class="fa fa-edit"></i></button>
                                                            
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <button class="btn btn-danger btn-sm rounded-0 delete" type="button" data-toggle="tooltip" data-placement="top" title="Delete" data-id="{{$data->id}}" onclick="return confirm('Are You Sure?');"><i class="fa fa-trash"></i></button>
                                                        </li>
                                                      </td>
                                                    </tr>
                                                  @endforeach
                                              </tbody>
                                            </table>
										    </div>
										    	
										</div>	
									
									</div>
									<div class="product-feed-tab" id="myleads-dd">
									
										<div class="user-profile-ov">
											 <h3>
											    <a href="#" title="" class="overview-open">Leads</a> 
											    <!--<button type="button" title="" class="overview-open w-25 float-right form-control" style="background:#008069"><i class="fa fa-plus"></i> Add Business Profile</button>-->
											</h3>
											<div class="row">
										     @foreach($advisory_request as $data)
                                              <div class="col-sm-6">
                                                <div class="card">
                                                  <div class="card-body">
                                                    <h3 class="card-title"><a href="#">Request Recieved From : {{$data->users->name}}</a></h3>
                                                    <p class="card-text">Date and time of Request Received : {{date('M d,Y h:i A',strtotime($data->created_at))}}</p>
                                                    <p class="card-text">Subject : {{$data->listing_name}}</p>
                                                    <p class="card-text">Advisory Type : {{$data->type}}</p>
                                                    <p class="card-text">User Requirement : {{$data->title}}</p>
                                                    <p class="card-text">Request Status : <span class="badge @if($data->status == 'pending') badge-warning @elseif($data->status == 'accepted') badge-success @else badge-danger @endif">{{$data->status}}</span></p>
                                                    <p class="card-text">Payment : {{$data->fees}}</p>
                                                    <p class="card-text">Comment : </p>
                                                  
                                                  </div>
                                                </div>
                                              </div>
                                              @endforeach
                                            </div>
										    
										</div>	
									
									</div>
									<div class="product-feed-tab" id="letsconnect-dd">
									
										<div class="user-profile-ov">
											 <h3>
											    <a href="#" title="" class="overview-open">Let's Connect Inbox</a> 
											    <!--<button type="button" title="" class="overview-open w-25 float-right form-control" style="background:#008069"><i class="fa fa-plus"></i> Add Business Profile</button>-->
											</h3>
											
											<table class="table">
                                              <thead>
                                                <tr>
                                                  <th scope="col">#</th>
                                                  <th scope="col"></th>
                                                  <th scope="col"></th>
                                                  <th scope="col"></th>
                                                  <th scope="col"></th>			
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <th scope="row"></th>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  
                                                </tr>
                                                
                                              </tbody>
                                            </table>
										    	
										</div>	
									
									</div>
									<!--<div class="product-feed-tab" id="outbox-dd">
									
										<div class="user-profile-ov">
											 <h3>
											    <a href="#" title="" class="overview-open">Outbox</a> 
											  
											</h3>
										    <div class="row">
                                              <div class="col-sm-6">
                                                <div class="card">
                                                  <div class="card-body">
                                                    <h3 class="card-title"><a href="#">Request Recieved From :</a></h3>
                                                    <p class="card-text">Date and time of Request Received : Aug 31,2022 03:33 PM</p>
                                                    <p class="card-text">Subject : </p>
                                                    <p class="card-text">Advisory Type : </p>
                                                    <p class="card-text">User Requirement : </p>
                                                    <p class="card-text">Request Status : <span class="badge badge-warning">Pending</span></p>
                                                    <p class="card-text">Payment : </p>
                                                    <p class="card-text">Comment : </p>
                                                  
                                                  </div>
                                                </div>
                                              </div>
                                              
                                            </div>
										    	
										</div>	
									
									</div>-->
									<div class="product-feed-tab" id="myposts-dd">
									
										<div class="user-profile-ov">
											 <h3>
											    <a href="#" title="" class="overview-open">My Post</a> 
											    <!--<button type="button" title="" class="overview-open w-25 float-right form-control" style="background:#008069"><i class="fa fa-plus"></i> Add Business Profile</button>-->
											    <button type="button" class="btn w-25 float-right " data-toggle="modal" data-target=".mypost-modal" style="background:#008069"><i class="fa fa-plus"></i> Add Post</button>
										    </h3>
										    <table class="table">
                                              <thead>
                                                <tr>
                                                  <th scope="col">#</th>
                                                  <th scope="col">Post</th>
                                                  <th scope="col">Image</th>
                                                  <th scope="col">Action</th>
                                                  									
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <th scope="row"></th>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                </tr>
                                                
                                              </tbody>
                                            </table>
										    
										    	
										</div>	
									
									</div>
									<div class="product-feed-tab" id="myscorecard-dd">
									
										<div class="user-profile-ov">
											 <h3>
											    <a href="#" title="" class="overview-open">Score Card</a> 
											</h3>
										    <div class="row">
										        <div class="col-md-5">
										            <ul>
										                <li>No. of Followers : {{$follower ? $follower : 0 }}</li>
										                <li>Total Request Received for Advice: 0</li>
										                <li>Total Request Rejected : 0</li>
										                <li>Total Request Unsatisfied : 0</li>
										            </ul>
										        </div>
										        <div class="col-md-4">
										            <ul>
										                <li>No. of Following : {{$following ? $following : 0}}</li>
										                <li>Total Request Accepted : 0</li>
										                <li>Total Request Satisfied : 0</li>
										                <li>Total Advices : 0</li>
										            </ul>
										        </div>
										    </div>
										</div>	
									
									</div>
									
								</div><!--main-ws-sec end-->
							</div>
							<!--<div class="col-lg-3">
								<div class="right-sidebar">
									<div class="message-btn">
										<a href="#" title=""><i class="fa fa-envelope"></i> Message</a>
									</div>
									<div class="widget widget-portfolio">
										<div class="wd-heady">
											<h3>Portfolio</h3>
											<img src="images/photo-icon.png" alt="">
										</div>
										<div class="pf-gallery">
											<ul>
												<li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
												<li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
												<li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
												<li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
												<li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
												<li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
												<li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
												<li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
												<li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
												<li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
												<li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
												<li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>-->
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>

		<footer>
			<div class="footy-sec mn no-margin">
				<div class="container">
					<ul>
						<li><a href="#" title="">Help Center</a></li>
						<li><a href="#" title="">Privacy Policy</a></li>
						<li><a href="#" title="">Community Guidelines</a></li>
						<li><a href="#" title="">Cookies Policy</a></li>
						<li><a href="#" title="">Career</a></li>
						<li><a href="#" title="">Forum</a></li>
						<li><a href="#" title="">Language</a></li>
						<li><a href="#" title="">Copyright Policy</a></li>
					</ul>
					<p><img src="images/copy-icon2.png" alt="">Copyright 2022</p>
					<img class="fl-rgt" src="images/logo2.png" alt="">
				</div>
			</div>
		</footer><!--footer end-->

		<div class="overview-box" id="overview-box">
			<div class="overview-edit">
				<h3>Overview</h3>
				<span>5000 character left</span>
				<form action="{{route('profile.update')}}" method="post">
				    @csrf
				    <input type="hidden" name="id" value="{{Auth::user()->id}}" >
					<textarea name="overview">{{Auth::user()->overview}}</textarea>
					<button type="submit" class="save">Update</button>
				
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div>
		</div>


		<div class="overview-box" id="experience-box">
			<div class="overview-edit">
				<h3>Experience</h3>
				<form>
					<input type="text" name="subject" placeholder="Subject">
					<textarea></textarea>
					<button type="submit" class="save">Update</button>
					<!--<button type="submit" class="save-add">Save & Add More</button>-->
					<!--<button type="submit" class="cancel">Cancel</button>-->
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div>

		<div class="overview-box" id="education-box">
			<div class="overview-edit">
				<h3>Education</h3>
				<form>
					<input type="text" name="school" placeholder="School / University">
					<div class="datepicky">
						<div class="row">
							<div class="col-lg-6 no-left-pd">
								<div class="datefm">
									<input type="text" name="from" placeholder="From" class="datepicker">	
									<i class="fa fa-calendar"></i>
								</div>
							</div>
							<div class="col-lg-6 no-righ-pd">
								<div class="datefm">
									<input type="text" name="to" placeholder="To" class="datepicker">
									<i class="fa fa-calendar"></i>
								</div>
							</div>
						</div>
					</div>
					<input type="text" name="degree" placeholder="Degree">
					<textarea placeholder="Description"></textarea>
					<button type="submit" class="save">Save</button>
					<!--<button type="submit" class="save-add">Save & Add More</button>-->
					<!--<button type="submit" class="cancel">Cancel</button>-->
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div>

		<div class="overview-box" id="location-box">
			<div class="overview-edit">
				<h3>Address</h3>
				<form>
					<div class="datefm">
						<select>
							<option>Country</option>
							<option value="pakistan">Pakistan</option>
							<option value="england">England</option>
							<option value="india">India</option>
							<option value="usa">United Sates</option>
						</select>
						<i class="fa fa-globe"></i>
					</div>
					<div class="datefm">
						<select>
							<option>City</option>
							<option value="london">London</option>
							<option value="new-york">New York</option>
							<option value="sydney">Sydney</option>
							<option value="chicago">Chicago</option>
						</select>
						<i class="fa fa-map-marker"></i>
					</div>
					<button type="submit" class="save">Update</button>
					<!--<button type="submit" class="cancel">Cancel</button>-->
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div>

		<div class="overview-box" id="skills-box">
			<div class="overview-edit">
				<h3>Skills</h3>
				<ul>
					<li><a href="#" title="" class="skl-name">HTML</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
					<li><a href="#" title="" class="skl-name">php</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
					<li><a href="#" title="" class="skl-name">css</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
				</ul>
				<form>
					<input type="text" name="skills" placeholder="Skills">
					<button type="submit" class="save">Update</button>
					<!--<button type="submit" class="save-add">Save & Add More</button>-->
					<!--<button type="submit" class="cancel">Cancel</button>-->
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div>

		<div class="overview-box" id="create-portfolio">
			<div class="overview-edit">
				<h3>Create Portfolio</h3>
				<form>
					<input type="text" name="pf-name" placeholder="Portfolio Name">
					<div class="file-submit">
						<input type="file" name="file">
					</div>
					<div class="pf-img">
						<img src="http://via.placeholder.com/60x60" alt="">
					</div>
					<input type="text" name="website-url" placeholder="htp://www.example.com">
					<button type="submit" class="save">Update</button>
					<!--<button type="submit" class="cancel">Cancel</button>-->
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div>
		
		<!--<div class="overview-box" id="overview-box">
			<div class="overview-edit">
				<h3>Add Business Profile</h3>
				<form action="{{route('profile.update')}}" method="post">
				    @csrf
				    <input type="hidden" name="id" value="{{Auth::user()->id}}" >
					<textarea name="overview">{{Auth::user()->overview}}</textarea>
					<button type="submit" class="save">Update</button>
				
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
				
				
			</div>
		</div>
		-->
		<!-----------------------------------------------------Business Profile------------------------------------------------------------------------->
        <div class="modal fade business-profile-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
             
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Business Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <div class="container">
                          <div class="row mb-2">
        				    <div class="col-md-6">
        				            <label>Name of the Organization<span class="text-danger">*</span></label>
        				            <input type="text" class="form-control" name="name" value="" placeholder="Name of the Organization" >
        				        </div>
        				       
        				  </div>
        				  <div class="row mb-2">
        				    
        				    <div class="col-md-12">
    				          <h6>Address of the Organization</h6>
    				        </div>
        				    <div class="col-md-6">
    				            <label>Line 1<span class="text-danger">*</span></label>
    				            <input type="text" class="form-control" name="address_line_1" value="" placeholder="Line 1" >
    				        </div>
        				     <div class="col-md-6">
    				            <label>Line 2</label>
    				            <input type="text" class="form-control" name="address_line_2" value="" placeholder="Line 2" >
    				        </div>  
        				  </div>
        				  <div class="row mb-2">
					        <div class="col-md-6">
					            <label>Country<span class="text-danger">*</span></label>
					            <select class="form-control" name="country">
					                <option selected>India</option>
					            </select>
					        </div>
					        <div class="col-md-6">
					            <label>State<span class="text-danger">*</span></label>
					            <select class="form-control" name="state">
					                <option selected>Select</option>
					                <option value="Andhra Pradesh" >Andhra Pradesh</option>
					                <option value="Andaman and Nicobar Islands" >Andaman and Nicobar Islands</option>
					                <option value="Arunachal Pradesh" >Arunachal Pradesh</option>
					                <option value="Assam" >Assam</option>
					                <option value="Bihar" >Bihar</option>
					                <option value="Chattisgarh" >Chattisgarh</option>
					                <option value="Chandigarh" >Chandigarh</option>
					                <option value="Dadra and Nagar Haveli and Daman & Diu">Dadra and Nagar Haveli and Daman & Diu</option>
					                <option value="Delhi" >Delhi</option>
					                <option value="Goa" >Goa</option>
					                <option value="Gujarat" >Gujarat</option>
					                <option value="Haryana" >Haryana</option>
					                <option value="Himachal Pradesh">Himachal Pradesh</option>
					                <option value="Jammu & Kashmir" >Jammu & Kashmir</option>
					                <option value="Jharkhand" >Jharkhand</option>
					                <option value="Karnataka">Karnataka</option>
					                <option value="Kerala" >Kerala</option>
					                <option value="Ladakh" >Ladakh</option>
					                <option value="Lakshadweep" >Lakshadweep</option>
					                <option value="Madhya Pradesh">Madhya Pradesh</option>
					                <option value="Maharashtra" >Maharashtra</option>
					                <option value="Manipur" >Manipur</option>
					                <option value="Meghalaya" >Meghalaya</option>
					                <option value="Mizoram" >Mizoram</option>
					                <option value="Nagaland" >Nagaland</option>
					                <option value="Odisha" >Odisha</option>
					                <option value="Puducherry" >Puducherry</option>
					                <option value="Punjab" >Punjab</option>
					                <option value="Rajasthan" >Rajasthan</option>
					                <option value="Sikkim" >Sikkim</option>
					                <option value="Tamil Nadu" >Tamil Nadu</option>
					                <option value="Telangana" >Telangana</option>
					                <option value="Tripura">Tripura</option>
					                <option value="Uttarakhand" >Uttarakhand</option>
					                <option value="Uttar Pradesh" >Uttar Pradesh</option>
					                <option value="West Bengal" >West Bengal</option>

					            </select>
					        </div>
					        
					    </div>
        				  <div class="row mb-2">
        				        <div class="col-md-6">
					            <label>City<span class="text-danger">*</span></label>
    					            <input type="text" name="city" class="form-control" value="">
    					        </div>
        				        
        				        <div class="col-md-6">
        				            <label>Pincode</label>
        				            <input type="number" class="form-control" name="pincode" value="" placeholder="Pincode" >
        				        </div>
        				       
        				    </div>
        				   <div class="row">
				                 <div class="col-md-12">
    				                <label>Type of the Organisation<span class="text-danger">*</span></label>
    				             </div>
            				     <div class="col-md-3">
        				            <input type="radio" class="organization_type" name="organization_type" value="Properitorship" > Properitorship
        				         </div>
        				         <div class="col-md-3">
        				            <input type="radio" class="organization_type" name="organization_type" value="Partnership" > Partnership
        				         </div>
        				         <div class="col-md-3">
        				            <input type="radio" class="organization_type" name="organization_type" value="Private Limited" > Private Limited
        				         </div>
        				         <div class="col-md-3">
        				            <input type="radio" class="organization_type" name="organization_type" value="Public Limited" > Public Limited
        				         </div>
        				         <div class="col-md-3">
        				            <input type="radio" class="organization_type" name="organization_type" value="LLP" > LLP
        				         </div>
        				         <div class="col-md-3">
        				            <input type="radio" class="organization_type" name="organization_type" value="Listed Co." > Listed Co.
        				         </div>
        				         <div class="col-md-3">
        				            <input type="radio" class="organization_type" name="organization_type" value="Other" > Other
        				         </div>
            				</div>
        				   
    				       <div class="row mb-2">
        				        <div class="col-md-12">
        				            <label>Write about your Organisation<span class="text-danger">*</span></label>
        				            <textarea class="form-control" name="about_organisation" id="about_organisation" placeholder="Write about how your advise is beneficial for others" ></textarea>
    				            </div>
    				        </div>
        				   <div class="row mb-2">
    				        
    				            <div class="col-md-12">
    				                <label>Upload Organisation Pictures</label>
    				                <input type="file" class="form-control" name="org_images[]" required>
    				            </div>
    				        
    				        </div>
    				        <div class="row mb-2">
        				        <div class="col-md-12">
        				            <label>Orgnisation is ISO Certified 
        				                <input type="radio" name="ios_cert" class="ios_cert" value="1">Yes
        				                <input type="radio" name="ios_cert" class="ios_cert" value="0">Not now
        				            </label>
        				            <textarea class="form-control" name="about_organisation" id="about_organisation" placeholder="Add Your ISO certification like ISO 9001:2015, ISO 14001, ISO 18001 etc." ></textarea>
    				            </div>
    				        </div>
    				        <div class="row mb-2">
        				        <div class="col-md-12">
        				            <label>Any Accomplishment/awards/honer/achievements
        				                <input type="radio" name="achievement" class="achievement" value="1">Yes
        				                <input type="radio" name="achievement" class="achievement" value="0">Not now
        				            </label>
        				            <textarea class="form-control" name="about_achievement" id="about_achievement" placeholder="Write Something..." ></textarea>
    				            </div>
    				        </div>
    				        <div class="row mb-2">
        				        <div class="col-md-12">
        				            <label>Have registered trademark
        				                <input type="radio" name="trademark" class="trademark" value="1">Yes
        				                <input type="radio" name="trademark" class="trademark" value="0">Not now
        				            </label>
        				            <textarea class="form-control" name="about_trademark" id="about_trademark" placeholder="Name of the Trademark" ></textarea>
    				            </div>
    				        </div>
    				        <div class="row">
				                 <div class="col-md-12">
    				                <label>Please select your business is related<span class="text-danger">*</span></label>
    				             </div>
            				     <div class="col-md-3">
        				            <input type="radio" class="business_sector" name="business_sector" value="Product Sector" > Product Sector
        				         </div>
        				         <div class="col-md-3">
        				            <input type="radio" class="business_sector" name="business_sector" value="Service Sector" > Service Sector
        				         </div>
        				         <div class="col-md-3">
        				            <input type="radio" class="business_sector" name="business_sector" value="Both" > Both
        				         </div>
        				         
            				</div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn " style="background:#008069">Save</button>
                  </div>
                </div>
            </div>
          </div>
        </div>

        <!----------------------------------------------------- Advisory Listing------------------------------------------------------------------------->
        <div class="modal fade advisory-listing-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
             
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Advisory Listing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <form action="#" id="advisory-listing" onsubmit="return false;">
                   
                  <div class="modal-body">
                     <div class="container">
                         <input type="hidden" name="id" id="id" value="">
                        <div class="row mb-2">
                            <div class="col-md-6">
    				            <label>Advisory Type<span class="text-danger">*</span></label>
    				            <select class="form-control" name="type" id="type" required>
    				                <option value="" selected>Select Advisory Type</option>
    				                <option value="Product Advisory">Product Advisory</option>
    				                <option value="Service Advisory">Service Advisory</option>
    				            </select>
    				        </div>
    				        <div class="col-md-6">
    				            <label>Category<span class="text-danger">*</span></label>
    				            <select class="form-control" name="category" id="category" required>
    				                <option value="" selected>Select Category</option>
    				                <option value="Product Category">Product Category</option>
    				                <option value="Service Category">Service Category</option>
    				            </select>
    				        </div>
    				       
    				    </div>
    				    <div class="row mb-2">
    				    
        				    <div class="col-md-6">
    				            <label>Give any suitable name for this listing<span class="text-danger">*</span></label>
    				            <input type="text" class="form-control" name="listing_name" id="listing_name" value="" required placeholder="Enter Product Name/Service Name" >
    				        </div>
    				        <div class="col-md-6">
    				            <div class="row">
    				                 <div class="col-md-12">
        				                <label>Duration</label>
        				             </div>
                				     <div class="col-md-6">
            				            <input type="number" class="form-control" name="duration_in_hours" id="duration_in_hours" value="" placeholder="In Hours" >
            				         </div>
            				         <div class="col-md-6">
            				            <input type="number" class="form-control" name="duration_in_minutes" id="duration_in_minutes" value="" placeholder="In Minutes" >
            				         </div>
            				    </div>
    				        </div>
    				    </div>
    				    <div class="row mb-2">
    				        <div class="col-md-6">
    				            <label>Fees<span class="text-danger">*</span></label>
    				            <input type="text" class="form-control" name="fees" id="fees" required value="" placeholder="Fees" >
    				        </div>
    				        <div class="col-md-6">
    				            <label>Upload Picture<span class="text-danger">*</span></label>
    				            <input type="file" class="form-control" name="image" required>
    				        </div>
    				        
    				    </div>
    				    <div class="row mb-2">
    				        <div class="col-md-12">
    				            <label>Explain in details about this listing or problem for which you are able to advise.</label>
    				            <textarea class="form-control" name="about_listing" id="about_listing" placeholder="Please write in details about the issue for which u are able to advise for the selected subject matter" ></textarea>
    				        </div>
    				        
    				    </div>
    				    <div class="row mb-2">
    				        <div class="col-md-12">
    				            <label>Write about your experiences and how your advice is beneficial for others?</label>
    				            <textarea class="form-control" name="experience" id="experience" placeholder="Write about how your advise is beneficial for others" ></textarea>
    				        </div>
    				        
    				    </div>
    				    <div class="row mb-2">
    				    
        				    <div class="col-md-6">
    				           
    				            <div class="row">
    				                 <div class="col-md-12">
        				                <label>Please select your mode to provide the solutions</label>
        				             </div>
                				     <div class="col-md-6">
            				            <input type="checkbox" class="mode" name="mode[]" value="Voice call" > On Voice Call
            				         </div>
            				         <div class="col-md-6">
            				            <input type="checkbox" class="mode" name="mode[]" value="Video call" > On Video Call
            				         </div>
            				         <div class="col-md-6">
            				            <input type="checkbox" class="mode" name="mode[]" value="Any Desk" > On Any Desk
            				         </div>
            				         <div class="col-md-6">
            				            <input type="checkbox" class="mode" name="mode[]" value="Team Viewer" > On Team Viewer
            				         </div>
            				    </div>
    				        </div>
    				        <div class="col-md-6">
    				            <div class="row">
    				                 <div class="col-md-12">
        				                <label>Period of experience</label>
        				             </div>
                				     <div class="col-md-6">
            				            <input type="number" class="form-control" name="exp_in_years" id="exp_in_years" value="" placeholder="In Years" >
            				         </div>
            				         <div class="col-md-6">
            				            <input type="number" class="form-control" name="exp_in_months" id="exp_in_months" value="" placeholder="In Month" >
            				         </div>
            				    </div>
    				        </div>
    				    </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn" id="saveBtn" style="background:#008069">Save</button>
                  </div>
                </form>
                </div>
            </div>
          </div>
        </div>
        
        
         <!-----------------------------------------------------My Post------------------------------------------------------------------------->
        <div class="modal fade mypost-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
             
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Add Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <div class="container">
                       
    				    <div class="row mb-2">
    				        <div class="col-md-12">
    				            <label>Write something here<span class="text-danger">*</span></label>
    				            <textarea class="form-control" name="problem" placeholder="Write about how your advise is beneficial for others" ></textarea>
    				        </div>
    				        
    				    </div>
    				    <div class="row mb-2">
    				         <div class="col-md-6">
    				            <label>Upload Image</label>
    				            <input type="file" class="form-control" name="image" >
    				        </div>
    				        
    				    </div>
    				    
                     </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn" style="background:#008069">Save</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
        
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
            
            $(".share").on('click',function(){
                $(".social-media-icons").fadeToggle();
            });
        
            
            
            /*---------My Profile--------------*/
            
            
            $('#profile-form').validate({
                rules: {
                    name : {
                        required: true,
                        minlength: 5
                    },
                    gender: {
                        required: true,
                    },
                    country: {
                        required: true,
                    },
                    state: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    contact: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        digits: true
                    },
                    email: {
                        required: true,
                        email:true
                    },
                    work_status: {
                        required: true,
                    },
                    
                },
                messages: {
                    name : {
                        required: "Enter Your Name",
                    },
                     gender : {
                        required: "Select Your Gender",
                    },
                     country : {
                        required: "Select Your Country",
                    },
                    state : {
                        required: "Select Your State",
                    },
                    city : {
                        required: "Enter Your City",
                    },
                    contact : {
                        required: "Enter Your Contact No.",
                        minlength: "Phone number should be 10 digit",
                        maxlength: "Phone number should be 10 digit"
                    },
                    email : {
                        required: "Enter Your Email-address",
                        email: "Enter Valid Email-address",
                    },
                    work_status : {
                        required: "Select Your Work Status",
                    }
                },
               submitHandler: function(form) 
              {
                    
                  var form = $('#profile-form')[0];
                  var datas = new FormData(form); 
                
                  $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                  $('.process-comm').css("display", "block");
                  $.ajax({
                      url: "{{route('profile.update')}}", 
                      type: "POST",             
                      data: datas,
                      cache: false,             
                      processData: false,
                      contentType: false,
                      dataType: "json",  
                      
                      success: function(data) 
                      {
                         $('.process-comm').css("display", "none");
                        
                         if(data.status == true){
                            toastr.success("Success!", data.message);
                            // location.reload();
                         }else{
                            toastr.error("Opps!", data.message);
                            // location.reload();
                         }
                      }
                  });
                  return false;
              },
            });
            
            
            
            $('[data-toggle="tooltip"]').tooltip();
            
             $('#example').DataTable({
                responsive: {
                    details: {
                        type: 'column'
                    }
                },
                columnDefs: [ {
                    className: 'dtr-control',
                    orderable: false,
                    targets:   0
                } ],
                order: [ 1, 'asc' ]
            } );
            
            /*---------Profile Image--------------*/
            $("a[id='image']").click(function() {
                $("input[id='my_file']").click();
            });
            
            $("#my_file").change(function() {
               
                var img = $(this).prop('files')[0];
                var id = $(this).data('id');
                var form_data = new FormData(); 
                 form_data.append("image", img) 
                 form_data.append("id",id) 
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url: "{{route('profile.update')}}",
                    data:form_data,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        if(data.status == true){
                              toastr.options.timeOut = 1500; // 1.5s
                              toastr.success(data.message);
                              location.reload();
                        }else{
                            toastr.options.timeOut = 1500; // 1.5s
                              toastr.error('Something went wrong!');
                              location.reload();
                        }
                    },
                    error: function(data){
                        console.log("error");
                    }
                });
                  
             });
             
            /*---------Cover Image--------------*/
            $("a[id='cover']").click(function() {
                $("input[id='my_cover']").click();
            });
            
             $("#my_cover").change(function() {
               
                var cover_img = $(this).prop('files')[0];
                var id = $(this).data('id');
                var form_data = new FormData(); 
                 form_data.append("cover_image", cover_img) 
                 form_data.append("id",id) 
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url: "{{route('profile.update')}}",
                    data:form_data,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        if(data.status == true){
                              toastr.options.timeOut = 1500; // 1.5s
                              toastr.success(data.message);
                              location.reload();
                        }else{
                            toastr.options.timeOut = 1500; // 1.5s
                              toastr.error('Something went wrong!');
                              location.reload();
                        }
                    },
                    error: function(data){
                        console.log("error");
                    }
                });
                  
             });
             
             
            /*---------Advisory Listing--------------*/
            
            
            $('#advisory-listing').validate({
               submitHandler: function(form) 
              {
    
                  var form = $('#advisory-listing')[0];
                  var datas = new FormData(form); 
                
                  $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                  $.ajax({
                      url: "{{route('advisory-listing.create')}}", 
                      type: "POST",             
                      data: datas,
                      cache: false,             
                      processData: false,
                      contentType: false,
                      dataType: "json",  
                      
                      success: function(data) 
                      {
                        //  $('.loader_gif').css("display", "none");
                        
                            // $('#companydata').trigger("reset");
                            // $('#modal-id').modal('hide');
                         if(data.status == true){
                            toastr.success("Success!", data.message);
                            location.reload();
                         }else{
                            toastr.error("Opps!", data.message);
                            location.reload();
                         }
                      }
                  });
                  return false;
              },
            });
            
            
            $('body').on('click', '.edit', function () {
                
              var id = $(this).data('id');
              
              $.get("{{ url('advisory-listing-edit') }}" +'/' + id, function (data) {
                  $('#exampleModalLabel1').html("Edit Advisory Listing");
                  $('#saveBtn').text("Update");
                  $('.advisory-listing-modal').modal('show');
                  
                  
                  $('#id').val(data.id);
                  $('#type').find('option[value="' + data.type + '"]').attr("selected", "selected");
                  $('#category').find('option[value="' + data.category + '"]').attr("selected", "selected");
                  $('#listing_name').val(data.listing_name);
                  $('#duration_in_hours').val(data.duration_in_hours);
                  $('#duration_in_minutes').val(data.duration_in_minutes);
                  $('#fees').val(data.fees);
                  $('#about_listing').val(data.about_listing);
                  $('#experience').val(data.experience);
                  $('#exp_in_years').val(data.exp_in_years);
                  $('#exp_in_months').val(data.exp_in_months);
                  
                  var mode = JSON.parse(data.mode);
                  $(".mode").each(function(x,y){
                        if(mode.includes($(this).val())){
                            $(this).attr('checked', true);
                        }
                  });
              });
              $('body').on('click', '#saveBtn', function () {
                        
                    
                      var editid = $('#id').val();
                    //   alert(editid);
                    
                      var edit_form = $('#advisory-listing')[0];
                      var edit_datas = new FormData(edit_form); 
                    //   alert(edit_datas.valid());
    
                      $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                      });
                      $.ajax({
                          url: "{{ url('advisory-listing-update') }}" +'/' + editid,
                          type: "POST",             
                          data: edit_datas,
                          cache: false,             
                          processData: false,
                          contentType: false,
                          dataType: "json",  
                          
                          success: function(data) 
                          {
                            //  $('.loader_gif').css("display", "none");
                            
                            $('#advisory-listing').trigger("reset");
                            $('#advisory-listing-modal').modal('hide');
                             if(data.status == true){
                                toastr.success("Success!", data.message);
                                //location.reload();
                             }else{
                                toastr.error("Opps!", data.message);
                                //location.reload();
                             }
                          }
                      });
                    });
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
            
    </script>
    
   
@endpush