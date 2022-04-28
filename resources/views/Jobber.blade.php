@extends('layouts.post')
@section('content')

<section class="home" id="home">

    <div class="container">
        <div class="caption">
         <p><font color="#448aff">Hi everyone!</font></p>
            <h1>Don't waste time in one click find the perfect jobber for you</h1>
            <p>All the services you need in one place</p>

            <form action="{{route('service.index')}}">
             <div class="home-search-bar">
                 <input type="text" name="q" placeholder="Search Service" class="home-search-input form-control">
                 <button type="submit" class="secondary-btn"><i class="fas fa-search"></i></button>
             </div>
         </form>
        </div>
    </div>

    <div class="image">
        <img src="{{asset('images/img-home.png')}}" alt="">
    </div>

</section>

            <form action="{{route('account.becomeEmployer')}}" method="POST">
              @csrf
              <div class="form-group">
                <div class="d-flex">
                  <button type="submit" class="btn primary-outline-btn">Become Jobber</button>
                </div>
              </div>
            </form>




@endsection
