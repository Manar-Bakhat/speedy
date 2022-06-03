<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@extends('layouts.employer')

@section('content')


        <div class="roww row-cols-1 row-cols-md-2 g-4" style="width: 600px">
            @foreach ( $jobber->posts as $post)




            <div class="col" style="width: px">
                <a href="{{route('post.show',['service'=>$post->id])}}">
              <div class="carde h-100">


                <Center> <img src="{{asset($post->jobber->photo)}}" alt="" class="card-img-top"  style="height:90px;width:110px;border-radius:50% ;margin-top: 15px">
                </Center>




                <div class="card-body">
                <p class="card-text primary_bg" ><font color="#448aff"><strong>{{$post->service_title}}</strong></font></p>
            </a>
            <strong><p class="company-name " title="{{$post->jobber->title}}">{{$post->jobber->title}}</p></strong>





                <strong><p class="card-text ms-2"><i class="fa-solid fa-location-dot"></i>&nbsp;{{$post->service_ville}}</p></strong>
                <strong><p class="card-text ms-2"><i class="fa-solid fa-location-arrow"></i>&nbsp;{{$post->service_zone}}</p></strong>
                <strong><p class="card-text ms-2"><i class="fa-solid fa-phone"></i>&nbsp;{{$post->jobber->phone}}</p></strong>
                <p class="card-text">{{$post->jobber->description}}</p>
                   </div>
    <i class="fa-solid fa-trash" style="color: red; font-size:20px; margin-left: 220px " data-bs-toggle="modal" data-bs-target="#manar{{ $loop->index }}" ></i>

<!-- Modal -->
  <div class="modal fade" id="manar{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Warning <i class="fa-solid fa-triangle-exclamation" style="color: red"></i> </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <h6 style="">Are you sure do you want to <span style="color:red">delete</span> this message of <span style="color: #448aff">{{ $post->service_title }}</span></h6>

        </div>
        <form action="{{ route('delete-post') }}" method="post">
            @csrf
            @method('delete')
            <input type="text" name="post" value="{{ $post->id }}" style="visibility: hidden">
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Yes</button>
        </div>
        </form>
      </div>
    </div>
  </div><br/>

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



@endSection

