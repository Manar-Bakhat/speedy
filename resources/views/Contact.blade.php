@extends('layouts.contact')

@section('content')

 <div id="map">


            <h1>Let's Help You</h1>
            <p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103831.18905188121!2d-5.43651895089027!3d35.58518730037301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b425de2c14849%3A0x43258dbd024e7abc!2zVMOpdG91YW4!5e0!3m2!1sfr!2sma!4v1651339257187!5m2!1sfr!2sma" width="1080" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </p>
              </div>

  <div class="containero">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Tetouan, R12</div>
          <div class="text-two">Mhanech 06</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+(212) 654543890</div>
          <div class="text-two">+(212) 578543925</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">speedy@gmail.com</div>
          <div class="text-two">speedy_admin@gmail.com</div>
        </div>
      </div>

      <div class="right-side">

      @auth
    <div class="topic-text">Send us a message</div>
    <p>If you have a problem with a Jobber or questions related to our application, you can write to us from here.</p>
  <form action="{{ route('contact.create') }}" method="post">
      @csrf
      <div style="height: 5px">
    <div class="input-box" style="visibility: hidden">
      <input type="text" placeholder="Enter your name" name="name"  value="{{ auth()->user()->name }}">
    </div>
    <div class="input-box" style="visibility: hidden">
      <input type="text" placeholder="Enter your email" name="email"  value="{{ auth()->user()->email }}">
    </div>
  </div>

    <div class="input-box">
      <input type="text" placeholder="Enter your name" disabled="disabled" value="{{ auth()->user()->name }}">
    </div>
    <div class="input-box">
      <input type="text" placeholder="Enter your email" disabled="disabled"  value="{{ auth()->user()->email }}">
    </div>


    <div class="input-box message-box">
    <input type="text" placeholder="Enter your message" name="message">
    </div>
    <div class="button">

      <input type="submit"  value="Send Now">
    </div>

  </form>
@endauth
@guest
<div class="topic-text">Send us a message</div>
            <p>If you have a problem with a Jobber or questions related to our application, you can write to us from here.</p>
          <form action="" method="">
              @csrf
<div class="input-box">
    <input type="text" placeholder="Enter your name">
  </div>
  <div class="input-box">
    <input type="text" placeholder="Enter your email">
  </div>
  <div class="input-box message-box">
    <input type="text" placeholder="Enter your message">
    </div>
    <div class="button">
        <a href="{{ route('login') }}">
      <input type="button" value="Send Now" >
</a>
</div>
          </form>
@endguest

</div>






    </div>
  </div>





  <footer>

    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-white mt-5 py-1 px-sm-1 px-md-5">
     <div class="container text-center py-5">
         <div class="d-flex justify-content-center" style="margin-left: 130px">
             <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
             <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
             <a class="btn btn-light btn-social mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
             <a class="btn btn-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
         </div>
         <br/>
         <div class="d-flex justify-content-center" style="margin-left: 130px">
             <a class="text-white" href="#">Privacy</a>
             <span class="px-3">|</span>
             <a class="text-white" href="#">Terms</a>
             <span class="px-3">|</span>
             <a class="text-white" href="#">FAQs</a>
             <span class="px-3">|</span>
             <a class="text-white" href="#">Help</a>
         </div>

         <p class="m-0">&copy; <a class="text-white font-weight-bold" href="#">Speedy</a>. All Rights Reserved. <a class="text-white font-weight-bold" href="#">Pfe Speedy App.2022</a>
         </p>
     </div>
 </div>


</footer>



@endsection





