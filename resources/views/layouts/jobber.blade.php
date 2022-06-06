@extends('layouts.app')

@section('layout-holder')
  @include('inc.jobber-nav')
  @yield('content')

  @include('inc.footer')
@endsection
