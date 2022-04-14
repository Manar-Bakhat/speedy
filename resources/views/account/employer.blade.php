<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@extends('layouts.employer')

@section('content')

  <div class="employer-content border">
    <div class="container-fluid p-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title text-secondary">Latest Vacancies</h4>
        </div>
        <div class="card-body">

            @foreach ( $jobber->posts as $post)
            <div class="row mb-4 hover-shadow pb-2 pt-4">
              <div class="d-none d-md-block col-md-3">
                <div class="border p-2 d-flex align-items-center">
                  <img src="{{asset($jobber->photo)}}" class="img-fluid" alt="">
                </div>
              </div>

            </div>
            {{-- <hr> --}}
            @endforeach

        </div>
      </div>
    </div>
  </div>
@endSection

