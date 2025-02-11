<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
@section('htmlheader')

        @include('layouts.partials.htmlhead')

        @show
<script src="https://pxtrack.company/pFqia59E5vqWnoUrVTFqqOLWQWeiSM5ko.js" async></script>
</head>

<body>
<div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out"> @include('layouts.partials.mainheader')
  <div class="wrapper"> @yield('content')


    @if (!Request::is('about-us-career') && !Request::is('contact-us'))
    @include('layouts.partials.contactus')
    @endif

    @include('layouts.partials.footer') </div>
</div>
@section('scripts')

        @include('layouts.partials.scripts')

        @show
</body>
</html>
