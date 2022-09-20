<header>
			<div class="container">
				<div class="header-data">
					<!--<div class="logo">
						<a href="index.html" title=""><img src="{{asset('front/images/logo.png')}}" alt=""></a>
					</div>-->
					<div class="search-bar">
						<form>
							<input type="text" name="search" placeholder="Search...">
							<button type="submit"><i class="la la-search"></i></button>
						</form>
					</div><!--search-bar end-->
					<nav>
						<ul>
							<li>
								<a href="{{route('index')}}" title="">
									<span><img src="{{asset('front/images/icon1.png')}}" alt=""></span>
									Home
								</a>
							</li>
							<li>
								<a class="post_project" href="#" title="">
									<span><img src="{{asset('front/images/icon2.png')}}" alt=""></span>
									Post a Requirement
								</a>
							</li>
							
							
							<!--<li>
								<a href="{{route('top_advisors')}}" title="">
									<span><img src="{{asset('front/images/icon2.png')}}" alt=""></span>
									Top Advisors
								</a>-->
							    <!--<ul>
									<li><a href="companies.html" title="">Companies</a></li>
									<li><a href="company-profile.html" title="">Company Profile</a></li>
								</ul>-->
							<!--</li>-->
							<li>
								<a href="{{route('advisory')}}" title="">
									<span><img src="{{asset('front/images/icon3.png')}}" alt=""></span>
									Advisory
								</a>
							</li>
						<!--	<li>
								<a href="profiles.html" title="">
									<span><img src="{{asset('front/images/icon4.png')}}" alt=""></span>
									Profiles
								</a>
								<ul>
									<li><a href="user-profile.html" title="">User Profile</a></li>
									<li><a href="my-profile-feed.html" title="">my-profile-feed</a></li>
								</ul>
							</li>
							<li>
								<a href="jobs.html" title="">
									<span><img src="{{asset('front/images/icon5.png')}}" alt=""></span>
									Jobs
								</a>
							</li>-->
						<!--	<li>
								<a href="#" title="" class="not-box-open">
									<span><img src="{{asset('front/images/icon6.png')}}" alt=""></span>
									Messages
								</a>
								<div class="notification-box msg">
									<div class="nt-title">
										<h4>Setting</h4>
										<a href="#" title="">Clear all</a>
									</div>
									<div class="nott-list">
										<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="#" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="messages.html" title="">Jassica William</a> </h3>
							  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
							  					<span>2 min ago</span>
							  				</div>
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="#" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="messages.html" title="">Jassica William</a></h3>
							  					<p>Lorem ipsum dolor sit amet.</p>
							  					<span>2 min ago</span>
							  				</div>
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="#" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="messages.html" title="">Jassica William</a></h3>
							  					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua.</p>
							  					<span>2 min ago</span>
							  				</div>
						  				</div>
						  				<div class="view-all-nots">
						  					<a href="{{route('messages')}}" title="">View All Messsages</a>
						  				</div>
									</div>
								</div>
							</li>-->
							<li>
								<a href="#" title="" class="not-box-open">
									<span><img src="{{asset('front/images/icon7.png')}}" alt=""></span>
									Notification
								</a>
								<div class="notification-box">
									<div class="nt-title">
										<h4>Setting</h4>
										<a href="#" title="">Clear all</a>
									</div>
									<div class="nott-list">
										<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="#" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="#" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="#" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="#" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="view-all-nots">
						  					<a href="#" title="">View All Notification</a>
						  				</div>
									</div><!--nott-list end-->
								</div><!--notification-box end-->
							</li>
						</ul>
					</nav><!--nav end-->
					<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->
					<div class="user-account">
						<div class="user-info">
    						 @auth
    						    @php $image = Auth::user()->image ? Auth::user()->image : "image.jpg"; @endphp
    						    <img src='{{asset("front/images/users/$image")}}' alt="" height="25px">
    							<a href="#" title="">
    							    {{Auth::user()->name}}
    							</a>
    						    <i class="la la-sort-down"></i>
    						 @else
    							<a href="{{route('login')}}" title="">Signup / Login</a>
    						 @endauth
							
						</div>
						<div class="user-account-settingss">
							<!--<h3>Online Status</h3>
							<ul class="on-off-status">
								<li>
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c5">
										<label for="c5">
											<span></span>
										</label>
										<small>Online</small>
									</div>
								</li>
								<li>
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c6">
										<label for="c6">
											<span></span>
										</label>
										<small>Offline</small>
									</div>
								</li>
							</ul>
							<h3>Custom Status</h3>
							<div class="search_form">
								<form>
									<input type="text" name="search">
									<button type="submit">Ok</button>
								</form>
							</div>-->
							<ul class="us-links m-0">
							  @auth
								<li><a href="{{route('profile')}}" title="">Profile</a></li>
								<li><a href="{{route('account_setting')}}" title="">Account Setting</a></li>
								
								<li><a href="{{url('switch-type')}}?type={{\Session::get('type')}}" title="" >Switch to {{\Session::get('type') == 'User' ? 'Advisor' : 'User'}}</a></li>
							<!--	<li><a href="#" title="">Privacy</a></li>
								<li><a href="#" title="">Faqs</a></li>
								<li><a href="#" title="">Terms & Conditions</a></li>-->
							  @else
							 
							    <li><a href="{{route('login')}}" title="">Signup / Login</a></li>
							  @endauth
							</ul>
							 @auth <h3 class="tc m-0"><a href="{{route('logout')}}" title="">Logout</a></h3> @endauth
						</div><!--user-account-settingss end-->
					</div>
				</div><!--header-data end-->
			</div>
		</header><!--header end-->