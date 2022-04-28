<nav class="navbar navbar-expand-md navbar-white bg-white border-bottom sticky-top" id="navbar">
    <div class="container">
    <a href="{{URL('/')}}" class="navbar-brand">
      <img src="{{asset('images/logo/speedy.png')}}" width="35%" alt="">
      </a>

      <strong><a href="{{URL('/http://127.0.0.1:8000/#/')}}" class="navh" style="margin-left: -150px ; font-size: 20px">
        Home
      </a></strong>

      <strong><a href="{{URL('http://127.0.0.1:8000/search#/')}}" class="navh" style="margin-left: -40px ; font-size: 20px">
        Find Service
            </a></strong>
      <strong><a href="{{URL('/')}}" class="navh" style="margin-left: 60px  ; font-size: 20px">
        Contact Us
                 </a></strong>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <i class="fas fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          @auth
          <li class="nav-item dropdown dropdown-left">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
                    <img class="img-profile rounded-circle" src="{{asset('storage/'.auth()->user()->photo)}}" width="40px">
                  </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              @role('admin')
              <a class="dropdown-item" href="{{route('account.dashboard')}}"> <i class="fas fa-cogs fa-sm "></i> Dashboard</a>
               @endrole
              @role('author')
              <a class="dropdown-item" href="{{route('account.authorSection')}}"> <i class="fa fa-cogs fa-sm "></i> Author Dashboard </a>
              @endrole
              <a class="dropdown-item" href="{{route('account.index')}}"> <i class="fas fa-user fa-sm "></i> Profile </a>
              <a class="dropdown-item" href="{{route('account.changePassword')}}"> <i class="fas fa-key fa-sm "></i> </i>Change Password </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('account.logout')}}">
                  <i class="fas fa-sign-out-alt"></i>
                  Logout
                </a>
            </div>
          </li>
          @endauth
          @guest
          <a href="/Jobber" class="btn primary-btn1">Post Service</a>
          <a href="/login" class="btn primary-btn">Sign up or Log in</a>
          @endguest
        </ul>
      </div>
    </div>

  </nav>
