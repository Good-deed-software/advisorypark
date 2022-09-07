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

    </div> 
    
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
    </script>

    
    @stack('js')

    </body>

</html>