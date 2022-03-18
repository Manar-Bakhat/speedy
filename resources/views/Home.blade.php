@extends('layouts.post')

@section('content')

<section class="home">
    <div class="slider">
       <div class="slide active" style="background-image: url('images/man.png')">
           <div class="container">
               <div class="caption">
                   <h1></h1>
                   <p></p>

               </div>
           </div>
       </div>
       <div class="slide" style="background-image: url('images/bg.png')">
           <div class="container">
               <div class="caption">
                   <h1>2. Winter Collection 2020</h1>
                   <p>Lorem ipsum dummy text goes here.</p>
                   <a href="">Shop Now</a>
               </div>
           </div>
       </div>
       <div class="slide" style="background-image: url('images/bg0.jpg')">
           <div class="container">
               <div class="caption">
                   <h1>3. Winter Collection 2020</h1>
                   <p>Lorem ipsum dummy text goes here.</p>
                   <a href="">Shop Now</a>
               </div>
           </div>
       </div>
    </div>

   <!-- controls  -->
   <div class="controls">
       <div class="prev"><</div>
       <div class="next">></div>
   </div>

   <!-- indicators -->
   <div class="indicator">
   </div>

 </section>





@endsection

