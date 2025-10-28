@php
$configData = Helper::appClasses();
$isFront = true;
@endphp

@section('layoutContent')

@extends('content.layouts.layoutMaster' )

@include('content.layouts.sections.navbar.navbar-front')

<!-- Sections:Start -->
@yield('content')
<!-- / Sections:End -->

@include('content.layouts.sections.footer.footer-front')
@endsection
