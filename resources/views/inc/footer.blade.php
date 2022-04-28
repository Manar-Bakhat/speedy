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

  @push('css')
  <style>
    .footer-main{
      background-color:#272727;
      color:#ddd;
    }
    .footer-links{
      padding-top:2rem;
      padding-bottom: 2rem;
    }
    .footer-links .footer-hdr{
      color:#ddd;
    }
    .footer-links .footer-link-list .footer-links{
      display:block;
      color:#ccc;
      padding:3px 0;
      margin:0;
      font-size:.9rem;
    }
    .footer-links .footer-link-list .footer-links:hover{
      color:white;
    }
    .footer-main .social-links {
      margin:20px 0;
    }
    .footer-main .social-links .social-link{
      background-color:white;
      color:#333;
      padding:8px 10px;
      border-radius: 50%;
      transition:all .3s ease;
    }
    .footer-main .social-links .social-link:hover{
      color:white;
      background-color:#0261A6;
    }
  </style>
  @endpush
