@extends('layout.app')

@push('css')
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
@endpush

@section('content')
	<section class="cover-sec">
		@php $cover_image = Auth::user()->cover_image; @endphp
		@if(Auth::user()->cover_image !== null)
		<img src='{{asset("front/images/users/$cover_image")}}' alt="" height="375px">
		@else
		<img src="https://via.placeholder.com/1600x400" alt="" height="375px">
		@endif
		<a href="#" id="cover" title=""><i class="fa fa-camera"></i> Change Cover</a>
		<input type="file" id="my_cover" style="display: none;" data-id="{{Auth::user()->id}}" />
	</section>


	<main>
		<div class="main-section">
			<div class="container">
				<div class="main-section-data">
					<div class="row">
						<!-- User Tabs sidebar -->
						@include('profile-contents.sidebar') 
						<!-- User Tabs sidebar -->

						<div class="col-lg-9">
							<div class="main-ws-sec">
								<!-- Tabs option for tab -->
								@include('profile-contents.tabs-options') 
								<!-- Tabs option for tab -->

								<!-- Info dd -->
								@include('tabs.info-tab') 
								<!-- Info dd -->
								
								<!-- Feed dd -->
								@include('tabs.feeds-tab') 
								<!-- Feed dd -->
								
								<!-- saved jobs -->
								@include('tabs.saved-jobs-tab') 
								<!-- Saved jobs -->
								
								<!-- My bids -->
								@include('tabs.my-bids-tab') 
								<!-- My bids -->
								
								<!-- payement dd -->
								@include('tabs.payment-tab') 
								<!-- payement dd -->
								
								<!-- Business Ad -->
								@include('tabs.business-tab') 
								<!-- Business Ad -->
								
								<!-- Advisory listing add -->
								@include('tabs.advisory-listing-tab') 
								<!-- Advisory listing add -->
								
								<!-- my leads -->
								@include('tabs.myleads-tab') 
								<!-- my leads -->
								
								<!-- My requirments -->
								@include('tabs.myrequirments-tab') 
								<!-- My requirments -->
								
								<!-- lets connect -->
								@include('tabs.letsconnect-tab') 
								<!-- lets connect -->
								
								<!-- my posts -->
								@include('tabs.myposts-tab') 
								<!-- my posts -->
								
								<!-- My score card -->
								@include('tabs.myscorecard-tab') 
								<!-- My score card -->
								
							</div>
							<!--main-ws-sec end-->
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
											<li><a href="#" title=""><img src="#" alt=""></a></li>
											<li><a href="#" title=""><img src="#" alt=""></a></li>
											<li><a href="#" title=""><img src="#" alt=""></a></li>
											<li><a href="#" title=""><img src="#" alt=""></a></li>
											<li><a href="#" title=""><img src="#" alt=""></a></li>
											<li><a href="#" title=""><img src="#" alt=""></a></li>
											<li><a href="#" title=""><img src="#" alt=""></a></li>
											<li><a href="#" title=""><img src="#" alt=""></a></li>
											<li><a href="#" title=""><img src="#" alt=""></a></li>
											<li><a href="#" title=""><img src="#" alt=""></a></li>
											<li><a href="#" title=""><img src="#" alt=""></a></li>
											<li><a href="#" title=""><img src="#" alt=""></a></li>
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
				<p><img src="#" alt="">Copyright 2022</p>
				<img class="fl-rgt" src="#" alt="">
			</div>
		</div>
	</footer><!--footer end-->

	<!-- add views/profile-contents/optional-content.blade.php if you want to make it functional currently it was not need -->

	<!---------------------------- Business Profile modal ------------------------------->
	@include('modals.business-profile-madal') 
	<!---------------------------- Business Profile modal ------------------------------->

	<!--------------------------- Advisory Listing modal ------------------------------>
	@include('modals.advisory-listing-madal')
	<!--------------------------- Advisory Listing modal ------------------------------>
	
	<!------------------------- Reject Request Reason Modal --------------------------->
	@include('modals.reject-request-reason-madal')
	<!------------------------- Reject Request Reason Modal --------------------------->
	
	<!----------------------- Satisfy/Dissatisfy Feedback Modal ----------------------->
	@include('modals.satisfy-feedback-madal')
	<!----------------------- Satisfy/Dissatisfy Feedback Modal ----------------------->
		
@endsection
@push('js')
	<!-- PROFILE JS START -->
	@include('profile-contents.profile-js') 
	<!-- PROFILE JS END ---->
@endpush