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
            <li>
                <a href="#" title=""><i class="la la-globe"></i></a>
            </li>
            <li>
                <a href="#" title=""><i class="fa fa-facebook-square"></i></a>
            </li>
            <li>
                <a href="#" title=""><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#" title=""><i class="fa fa-pinterest"></i></a>
            </li>
            <li>
                <a href="#" title=""><i class="fa fa-instagram"></i></a>
            </li>
            <li>
                <a href="#" title=""><i class="fa fa-youtube-play text-danger"></i></a>
            </li>
        </ul>
    </div>
    <!--star-descp end-->

    <div class="tab-feed st2">
        <ul>
            <li data-tab="info-dd" class="animated fadeIn active">
                <a href="#" title="" class="true">
                    <img src="{{asset('front/images/ic2.png')}}" alt="" />
                    <span>Info</span>
                </a>
            </li>
            <li data-tab="feed-dd">
                <a href="#" title="">
                    <img src="{{asset('front/images/ic1.png')}}" alt="" />
                    <span>Feed</span>
                </a>
            </li>
            <li data-tab="saved-jobs">
                <a href="#" title="">
                    <img src="{{asset('front/images/ic4.png')}}" alt="" />
                    <span>Saved Post</span>
                </a>
            </li>
            <li data-tab="my-bids">
                <a href="#" title="">
                    <img src="{{asset('front/images/ic5.png')}}" alt="" />
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
                    <img src="{{asset('front/images/ic6.png')}}" alt="" />
                    <span>Payment</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- tab-feed end-->
</div>
