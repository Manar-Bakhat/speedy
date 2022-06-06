@extends('layouts.account')

@section('content')
<div style="background-image: url('../images/default_bg.jpg'); height:600px">
<div class="account-layout  border">
    <div class="account-hdr text-dark border" style="background-color: #448aff">
      Messages
    </div>

       <!-- Accordion   --->



 <div class="accordion">
    @foreach ($posts as $post)



        @foreach ($post->useress->sortByDesc('id') as $useress)

        @if ($useress->id == auth()->user()->id)




    <div class="accordion-item">
        <div class="accordion-item-header" style="height: 70px">
           <div class="card mb-3 bg-transparent" style="max-width: 540px; margin-left: 180px; margin-top: 10px ">
               <div class="row g-0">
                 <div class="col-md-2" style="margin-left: -90px">
                   <img src="{{asset('storage/'.$useress->photo)}}" class="img-fluid rounded-start" alt="..."
                   style="height:40px;width:450px;border-radius: 50% ; margin-top: 28px ">
                 </div>
                 <div class="col-md-10">
                   <div class="card-body">

                     <h6 class="card-title" style="margin-left: -60px; margin-top: 10px"><span style="font-weight:bold">Me</span> &nbsp;  <i class="fa-solid fa-trash" style="color: red; font-size:14px" data-bs-toggle="modal" data-bs-target="#manar{{ $loop->index }}"></i>
                        &nbsp;<a href="{{ route('post.show',$post->id) }}"><i class="fa-solid fa-arrow-trend-up"></i></a>

  <!-- Modal -->
  <div class="modal fade" id="manar{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Warning <i class="fa-solid fa-triangle-exclamation" style="color: red"></i></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <h6 style="">Are you sure do you want to <span style="color:red">delete</span> this message of <span style="color: #448aff">{{ $useress->name }}</span></h6>

        </div>
        <form action="{{ route('delete-message',$useress->pivot->id) }}" method="post">
            @csrf
            @method('delete')
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Yes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
                        <br/><span class="text-muted">&nbsp;{{ $useress->pivot->created_at }}</span></h6>

                     </div>
                 </div>
               </div>
             </div>
        </div>
        <div class="accordion-item-body">
          <div class="accordion-item-body-content">

             <div class="card mb-3" style="max-width: 540px; margin-left: 580px">
                <div class="row g-0">
                    <div class="col-md-10" style="margin-left:-85px; box-shadow:40px">
                        <div class="card-bodyy" style="background-color: #448aff ;"  >
                          <h6 class="card-title" style="margin-left:-35px ; font-weight:bold">Me</h6>
                          <p class="card-text" style="margin-left: -35px">{{ $useress->pivot->messagee }}</p>
                        </div>
                      </div>

                  <div class="col-md-2" style="margin-left: -20px">
                    <img src="{{asset('storage/'.$useress->photo)}}" class="img-fluid rounded-start" alt="..."
                    style="height:40px;width:120px;border-radius: 50% ; margin-top: 10px ">
                  </div>


                </div>
              </div>






            @foreach ($reponses as $reponse)
                @if ($reponse->contact_jobber_id==$useress->pivot->id)
                <div class="card mb-3" style="max-width: 350px; margin-left: 180px ">
                    <div class="row g-0">
                      <div class="col-md-2" style="margin-left: -90px">
                        <img src="{{asset('storage/'.$reponse->user->photo)}}" class="img-fluid rounded-start" alt="..."
                        style="height:40px;width:40px;border-radius: 50% ; margin-top: 10px ">
                      </div>
                      <div class="col-md-10" style="margin-left:-45px">
                        <div class="card-bodyyy" style="background-color: #ebeced ; box-shadow:40px" >
                          <h6 class="card-title" style="margin-left:-18px ; font-weight:bold">{{ $reponse->user->name }}</h6>
                          <p class="card-text" style="margin-left: -20px">{{ $reponse->message }}</p>

                        </div>
                      </div>
                    </div>
                  </div>






              @endif
            @endforeach







               <!--
                 <form class="chat-form" action="{{ route('reponse_chat') }}" method="post" style="visibility: hidden">
                    @csrf
                <div class="container-inputs-stuffs">


                    <div class="group-inp">


                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="user_reponse" value="{{ $useress->id }}">
                        <input type="hidden" name="contact_jobber_id" value="{{ $useress->pivot->id }}">



                        <textarea placeholder="Enter your message here" name="message" minlength="1" maxlength="1500" style="margin-left: 10px"></textarea>

                    </div>


                    <button class="submit-msg-btn">
                        <span style="color:#448aff ; width: 900px"><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
                    </button>
                </div>

            </form>
            --->

            </div>
        </div>
      </div>

      @endif

      @endforeach



      @endforeach


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

@push('css')
<link href="/your-path-to-fontawesome/css/v5-font-face.css" rel="stylesheet" />
@endpush
@push('js')

<script src="https://kit.fontawesome.com/bcbcc913f2.js" crossorigin>"anonumous"</script>
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




