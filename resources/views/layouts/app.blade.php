<?php 
$page_title = "";
$slug = "";
if(!empty($data)){
    if(!empty($data['page_management'])){
        if($data['page_management']['page_title'] != ""){
            $page_title = $data['page_management']['page_title']; 
        }

        if($data['page_management']['slug'] != ""){
            $slug = $data['page_management']['slug']; 
        }

    }
}
?>
<!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>{{ config('app.name', 'Construction Portal') }} - {{$page_title}}</title>
        <meta name="description" content="" />
        <meta name="Author" content="Ghulam Rasool [imgrasool@gmail.com]" />

        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

        <!-- WEB FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

        <!-- CORE CSS -->
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- THEME CSS -->
        <link href="{{ asset('assets/css/essentials.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/layout.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/toastr/toastr.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/color_scheme/green.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />


        <!-- Call Jquery -->
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery-2.1.4.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/toastr/toastr.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins\sweetAlert\sweetalert.min.js')}}"></script>


        @yield('pagelevelstyle')
    </head>
    <!--
        .boxed = boxed version
    -->
    <body>


        <!-- WRAPPER -->
        <div id="wrapper" class="clearfix">

            <!-- ASIDE 
            Keep it outside of #wrapper (responsive purpose)
        -->
        @include('layouts.sidebar')
        <!-- /ASIDE -->

        <!-- HEADER -->
        @include('layouts.header')
        <!-- /HEADER -->

        <!-- MIDDLE -->
<!--         <section id="middle">


            <header id="page-header">
                <h1>Upload New Research</h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('research.index') }}">Research</a></li>
                    <li class="active">Upload</li>
                </ol>
            </header> -->


            <section id="middle">

              <!-- page title -->
              <header id="page-header">
                <h1>

                    <?php 
                    echo $page_title;
                ?></h1>
                <ol class="breadcrumb">
                    <li><a href="{{url('/').'/'.\Request::segment(1)}}">{{ucfirst(\Request::segment(1));}}</a></li>
                    @if(!empty($slug))
                    <li class="active">{{ucfirst($slug);}}</li>
                    @endif


                    
                </ol>
            </header>
            <!-- /page title -->

            @yield('content')
            <!-- /MIDDLE -->
        </section>

    </div>




    <!-- JAVASCRIPT FILES -->
    <!--     <script type="text/javascript">var plugin_path = 'assets/plugins/';</script> -->
    <script type="text/javascript">var plugin_path = "{{ URL::asset('assets/plugins/') }}/";</script>
    <!-- <script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery-2.1.4.min.js')}}"></script> -->
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- STYLESWITCHER - REMOVE -->
    <!-- <script async type="text/javascript" src="{{ asset('assets/plugins/styleswitcher/styleswitcher.js') }}"></script> -->
    <script>
        
        // $('.alert').delay(5000).fadeOut('slow');
    </script>
    @yield('pagelevelscript')
</body>
</html>