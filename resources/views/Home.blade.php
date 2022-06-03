@extends('layouts.post')

@section('content')

<!---
  <section class="home home-page pt-4">
    <div class="slider">
       <div class="slide active" style="background-image: url('images/5.png')">
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
       <div class="slide" style="background-image: url('images/6.png')">
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
       <div class="slide" style="background-image: url('images/8.png')">
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
 -->


   <!-- controls
   <div class="controls">
       <div class="prev"><</div>
       <div class="next">></div>
   </div>


   <div class="indicator">
</div>

 </section>
 --->

  <!-- Affiher les postes service -->


  <!-- fin




    <h4 class="card-title  ms-2">Recommanded for you</h4>


  <div class="roww row-cols-1 row-cols-md-5 g-4">
    @foreach ($posts as $post)
    @if ($post->jobber)

    <div class="col">
        <a href="{{route('post.show',['service'=>$post->id])}}">
      <div class="carde  " style="height: 75vh;">
        <br/>
        <center><img src="{{asset($post->jobber->photo)}}" alt="" class="card-img-top" class="img-radius"  style="height:120px;width:150px;border-radius: 100%">
        </center>
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
  </div>


    -->
 <!-- fin -->

 <!-- home section starts  -->


<section class="home" id="home">

    <div class="content">
        <p style="margin-left: 40px ; margin-top: 0px" ><font color="#448aff">Hi everyone!</font></p>
        <strong><p style="margin-left: 40px ; font-size: 35px ; color:black">Don't waste time in one click find the perfect jobber for you</p>
        </strong>
        <h6 style="margin-left: 40px">All the services you need in one place</h6>



    </div>

    <div class="image">
        <img src="{{asset('images/img-home.png')}}" alt="">
    </div>

</section>


















<!-- home section ends -->
<br/><br/>

<center><strong><h1>Here is how it works</h1></strong></center>
<br/>
  <div class="roww row-cols-1 row-cols-md-3 g-4 " style="margin-left: 50px; margin-right: 50px">

    <div class="col">
      <div class="carde" style="background-color: #f8f9fa ; border: none">
        <center><img src="{{asset('images/icon2.png')}}" class="card-img-top" alt="..." style="width: 80px ; height: 60px" >
        </center>
         <div class="card-body">

          <p class="card-text">Locate a jobber using our search directory</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="carde" style="background-color: #f8f9fa ; border: none">
        <center><img src="{{asset('images/icon3.png')}}" class="card-img-top" alt="..." style="width: 80px ; height: 60px" >
        </center>
        <div class="card-body">

          <p class="card-text">Communicate with the best jobber for you </div>
      </div>
    </div>
    <div class="col">
      <div class="carde" style="background-color: #f8f9fa ; border: none">
        <center><img src="{{asset('images/icon4.png')}}" class="card-img-top" alt="..." style="width: 80px ; height: 60px" >
        </center>
        <div class="card-body">

          <p class="card-text">Get started and leave your notes on the jobber profile </div>
      </div>
    </div>

  </div>



<div class="section">
    <div class="containerres">
        <div class="content-section">
            <div class="title">
                <h1>About Us</h1>
            </div>
            <div class="content">
                <h3><font color="#d932c8">Speedy.ma</font>
                     allows all jobbers from various disciplines ( car wash , handy man , maid , chef , driver ...) to place their advertisements for free, also it facilitates the dissemination of their information on
 On  the widest , the other hand, it helps the user of the application to find a jobber without wasting time in purely.
                    </p>
            </div>
            <div class="social">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="image-section">
            <img src="{{asset('images/home-img.png')}}" class="" alt="..." style="width: ; height: " >

        </div>
    </div>
</div>













       <!-- Accordion   --->
 <h1>FAQ</h1>

 <div class="accordion">
   <div class="accordion-item">
     <div class="accordion-item-header">
        I can't insert my ad
     </div>
     <div class="accordion-item-body">
       <div class="accordion-item-body-content">
        If you encounter difficulties when inserting your advertisement, make sure that you have filled in the mandatory fields of the forms, normally if you leave an empty box a message in red is displayed "Please fill in this field".

         </div>
     </div>
   </div>
   <div class="accordion-item">
     <div class="accordion-item-header">
        The modification of my ad does not apply
     </div>
     <div class="accordion-item-body">
       <div class="accordion-item-body-content">
        If you have modified your ad and the modification has not been taken into account, check that you have followed all the steps of the modification</div>
     </div>
   </div>

   <div class="accordion-item">
     <div class="accordion-item-header">
        How to search ?
     </div>
     <div class="accordion-item-body">
       <div class="accordion-item-body-content">
        If you are looking for a property on Speedy please proceed as follows:
        <br/>
        1- Click on the following link: http://www.speedy.ma/fr/maroc/
        <br/>
        2- Select the Service.
        <br/>
        3- Select the city.
        <br/>
        4-Select the Zoned.
        <br/>
        4- Click on search.  </div>
     </div>
   </div>

 </div>
















    <!-- Footer End -->

    <!-- Scroll to Bottom
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>
-->
    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>





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

<script>
    const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

accordionItemHeaders.forEach(accordionItemHeader => {
  accordionItemHeader.addEventListener("click", event => {

    // Uncomment in case you only want to allow for the display of only one collapsed item at a time!

    // const currentlyActiveAccordionItemHeader = document.querySelector(".accordion-item-header.active");
    // if(currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader!==accordionItemHeader) {
    //   currentlyActiveAccordionItemHeader.classList.toggle("active");
    //   currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
    // }

    accordionItemHeader.classList.toggle("active");
    const accordionItemBody = accordionItemHeader.nextElementSibling;
    if(accordionItemHeader.classList.contains("active")) {
      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
    }
    else {
      accordionItemBody.style.maxHeight = 0;
    }

  });
});
</script>


@endpush




