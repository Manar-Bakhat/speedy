@extends('layouts.post')

@section('content')



 <!-- home section starts  -->


<section class="homes" id="homes">

    <div class="content">
        <p style="margin-left: 350px ; margin-top: -90px ;  font-size: 40px" ><font color="#448aff">Have a global impact</font></p>
        <strong><p style="margin-left: 350px ; font-size: 35px ; color:black">Work Your Way
            You bring the skill <br/> We'll make earning easy.</p>
        </strong>




    <form action="{{route('account.becomeEmployer')}}" method="POST">
        @csrf
        <div class="form-group">
          <div class="d-flex">
            <button type="submit" class="btn primary-outline-btn" style="margin-left: 170px">Become Jobber</button>
          </div>
        </div>
      </form>
    </div>


    <div class="image" style="margin-right: 300px">
        <img src="{{asset('images/bg-jobber.png')}}" alt="">
    </div>

</section>


















<!-- home section ends -->
<br/><br/>

<center><strong><h1>There are so many reasons to get started</h1></strong></center>
<br/>
  <div class="roww row-cols-1 row-cols-md-3 g-4 " style="margin-left: 50px; margin-right: 50px">

    <div class="col">
      <div class="carde" style="background-color: #f8f9fa ; border: none">
        <center><img src="{{asset('images/i1.png')}}" class="card-img-top" alt="..." style="width: 80px ; height: 60px" >
        </center>
         <div class="card-body">

          <p class="card-text" style="margin-left: 90px">Login if you're not</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="carde" style="background-color: #f8f9fa ; border: none">
        <center><img src="{{asset('images/i2.png')}}" class="card-img-top" alt="..." style="width: 80px ; height: 60px" >
        </center>
        <div class="card-body">

          <p class="card-text">Click on the "Become a Jobber" button to access the Jobber Dashboard</div>
      </div>
    </div>
    <div class="col">
      <div class="carde" style="background-color: #f8f9fa ; border: none">
        <center><img src="{{asset('images/i3.png')}}" class="card-img-top" alt="..." style="width: 80px ; height: 60px" >
        </center>
        <div class="card-body">

          <p class="card-text">Congratulations you have become a jobber, now complete your jobber profile and then you can post your services and communicate with people </div>
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










