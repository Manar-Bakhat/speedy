@extends('layouts.post')

@section('content')




<br/>
<br/>
<strong><i><h4 class="ms-3">{{$jobber->description}}</h4></i></strong>











<section class="show-page pt-4 mb-5">
  <div class="container">
    <div class="row rows">
      <div class="col-sm-12 col-md-8">
        <div class="job-listing border">
          <div class="company-info">
            <div class="company-banner">
              <div class="banner-overlay"></div>
              @if($jobber->cover_img == 'nocover')
              <img src="{{asset('images/jobbbers/nocover.jpg')}}" class="company-banner-img img-fluid" alt="">
              @else
              <img src="{{asset($jobber->cover_img)}}" class="company-banner-img img-fluid" alt="">
              @endif
              <div class="company-media">
                <img src="{{asset($jobber->photo)}}" alt="" class="company-logo">
                <div>
                  <a href="{{route('account.employer',['employer'=>$jobber])}}" class="secondary-link">
                    <p class="font-weight-bold">{{$jobber->title}}</p>

                    <span style="color: #d9a943  ; font-weight:bold"><i class="fas fa-star" ></i>

                    <?php

                       $sum = 0;


                       foreach($post->useres as $usere){

                           $result = $usere->pivot->stars_rated;
                           $sum = $sum + $result;

                       }
                       if($post->useres->count()>0){

                          $moy = $sum/$post->useres->count();
                          $moyen = round($moy,1);
                          echo $moyen ;
                       }

                       else{
                           echo 0;
                       }

                       ?>










                    <p class="company-category">{{$jobber->category_name}}</p>
                  </a>
                </div>
              </div>
              <div class="company-website">
                <a href="{{$jobber->facebook}}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
              </div>
            </div>

            {{-- company information --}}
            <div class="p-3">
                <p>{!!$post->service_specification!!}</p>
              </div>
            </div>

              <br/>

          {{-- Service information --}}
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
                <p class="font-weight-bold">Post detail</p>
                <table class="table table-hover">
                  <tbody>
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
                        <td width="33%">Social Media</td>
                        <td width="3%">:</td>
                        <td width="64%">{{$jobber->facebook}}</td>
                      </tr>

                  </tbody>
                </table>
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
              <a href="{{route('savedService.store',['id'=>$post->id])}}" class="btn primary-btn"><i class="fas fa-star"></i>Add to favorites</a>
            </div>
          </div>

        </div>
  <br/><br/>
        <div class="card " style="margin-left: 9px ; margin-right: 10px">
            <div class="card-header">
              Contact
            </div>
            <div class="card-body">
                <div class="btn-group w-75">
                    <a href="" class="btn primary-btn1" data-bs-toggle="modal" data-bs-target="#exampleModale">Contact Jobber</a>


 @if (auth()->user()->id != $post->jobber->user_id)

  <!-- Modal -->
  <div class="modal fade" id="exampleModale" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold">Send Message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


            <img src="{{asset($jobber->photo)}}" alt="" class="company-logo" class="card-img-top"  style="height:90px;width:110px;border-radius:50% ;margin-top: 15px">
            <span style="font-weight: bold">{{ $jobber->title }}</span>
            <div style="margin-top: -40px ; margin-left: 120px; color:#448aff">{{ $post->service_title }}</div>
            <br/><div>
                <h6 style="color:#333">Please include :</h6>
                <p>. Describe what you want exactly</p>
                <p>. The time that you need the service</p>
                <p>. Your budget</p>

            </div>
            <br/>


            <form action="{{ route('contact.jobber') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="jobber_id" value="{{ $jobber->id }}">


                    <input id="quillEditor" name="messagee" style="height:100px ; width:466px">
                  </div>

                  <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                  </div>
            </form>








        </div>

      </div>
    </div>
  </div>
                  </div>
            </div>
          </div>


    </div>

    @endif
    <!-- fin -->
    <!-- Modal -->
  <div class="modal fade" id="exampleModale" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold">Send Message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

       <center><img src="{{asset('images/emogi.png')}}" style="width: 430px ; height:330px ; margin-top: -90px "  >
       </center>
       <h5 style="font-weight: bold ; margin-top: -40px ; text-align:center">Sorry! you can send message to yourself</h5>
      <p style="text-align: center">This place is dedicated for your customers so that they send you a message.</p>
       <br/>
       <div class="">
        <center><button type="button" class="btn btn-danger" style=" width: 100px ; height: 40px"  data-bs-dismiss="modal">Close</button></center>
        </div>


    </div>


        </div>

      </div>
    </div>
  </div>
                  </div>
            </div>
          </div>


    </div>
    <!-- fin -->
  </div>
