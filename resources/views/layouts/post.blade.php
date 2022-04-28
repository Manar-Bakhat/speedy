@extends('layouts.app')

@section('layout-holder')
  @include('inc.nav-home')
  @yield('content')

  @include('inc.footer')
@endsection
