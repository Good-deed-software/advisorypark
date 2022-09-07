<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{env('APP_NAME')}} - Admin</title>
        <!-- plugins:css -->
        <!--<link rel="stylesheet" href="{{asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.7.95/css/materialdesignicons.min.css"  />
        <link rel="stylesheet" href="{{asset('admin/assets/vendors/css/vendor.bundle.base.css')}}">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
        <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
        <!-- End layout styles -->
        <!--<link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}" />-->
    </head>

    <body>
        <div class="container-scroller">
            
            @include('admin.includes.header') 
           <!-- PAGE CONTAINER-->
           
          <div class="container-fluid page-body-wrapper">
            @include('admin.includes.sidebar')
            
            @yield('content')
                       
          </div>
            <!-- END PAGE CONTAINER-->
        </div>
         <!-- plugins:js -->
        <script src="{{asset('admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{asset('admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{asset('admin/assets/js/off-canvas.js')}}"></script>
        <script src="{{asset('admin/assets/js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('admin/assets/js/misc.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
        <script src="{{asset('admin/assets/js/todolist.js')}}"></script>
        <!-- End custom js for this page -->
        
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        @stack('js')
    </body>
</html>
