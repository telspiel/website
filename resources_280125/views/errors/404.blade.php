@extends('layouts.app')

@section("htmlheader_title", "Page Not found")

@section("htmlheader_desc", "Page Not found")

@section("htmlheader_keyword", "Page Not found")

@section('content')
    <div class="container text-center">
        <h1>404</h1>
        <h2>Oops! Page Not Found.</h2>
        <p>Sorry, but the page you were looking for doesn't exist.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>
    </div>
@endsection
