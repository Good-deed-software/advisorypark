<div class="col-lg-3">
    <div class="main-left-sidebar">
        <div class="user_profile">
            <div class="user-pro-img">
                @php $image = Auth::user()->image; @endphp @if(Auth::user()->image !== null)
                <img src='{{asset("front/images/users/$image")}}' alt="" height="210px" />
                @else
                <img src='{{asset("front/images/users/image.jpg")}}' alt="" height="210px" />
                @endif

                <a href="#" id="image" title=""><i class="fa fa-camera"></i></a>
                <input type="file" id="my_file" style="display: none;" data-id="{{Auth::user()->id}}" />
            </div>
            <!--user-pro-img end-->
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
            </div>
            <!--user_pro_status end-->
            <div class="tab-feed st2">
                <ul class="social_links">
                    <li data-tab="info-dd"><a href="#info-dd" title="">My Profile</a></li>
                    @if(\Session::get('type') == 'User')
                    <li data-tab="letsconnect-dd"><a href="#letsconnect-dd" title="">Let's Connect</a></li>
                    <li data-tab="myrequirments-dd"><a href="#myrequirments-dd" title="">My Requirments</a></li>
                    @elseif(\Session::get('type') == 'Advisor')
                    <li data-tab="business-dd"><a href="#business-dd" title="">My Business Profile</a></li>
                    <li data-tab="advisory-listing-dd"><a href="#advisory-listing-dd" title="">My Advisory Listing</a></li>
                    <li data-tab="myleads-dd"><a href="#myleads-dd" title="">My Leads</a></li>
                    <li data-tab="myposts-dd"><a href="#myposts-dd" title="">My Posts</a></li>
                    <li data-tab="myscorecard-dd"><a href="#" title="">My Score card</a></li>
                    @endif
                    <li><a href="{{route('logout')}}" title="">Logout</a></li>
                </ul>
            </div>
        </div>
        <!--user_profile end-->
    </div>
</div>
