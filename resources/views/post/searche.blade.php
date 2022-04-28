@extends('layouts.post')

@section('content')



<br/>
<h5><a href="{{url('http://127.0.0.1:8000/search?q=#/')}}" class="btn-retour" style="margin-left: 50px ; color:#448aff">< Return </a>
</h5>


  <!-- Search Filter -->

<section class="searche">
    <div class="containerr" style="background-color: #fff ; height=300px ">

<form action="{{ route('service-searche') }}" class="d-flex mt-2" style="margin-top:10px">
        @csrf
        <div class="form-group col-md-4" style="margin-left: -180px">
            <p class="texte" style="margin-left: 0px" ><i class="fa-solid fa-building"></i>&nbsp;Service</p>
         <input name="qq" class="form-control"   placeholder="Type to search service..." value="{{ request()->qq ? request()->qq : '' }}">
        </div>

            <div class="form-group col-md-4" style="margin-left: -90px">
         <p class="texte" ><i class="fa-solid fa-city"></i>&nbsp;City</p>
         <select name="q2" class="form-control form"  required>
           <option value="Agadir">Agadir </option>
           <option value="Beni Mellal">Beni Mellal</option>
           <option value="Casablanca">Casablanca</option>
           <option value="Chefchaouen">Chefchaouen</option>
           <option value="Essaouira">Essaouira</option>
           <option value="Fès">Fès</option>
           <option value="Ifrane">Ifrane</option>
           <option value="Kénitra">Kénitra</option>
           <option value="Khénifra">Khénifra</option>
           <option value="Khouribga">Khouribga</option>
           <option value="Ksar El Kébir">Ksar El Kébir</option>
           <option value="Marrakech">Marrakech</option>
           <option value="Meknès">Meknès</option>
           <option value="Nador">Nador</option>
           <option value="Ouezzane">Ouezzane</option>
           <option value="Rabat">Rabat</option>
           <option value="Safi">Safi</option>
           <option value="Salé">Salé</option>
           <option value="Tanger">Tanger</option>
           <option value="Tétouan">Tétouan</option>
           <option value="Tanger">Tanger</option>
           <var></var></var></var>
         </select>
        </div>
        <div class="form-group col-md-4" style="margin-left: 90px">
            <p class="texte" style="margin-left: 0px" ><i class="fa-solid fa-location-dot"></i>&nbsp;Zoned</p>
            <input name="q3" class="form-control"   placeholder="Type to search service zoned" value="{{ request()->q3 ? request()->q3 : '' }}">
        </div>

         <div class="" style="margin-top: 20px ; margin-left: 0px ">
  <button type="submit" class="btn text-white " style="margin-top:10px; width: 80px ;height: 40px; background-color: #448aff ; border: 2px solid #448aff">Search</button>
         </div>
     </form>
    </div>
    </section>


  <!--  -->












    @if ($count == 0)
    <div class="card text-center" style="margin-left: 240px ; width: 800px ; height: 200px">
        <div class="card-body">
          <h5 class="card-title">Oops !</h5>
          <p class="card-text">We're sorry, we couldn't find any results for your search.</p>
          <br/>
          <a href="http://127.0.0.1:8000/search?q=#/" class="btn btn-primary">Go To Retry</a>
        </div>

      </div>


    @else



  <div class="roww row-cols-1 row-cols-md-4 g-4" style="margin-left: 50px; margin-right: 50px">

    @if ($count == 0)
        <div class="h5">Not found</div>


    @else

        @foreach ($posts as $post)
        @if ($post->jobber)

        <div class="col">
        <br/>
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
                <a href="{{route('savedService.store',['id'=>$post->id])}}" class=""><i class="fa-solid fa-heart"></i>&nbsp;Add To Favorite</a>

              </small>
            </div>

          </div>
        </div>


        @endif
        @endforeach


  <strong><h4 class="" style="margin-left: -300px ;margin-buttom: 10px;" >{{ $count }} post find</h4>
  </strong>



    @endif

  </div>


    @endif



  <!-- <i class="fas fa-star"></i>
 -->











    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>





@endsection






