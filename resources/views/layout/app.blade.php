<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{env('APP_NAME')}}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.min.css')}}">
        <!--<link rel="stylesheet" type="text/css" href="{{asset('front/css/line-awesome.css')}}">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"  />
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/line-awesome-font-awesome.min.css')}}">
        <!--<link rel="stylesheet" type="text/css" href="{{asset('front/css/font-awesome.min.css')}}">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  />
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/jquery.mCustomScrollbar.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/slick.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/slick-theme.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/responsive.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
		@stack('css')
    </head>


<body>
        
	<div class="wrapper">
	
            <!-- / header section -->
            @include('includes.header')
            <!-- / header section -->
 
            <!-- Start Main Content Section -->
            @yield('content')
            <!--  End Main Content Section -->
            
            <!-- Spinner-->
            <div class="process-comm" style="display:none;">
    			<div class="spinner">
    				<div class="bounce1"></div>
    				<div class="bounce2"></div>
    				<div class="bounce3"></div>
    			</div>
    		</div>
    <!-- Post a blog modal -->
    	<div class="post-popup job_post">
			<div class="post-project">
				<h3>Post</h3>
				<div class="post-project-fields">
					<form action="" id="post_form" method="post" enctype="multipart/form-data">
					    @csrf
						<input type="hidden" name="id" id="post_id" value="">
						<div class="row">
							<div class="col-lg-6">
                                <label> Title <span class="text-danger">*</span></label>
								<input type="text" id="post_title" name="title" placeholder="Title" required>
							</div>
						    <div class="col-lg-6">
                                <label> Category <span class="text-danger">*</span></label>
								<div class="inp-field">
									<select name="category[]" class="multiple" id="category_p" multiple required>
									@foreach($config['categories'] as $c)
										<option value="{{$c->id}}" data-val="{{$c->name}}">{{$c->name}}</option>
									@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
                                <label> Skills  <span class="text-danger">*</span></label>
								<div class="inp-field">
									<select name="skill[]" class="multiple" id="skill_p" multiple required>
									@foreach($config['skills'] as $s)
										<option value="{{$s->id}}" data-val="{{$s->name}}">{{$s->name}}</option>
									@endforeach
									</select>
								</div>
							</div>
							<div class="col-lg-6">
                                <label> Tags  <span class="text-danger">*</span></label>
								<div class="inp-field">
									<select name="tag[]" class="multiple" id="tag_p" multiple required>
									@foreach($config['tags'] as $t)
										<option value="{{$t->id}}" data-val="{{$t->name}}">{{$t->name}}</option>
									@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<label>Upload Image</label>
    				            <input type="file" class="form-control" name="image" accept="image/*">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
                                <label> Description  </label>
								<textarea name="description" id="post_description" placeholder="Description" required></textarea>
							</div>
						</div>
						<div class="col-lg-12">
							<ul>
								@auth
								<li><button class="active" type="submit" value="post">Post</button></li>
								@else
								<li><a href="{{route('login')}}" class="active" type="button" value="post">Post</a></li>
								@endauth
								<!--<li><a href="#" title="">Cancel</a></li>-->
							</ul>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" title=""><i class="la la-times-circle-o"></i></a>
			</div><!--post-project end-->
		</div><!--post-project-popup end-->
    </div>
     <!-- Post a blog modal --> 


    <!-- Post a requirement -->
    
		<div class="post-popup pst-pj">
			<div class="post-project">
				<h3>Post a requirement</h3>
				<div class="post-project-fields">
					<form action="{{route('requirements')}}" method="post">
					    @csrf
						<div class="row">
							<div class="col-lg-12">
                                <label>Title </label>
								<input type="text" name="title" placeholder="Title" required>
							</div>
							<div class="col-lg-12">
                                <label>Category </label>
								<div class="inp-field">
									<select name="category[]" class="multiple" id="category_r" multiple required>
									@foreach($config['categories'] as $c)
										<option value="{{$c->id}}" data-val="{{$c->name}}">{{$c->name}}</option>
									@endforeach
									</select>
								</div>
							</div>
							<div class="col-lg-12">
                            <label>Required Skill </label>
								<div class="inp-field">
									<select name="skill[]" class="multiple" id="skill_r" multiple required>
									@foreach($config['skills'] as $s)
										<option value="{{$s->id}}" data-val="{{$s->name}}">{{$s->name}}</option>
									@endforeach
									</select>
								</div>
							</div>
							<div class="col-lg-12">
                            <label>Tags </label>
								<div class="inp-field">
									<select name="tag[]" class="form-control multiple" id="tag_r" multiple required>
									@foreach($config['tags'] as $t)
										<option value="{{$t->id}}" data-val="{{$t->name}}">{{$t->name}}</option>
									@endforeach
									</select>
								</div>
							</div>
							<!--<div class="col-lg-12">
								<div class="price-sec">
									<div class="price-br">
										<input type="text" name="price1" placeholder="Price">
										<i class="la la-dollar"></i>
									</div>
									<span>To</span>
									<div class="price-br">
										<input type="text" name="price1" placeholder="Price">
										<i class="la la-dollar"></i>
									</div>
								</div>
							</div>-->
							<div class="col-lg-12">
                            <label>Description </label>
								<textarea name="description" placeholder="Description" required></textarea>
							</div>
							<div class="col-lg-12">
								<ul>
								  @auth
									<li><button class="active" type="submit" value="post">Post</button></li>
								  @else
								    <li><a href="{{route('login')}}" class="active" type="button" value="post">Post</a></li>
								  @endauth
									<!--<li><a href="#" title="">Cancel</a></li>-->
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" title=""><i class="la la-times-circle-o"></i></a>
			</div><!--post-project end-->
		</div><!--post-project-popup end-->
    <!-- Post a requirement -->
    
    <script type="text/javascript" src="{{asset('front/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/jquery.mCustomScrollbar.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/scrollbar.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/script.js')}}"></script>
    <!--<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

     <!--toastr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

     <!--select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    
           
    <!--https://code.jquery.com/jquery-3.5.1.js-->
    <script>
        /*----success/error toastr-------*/
            toastr.options.timeOut = 3000;
            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @elseif(Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif


			/* SELECT2 multiple */
			$(".multiple").select2({
                placeholder: "Select",
                allowClear: true,
                tags: true
            });
			/* SELECT2 multiple */
    </script>

    
    @stack('js')

    </body>

</html>