</section>





<!-- make review card -->

<div class="card bg-light">

    <div class="card-body">
      <h5 class="card-title">

       <h4 style="margin-top: -50px ; margin-left:-50px; font-weight:bold">Ratings and Reviews </h4>
       <br/>
       <!---- progress --
       <div class="d-flex" style="margin-left: 190px">
        <div class="text-center">
            <div class="row align-items-center">
                <div class="col-4 text-right" >
                  <span style=" ; color:#000 ; font-weight:bold">5</span>
                </div>
                <div class="col-8">
                  <div class="progress" style="height: 8px;">
                    <div class="progress-bar"  role="progressbar" style="width: 95%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-4 text-right">
                    <span style=" ; color:#000 ; font-weight:bold">4</span>

                </div>
                <div class="col-8">
                  <div class="progress" style="height: 8px;">
                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-4 text-right">
                    <span style=" ; color:#000 ; font-weight:bold">3 </span>

                </div>
                <div class="col-8">
                  <div class="progress" style="height: 8px;">
                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-4 text-right">
                    <span style=" ; color:#000 ; font-weight:bold">2 </span>

                </div>
                <div class="col-8">
                  <div class="progress" style="height: 8px;">
                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-4 text-right">
                    <span style=" ; color:#000 ; font-weight:bold">1</span>

                </div>
                <div class="col-8">
                  <div class="progress" style="height: 8px;">
                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <div style="margin-left: -360px ; margin-top: -100px">
                <span class="display-4 font-weight-bolder">
                -->

            <?php
         /*
            $sum = 0;


            foreach($post->useres as $usere){

                $result = $usere->pivot->stars_rated;
                $sum = $sum + $result;

            }
            if($post->useres->count()>0){

               $moy = $sum/$post->useres->count();
               $moyen = round($moy,1);
               echo $moyen;
            }
            else{
                echo 0;
            }
              */
            ?>


           <!--
                </span><br>
                <span class="text-black-50">out of 5</span>
              </div>

          </div>
         <div class="flex-grow-1">

         </div>
       </div>

      </h5>
    -->



<!-- rating post jobber -->

<!-- Button trigger modal-->
@auth


@if (auth()->user()->exist($post))



        <h6>-> Give your opinion to users</h6>


<button type="button" class="btn btn-primary" style="margin-left: 370px ; margin-top: -50px ; width: 150px ; height: 40px ; background-color:#448aff " data-bs-toggle="modal" data-bs-target="#exampleModal18">
    Edit my Review
  </button>




