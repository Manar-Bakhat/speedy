@extends('layouts.post')
@section('content')


  <!-- Affiher les postes service -->


  <!-- fin -->

@include("partials.search")

<!-- les listes de postes --->
  <div class="roww row-cols-1 row-cols-md-5 g-4">
      Search By

    @if ($count == 0)
        <div class="h5">Not found</div>


    @else

        @foreach ($posts as $post)
        @if ($post->jobber)

        <div class="col">
            <div class="h5">{{ $count }} post find</div>
            <a href="{{route('post.show',['service'=>$post->id])}}">
          <div class="carde  " style="height: 75vh;">

            <img src="{{asset($post->jobber->photo)}}" alt="" class="card-img-top">

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

        @endif
        @endforeach



    @endif
  </div>


  <!--  -->

  <div class="card  mb-2" style=" max-width: 5000px; width:1000px ; margin-left: 170px" >
    @foreach ($posts as $post)

    <div class="row g-0">
      <div class="col-md-4">
        <img src="" class="" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
    @endforeach
  </div>












    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>





@endsection






