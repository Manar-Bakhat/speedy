@extends('layouts.post')

@section('content')


  <section class="home home-page pt-4">
    <div class="slider">
       <div class="slide active" style="background-image: url('images/bg1.png')">
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
       </div>
       <div class="slide" style="background-image: url('images/bg2.png')">
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
       </div>
       <div class="slide" style="background-image: url('images/bg3.png')">
           <div class="container">
               <div class="caption">
                <p><font color="#448aff">Hi everyone!</font></p>
                   <h1>Don't waste time in one click find the perfect jobber for you</h1>
                   <p>All the services you need in one place</p>


                   <form action="{{route('service.index')}}">
                    <div class="px-4">
                    <div class="home-search-bar">
                   <input type="text" name="q" placeholder="Search Service" class="home-search-input form-control">
                   <button type="submit" class="secondary-btn"><i class="fas fa-search"></i></button>
                  </div>
                    </div>
                  </form>


               </div>
           </div>
       </div>
    </div>

    <!---     -->


   <!-- controls  -->
   <div class="controls">
       <div class="prev"><</div>
       <div class="next">></div>
   </div>

   <!-- indicators -->
   <div class="indicator">
</div>

 </section>

  <!-- Affiher les postes service -->


  <!-- fin -->




    <h4 class="card-title" px-2>Recommanded for you</h4>


  <div class="roww row-cols-1 row-cols-md-5 g-4">
    @foreach ($posts as $post)
    @if ($post->jobber)

    <div class="col">
        <a href="{{route('post.show',['service'=>$post->id])}}">
      <div class="carde h-100">

        <img src="{{asset($post->jobber->photo)}}" alt="" class="card-img-top">

        <div class="card-body">
        <p class="card-text primary_bg" >{{$post->service_title}}</p>
    </a>
        <p class="company-name" title="{{$post->jobber->title}}">{{$post->jobber->title}}</p>





          <p class="card-text">{{$post->service_ville}}</p>
          <p class="card-text">{{$post->service_zone}}</p>
          <p class="card-text">{{$post->jobber->phone}}</p>
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
  </div>


  <!--  -->





@endsection

@push('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>

const slides=document.querySelector(".slider").children;
const prev=document.querySelector(".prev");
const next=document.querySelector(".next");
const indicator=document.querySelector(".indicator");
let index=0;


  prev.addEventListener("click",function(){
      prevSlide();
      updateCircleIndicator();
      resetTimer();
  })

  next.addEventListener("click",function(){
     nextSlide();
     updateCircleIndicator();
     resetTimer();

  })

  // create circle indicators
   function circleIndicator(){
       for(let i=0; i< slides.length; i++){
           const div=document.createElement("div");
                 div.innerHTML=i+1;
               div.setAttribute("onclick","indicateSlide(this)")
               div.id=i;
               if(i==0){
                   div.className="active";
               }
              indicator.appendChild(div);
       }
   }
   circleIndicator();

   function indicateSlide(element){
        index=element.id;
        changeSlide();
        updateCircleIndicator();
        resetTimer();
   }

   function updateCircleIndicator(){
       for(let i=0; i<indicator.children.length; i++){
           indicator.children[i].classList.remove("active");
       }
       indicator.children[index].classList.add("active");
   }

  function prevSlide(){
       if(index==0){
           index=slides.length-1;
       }
       else{
           index--;
       }
       changeSlide();
  }

  function nextSlide(){
     if(index==slides.length-1){
         index=0;
     }
     else{
         index++;
     }
     changeSlide();
  }

  function changeSlide(){
             for(let i=0; i<slides.length; i++){
                  slides[i].classList.remove("active");
             }

      slides[index].classList.add("active");
  }

  function resetTimer(){
        // when click to indicator or controls button
        // stop timer
        clearInterval(timer);
        // then started again timer
        timer=setInterval(autoPlay,4000);
  }


 function autoPlay(){
     nextSlide();
     updateCircleIndicator();
 }

 let timer=setInterval(autoPlay,4000);


</script>





@endpush

