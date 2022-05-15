
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/stylee.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>


     <!-- Video Source -->
  <!-- https://www.pexels.com/video/aerial-view-of-beautiful-resort-2169880/ -->
  <section class="showcase">
    <header>
      <h2 class="logo">Travel</h2>
      <div class="toggle"></div>
    </header>
    <video src="video.mp4" muted loop autoplay></video>
    <div class="overlay"></div>
    <div class="text">
      <h2>Never Stop To </h2>
      <h3>Exploring The World</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat.</p>
      <a href="#">Explore</a>
    </div>
    <ul class="social">
      <li><a href="#"><img src="https://i.ibb.co/x7P24fL/facebook.png"></a></li>
      <li><a href="#"><img src="https://i.ibb.co/Wnxq2Nq/twitter.png"></a></li>
      <li><a href="#"><img src="https://i.ibb.co/ySwtH4B/instagram.png"></a></li>
    </ul>
  </section>
  <div class="menu">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">News</a></li>
      <li><a href="#">Destination</a></li>
      <li><a href="#">Blog</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </div>
  <script src="js.js"></script>

</body>
</html>

            <form action="{{route('account.becomeEmployer')}}" method="POST">
              @csrf
              <div class="form-group">
                <div class="d-flex">
                  <button type="submit" class="btn primary-outline-btn">Become Jobber</button>
                </div>
              </div>
            </form>



