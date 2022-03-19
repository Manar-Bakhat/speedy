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




@endsection

