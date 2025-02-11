    <meta charset="UTF-8">



    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="assets/vendors/ticker/ticker.css" rel="stylesheet"/>

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

 <title>@hasSection('htmlheader_title')@yield('htmlheader_title')@endif</title>
 
     <meta name="description" content="@hasSection('htmlheader_desc')@yield('htmlheader_desc')@endif">



    <meta name="keyword" content="@hasSection('htmlheader_keyword')@yield('htmlheader_keyword')@endif">



    <?php



                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



                



                             ?>



<link rel="canonical" href="{{$actual_link}}">



    <meta property="og:image" content="@hasSection('htmlheader_image')@yield('htmlheader_image')@endif" />



<meta property="og:image:secure_url" content="@hasSection('htmlheader_image')@yield('htmlheader_image')@endif" />







<meta property="og:image:width" content="435" />



<meta property="og:image:height" content="267" />



<meta property="og:url" content="{{$actual_link}}" />



<meta property="og:type" content="website" />



<meta property="og:locale" content="en_IN" />



<meta property="og:see_also" content="{{$actual_link}}" />



<meta name="twitter:url" content="{{$actual_link}}" />



<meta name="twitter:card" content="Summary" />



<meta name="twitter:site" content="@cloudbrik" />



<meta property="og:title" content="@hasSection('htmlheader_title')@yield('htmlheader_title')@endif"><meta property="og:description" content="@hasSection('htmlheader_desc')@yield('htmlheader_desc')@endif"><meta name="twitter:title" content="@hasSection('htmlheader_title')@yield('htmlheader_title')@endif"><meta name="twitter:description" content="@hasSection('htmlheader_desc')@yield('htmlheader_desc')@endif">


<link rel="stylesheet" href="{{asset('assets/vendors/swiper/swiper-bundle.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/main.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendors/select2/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/select2/select2-bootstrap-5-theme.min.css')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"/>
<style>
    label.error{color: red;}
</style>