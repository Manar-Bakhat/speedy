<footer>
    <div class="footer-main">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-3">

          </div>


        </div>
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
