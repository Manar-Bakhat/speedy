@extends('layouts.post')

@section('content')

<section class="home-page pt-4">
    <div class="container">
      <form action="{{route('service.index')}}">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="px-4">
              <div class="rounded-text">
                <p>
                    Don't waste time in one click find the perfect jobber for you

                </p>
              </div>
              <div class="home-search-bar">
                  <input type="text" name="q" placeholder="Search Service" class="home-search-input form-control">
                  <button type="submit" class="secondary-btn"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="py-5 px-5 text-center">
              <div class="text-light">
                <h4>
              </h4>
              </div>
            </div>
            </div>
        </div>
      </form>
    </div>
  </section>





<section class="jobs-section py-5">
  <div class="container-fluid px-0">
    <div class="row ">
      <div class="col-sm-12 col-md-7 ml-auto">
        <div class="card">
          <div class="card-header">
            <p class="card-title font-weight-bold"><i class="fas fa-briefcase"></i> Top Service</p>
          </div>
          <div class="card-body">
            <div class="top-jobs" >
              <div class="row">

                @foreach ($posts as $post)
                @if ($post->jobber)
                <div class="col-sm-6 col-md-6 col-lg-4 col-sm-6 mb-sm-3">
                  <a href="{{route('post.show',['service'=>$post->id])}}">
                  <div class="job-item border row h-100">
                    <div class="col-xs-3 col-sm-4 col-md-5">
                      <img src="{{asset($post->jobber->photo)}}" alt="job listings" class="img-fluid p-2">
                    </div>
                    <div class="job-description col-xs-9 col-sm-8 col-md-7">
                    <p class="company-name" title="{{$post->jobber->title}}">{{$post->jobber->title}}</p>
                      <ul class="company-listings">
                        <li>•{{substr($post->service_title, 0, 27)}}</li>
                    </ul>
                    </div>
                  </div>
                  </a>
                </div>
                @endif
              @endforeach


               </div>
             </div>
            </div>
            <a class="btn secondary-btn" href="{{route('service.index')}}">Show all jobs</a>
          </div>
        </div>



          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection


