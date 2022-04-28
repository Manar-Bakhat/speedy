<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@extends('layouts.employer')

@section('content')


        <div class="roww row-cols-1 row-cols-md-2 g-4">
            @foreach ( $jobber->posts as $post)

            <div class="col">
                <a href="{{route('post.show',['service'=>$post->id])}}">
              <div class="carde h-100">

                <img src="{{asset($jobber->photo)}}" class="card-img-top" alt="">


                <div class="card-body">
                <p class="card-text primary_bg" ><font color="#448aff"><strong>{{$post->service_title}}</strong></font></p>
            </a>
            <strong><p class="company-name " title="{{$post->jobber->title}}">{{$post->jobber->title}}</p></strong>





                <strong><p class="card-text ms-2"><i class="fa-solid fa-location-dot"></i>&nbsp;{{$post->service_ville}}</p></strong>
                <strong><p class="card-text ms-2"><i class="fa-solid fa-location-arrow"></i>&nbsp;{{$post->service_zone}}</p></strong>
                <strong><p class="card-text ms-2"><i class="fa-solid fa-phone"></i>&nbsp;{{$post->jobber->phone}}</p></strong>
                <p class="card-text">{{$post->jobber->description}}</p>
                   </div>

                <div class="card-footer">
                  <small class="text-muted">
                    <a href="{{route('savedService.store',['id'=>$post->id])}}" class=""><i class="fas fa-star"></i> Save service</a>

                  </small>
                </div>
              </div>
            </div>


            @endforeach

    </div>
  </div>

  @if($jobber)
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-body test text-center">
                                        <img src="{{asset($jobber->photo)}}" width="100px" class="img-fluid border p-2" alt="">
                                        <h5>{{$jobber->title}}</h5>
                                        <small>{{$jobber->category_name}}</small>
                                      <a class="d-block" href="{{$jobber->facebook}}"><i class="fa-brands fa-facebook"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif



@endSection