<!-- Modal -->
<div class="modal fade" id="exampleModal18" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
       <form action="{{ route('rate_update.jobber') }}" method="post">
        @csrf





        <input type="hidden" name="post_id" value="{{ $post->id }}">

        @auth
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        @endauth

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rate {{ $jobber->title }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="rating-css">


                @if ( $rates->stars_rated ==1 )
                <div class="star-icon">
                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating"  id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>



                @endif
                @if ( $rates->stars_rated ==2 )
                <div class="star-icon">
                    <input type="radio" value="1" name="product_rating"  id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" checked id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating"  id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>
                @endif
                @if ( $rates->stars_rated ==3 )
                <div class="star-icon">
                    <input type="radio" value="1" name="product_rating"  id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating" checked id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>
                @endif
                @if ( $rates->stars_rated ==4 )
                <div class="star-icon">
                    <input type="radio" value="1" name="product_rating"  id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating"  id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" checked id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>
                @endif
                @if ( $rates->stars_rated ==5 )
                <div class="star-icon">
                    <input type="radio" value="1" name="product_rating" id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating"  id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" checked id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>
                @endif

            </div>
            <div class="form-floating w-50 pt-4"  >
                <textarea name="message" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px  ; width: 450px">{{ $rates->message }} </textarea></div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Publish</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- fin Modal -->




@else

<h6>-> Give your opinion to users</h6>
<button type="button" class="btn btn-primary" style="margin-left: 370px ; margin-top: -50px ; width: 150px ; height: 40px ; background-color:#448aff " data-bs-toggle="modal" data-bs-target="#exampleModal">
    Make a Review
  </button>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
       <form action="{{ route('rate-jobber') }}" method="post">
        @csrf
        @foreach ($post->useres as $usere)



        @endforeach
        <input type="hidden" name="post_id" value="{{ $post->id }}">

        @auth
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        @endauth

        <div class="modal-header">
          <span style="font-weight: bold"><h5 class="modal-title" id="exampleModalLabel">Make a review for </span><span style="color:#448aff ; font-weight: bold">{{ $jobber->title }}</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="rating-css">


                <div class="star-icon">
                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating"  id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>
            </div>


            <div class="form-floating w-50 pt-4" >
                <textarea name="message" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px  ; width: 450px"></textarea></div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" style="color:" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Publish</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- fin Modal -->


@endif
@endauth

    </div>
  </div>

<!--- fin --->








    <div class="card bg-light">
        @foreach ($post->useres->sortByDesc('id') as $usere)
        <div class="card-body">

          <h6 class="card-text" style="margin-left: -50px"><img src="{{asset('storage/'.$usere->photo)}}" class="img-radius" alt="User-Profile-Image" style="height:40px;width:40px;border-radius: 50% "> {{ $usere->name }} </h6>

        <div class="ratings-css" style="width: 30% ; margin-left: -50px">


            <div class="star-icon">
                @if ($usere->pivot->stars_rated ==1 )
                <input type="radio" name="product_rating"    >
                <label  class="fa fa-star" ></label>
                <input type="radio" name="product_rating"   style="color:#b4afaf" >
                <label  class="fa fa-star"  style="color:#b4afaf"></label>
                <input type="radio" name="product_rating"   style="color:#b4afaf" >
                <label  class="fa fa-star"  style="color:#b4afaf"></label>
                <input type="radio" name="product_rating"   style="color:#b4afaf" >
                <label  class="fa fa-star"  style="color:#b4afaf"></label>
                <input type="radio" name="product_rating"   style="color:#b4afaf" >
                <label  class="fa fa-star"  style="color:#b4afaf"></label>

                @endif
                @if ($usere->pivot->stars_rated ==2 )
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                <input type="radio" name="product_rating" style="color:#b4afaf" >
                <label  class="fa fa-star"style="color:#b4afaf"></label>
                <input type="radio" name="product_rating" style="color:#b4afaf" >
                <label  class="fa fa-star"style="color:#b4afaf"></label>
                <input type="radio" name="product_rating" style="color:#b4afaf" >
                <label  class="fa fa-star"style="color:#b4afaf" style="color:#b4afaf"></label>
                @endif
                @if ($usere->pivot->stars_rated ==3 )
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                <input type="radio" name="product_rating"  style="color:#b4afaf" >
                <label  class="fa fa-star" style="color:#b4afaf"></label>
                <input type="radio" name="product_rating"  style="color:#b4afaf" >
                <label  class="fa fa-star" style="color:#b4afaf"></label>
                @endif
                @if ($usere->pivot->stars_rated ==4 )
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                <input type="radio" name="product_rating" style="color:#b4afaf" >
                <label  class="fa fa-star" style="color:#b4afaf"></label>
                @endif
                @if ($usere->pivot->stars_rated ==5 )
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                <input type="radio" name="product_rating"  >
                <label  class="fa fa-star"></label>
                @endif
                 &nbsp; <span style="color:#333">publish {{ $usere->pivot->created_at }}</span>
            </div>


        </div>

          <p class="card-text"  style="width: 600px ">{{ $usere->pivot->message }}</p>

        </div>
        <hr width="600px">
        @endforeach
      </div>














@endsection
@push('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
  $(document).ready(function(){
    var quill = new Quill('#quillEditor', {
    modules: {
      toolbar: [
          [{ 'font': [] }, { 'size': [] }],
          ['bold', 'italic'],
          [{ list: 'ordered' }, { list: 'bullet' }],
          ['link', 'blockquote', 'code-block', 'image'],
        ]
      },
    placeholder: 'service detail , service period , service price  etc ...',
    theme: 'snow'
    });


    const postBtn = document.querySelector('#postBtn');
    const postForm = document.querySelector('#postForm');
    const service_specification = document.querySelector('#service_specification');

    if(service_specification.value){
      quill.root.innerHTML = service_specification.value;
    }

    postBtn.addEventListener('click',function(e){
      e.preventDefault();
      service_specification.value = quill.root.innerHTML

      postForm.submit();
    })
  })
</script>
@endpush

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

<script src="ckeditor/ckeditor.js"></script>
<script>
    CKIDETOR.replace('message');
</script>

@endpush
