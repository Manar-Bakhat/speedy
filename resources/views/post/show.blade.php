@extends('layouts.post')

@section('content')
<p>{{$jobber->description}}</p>
<section class="show-page pt-4 mb-5">
  <div class="container">
    <div class="row rows">
      <div class="col-sm-12 col-md-8">
        <div class="job-listing border">
          <div class="company-info">
            <div class="company-banner">
              <div class="banner-overlay"></div>
              @if($jobber->cover_img == 'nocover')
              <img src="{{asset('images/companies/nocover.jpg')}}" class="company-banner-img img-fluid" alt="">
              @else
              <img src="{{asset($jobber->cover_img)}}" class="company-banner-img img-fluid" alt="">
              @endif
              <div class="company-media">
                <img src="{{asset($jobber->logo)}}" alt="" class="company-logo">
                <div>
                  <a href="{{route('account.employer',['employer'=>$jobber])}}" class="secondary-link">
                    <p class="font-weight-bold">{{$jobber->title}}</p>
                    <p class="company-category">{{$jobber->category_name}}</p>
                  </a>
                </div>
              </div>
              <div class="company-website">
                <a href="{{$jobber->facebook}}" target="_blank"><i class="fas fa-globe"></i></a>
              </div>
            </div>

            {{-- company information --}}
            <div class="p-3">
              <p>{{$post->service_specification}}</p>
            </div>
          </div>

          {{-- job information --}}
          <div class="job-info">
            <div class="job-hdr p-3">
              <p class="job-title">{{$post->service_title}}</p>
              <div class="">
                <p class="job-views">
                  <span class="text-success">Views: {{$post->views}} </span>
                 </p>
              </div>
            </div>
            <div class="job-bdy p-3 my-3">
              <div class="job-level-description">
                <p class="font-weight-bold">Basic job level description</p>
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td width="33%">Service Category</td>
                      <td width="3%">:</td>
                      <td width="64%"><a href="/jobs">{{$jobber->category_name}}</a></td>
                    </tr>
                    <tr>
                      <td width="33%">Service City</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$post->service_ville}}</td>
                    </tr>
                    <tr>
                      <td width="33%">Service Zoned</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$post->service_zone}}</td>
                    </tr>


                  </tbody>
                </table>
              </div>
              <div class="job-level-description">
                <p class="font-weight-bold">Jobber Information</p>
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td width="33%">Age</td>
                      <td width="3%">:</td>
                      <td width="64%"><a href="/jobs"> {{$jobber->age}}</a></td>
                    </tr>
                    <tr>
                      <td width="33%">Phone</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$jobber->phone}}</td>
                    </tr>
                    <tr>
                        <td width="33%">Facebook</td>
                        <td width="3%">:</td>
                        <td width="64%">{{$jobber->facebook}}</td>
                      </tr>

                  </tbody>
                </table>
              </div>
              <div class="job-level-description">
                {{-- <p class="font-weight-bold">More Specifications</p> --}}
                <p class="py-2">{!!$post->service_specification!!}</p>
              </div>
              <br>
              <hr>
              <div class="d-flex justify-content-between">



                <div class="social-links">
                  <a href="https://www.facebook.com"  target="_blank" class="btn btn-primary"><i class="fab fa-facebook"></i></a>
                  <a href="https://www.twitter.com" target="_blank"  class="btn btn-primary"><i class="fab fa-twitter"></i></a>
                  <a href="https://www.linkedin.com"  target="_blank" class="btn btn-primary"><i class="fab fa-linkedin"></i></a>
                  <a href="https://www.gmail.com" target="_blank"  class="btn btn-primary"><i class="fas fa-envelope"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4">
        <div class="card d-none d-md-block mb-2">
          <div class="card-header">
            Service Action
          </div>
          <div class="card-body">
            <div class="btn-group w-75">
              <a href="{{route('savedService.store',['id'=>$post->id])}}" class="btn primary-btn"><i class="fas fa-star"></i> Save service</a>
            </div>
          </div>
        </div>

        <div class="card ">
            <div class="card-header">
              Similar Services
            </div>
            <div class="card-body">
              <div class="similar-jobs">
                @foreach ($similarServices as $service)
                @if($similarServices)
                  <div class="job-item border-bottom row">
                    <div class="col-4">
                      <img src="{{asset($service->jobber->photo)}}" class="company-logo" alt="">
                    </div>
                    <div class="job-desc col-8">
                      <a href="{{route('post.show',['service'=>$post])}}" class="job-category text-muted font-weight-bold">
                        <p class="text-muted h6">{{$service->service_title}}</p>
                        <p class="small">{{$service->jobber->title}}</p>
                        <p class="font-weight-normal small text-danger">Deadline: {{date('d',$service->remainingDays())}} days</p>
                      </a>
                    </div>
                  </div>
                  @else
                  <div class="card">
                    <div class="card-header">
                      <p>No similar services</p>
                    </div>
                  </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>


    </div>
  </div>
</section>
<div class="container ">
    @auth
    <form action="{{route('comment-user' , $post->id) }}" method="post">
        @csrf
<div class="form-floating w-50">
    <textarea name="message" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
    <button type="submit" class="shadow p-2 w-25 mb-2 bg-primary text-light rounded fw-bold">Post a comment</button>
</div>
</form>
@endauth
@guest
<form action="#" method="post">
    @csrf
<div class="form-floating w-50 pt-4" >
<textarea name="message" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
<a onClick = "history.go(0)" type="reset" href="/login" class="shadow p-2 w-25 mb-2 bg-primary text-light rounded fw-bold">Post a comment</a>

</div>
</form>

@endguest
  @foreach ($post->comments as $comment )
  <img src="{{asset('storage/'.$comment->user->photo)}}" class="img-radius" alt="User-Profile-Image" style="height:80px;width:100px;border:solid 5px">
     {{ $comment->user->name }}
     <br/>
     <br/>
     {{ $comment->message }}
     <p class="card-text">publish {{ $comment->created_at }} </p>
     <br/><br/>
    <hr>


  @endforeach
  <hr>
</div>





@endsection

@push('css')
<style>
  .company-banner {
    min-height: 20vh;
    position: relative;
    overflow: hidden;
  }

  .company-banner-img {
    width: 100%;
    height: auto;
    overflow: hidden;
  }

  .banner-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, .3));
    width: 100%;
    height: 200px;
  }

  .company-website {
    position: absolute;
    right: 20px;
    bottom: 20px;
    color: white;
  }

  .company-media {
    position: absolute;
    display: flex;
    align-items: center;
    left: 2rem;
    bottom: 1rem;
    color: #333;
    padding-right: 2rem;
    background-color:rgba(255,255,255,.8);
  }

  .company-logo {
    max-width: 100px;
    height: auto;
    margin-right: 1rem;
    padding: 1rem;
    background-color: white;
  }

  .company-category {
    font-size: 1.3rem;
  }

  .company-link:hover {
    color: #ddd;
  }

  .job-title {
    font-size: 1.3rem;
    font-weight: bold;
  }

  .job-hdr {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: linear-gradient(to right, #e1edf7, #EDF2F7)
  }

  .job-item{
    margin-bottom: .5rem;
    padding:.5rem 0;
  }
  .job-item:hover {
    background-color:#eee;
  }

</style>
@endpush

@push('js')

@endpush
