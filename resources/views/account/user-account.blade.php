@extends('layouts.account')

@section('content')
<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('update-photo') }}" method="post"  enctype="multipart/form-data">
        <div class="modal-body">
                @csrf

            <div class="mb-2">

                <input name="photo" class="form-control" type="file" id="formFile">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>

            </div>
        </form>
        </div>
    </div>
  </div>

<!-- fin modal -->




<div class="account-layoutborder">
  <div class="account-hdr bg-light text-dark border ">
    User Account
  </div>
  <div class="account-bdy border py-3">
    <div class="row container d--flex justify-content-center">

        <div class="col-xl-12 col-md-12">
            <div class="card user-card-full">



                <div class="row m-l-0 m-r-0">


                    <div class="col-sm-4 bg-c-lite-green user-profile">
                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="w-25">

                        <div class="card-block text-center text-white">
                            <!-- enregistrer un fichier -->





                            <!-- fin -->
                            <div class="col-sm-4 "><i class="fa fa-camera fa-sm"></i></div>
                            <div class="m-b-25"> <img src="{{asset('storage/'.auth()->user()->photo)}}" class="img-radius" alt="User-Profile-Image" style="height:80px;width:100px;border:solid 5px"> </div>
                            <h6 class="f-w-600" style="margin-top: -70px">{{auth()->user()->name}}</h6>
                            @role('user')
                            <p style="margin-top: -20px" >User</p>
                            @endrole
                            @role('admin')
                            <p class="position" style="margin-top: 0px">Author (Jobber) <i class="fas fa-pen-square"></i></p>
                            @endrole
                        </div>
                    </a>
                    </div>


                <!-- fin de lien -->
                    <div class="col-sm-8">
                        <div class="card-block">
                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Email</p>
                                <h6 class="text-muted f-w-400">{{auth()->user()->email}}</h6>
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Age</p>
                                    <h6 class="text-muted f-w-400">not set</h6>
                                </div>
                            </div>
                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Account</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Edit Profile</p>
                                    <a href="" class="btn primary-outline-btn" data-bs-toggle="modal" data-bs-target="#exampleModale">Editer Profile</a>


  <!-- Modal -->
  <div class="modal fade" id="exampleModale" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editer Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('edit-user',auth()->user()->id) }}" method="post">
            @csrf
            @method('PUT')
        <div class="modal-body">


              <h6>Full name :</h6><input type="text" name="name" value="{{ old('name') }}" placeholder="{{auth()->user()->name}}">
              <h6>Email :</h6><input type="text" name="email" value="{{ old('email') }}" placeholder="{{auth()->user()->email}}">
              <h6>Age :</h6><input type="integer" name="email" >
              <h6>Phone :</h6><input type="text" name="phone">
              <h6>Description :</h6><input type="text" name="description">
              <h6>City :</h6><input type="text" name="city">




        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
                                </div>
                                <div class="col-sm-6">
                                  <p class="m-b-10 f-w-600">Logout</p>
                                    <a href="{{route('account.logout')}}" class="btn btn-outline-dark">Logout</a>

                                </div>
                            </div>
                            <ul class="social-link list-unstyled m-t-40 m-b-10">
                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
  </div>
</div>




@endSection

@push('css')
<style>
.user-card-full {
    overflow: hidden;
}
.position{
    margin-top:30px;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(224, 38, 172, 0.08);
    box-shadow: 0 1px 20px 0 rgba(240, 109, 201, 0.08);
    border: none;
    margin-bottom: 40px;
    margin-right: 80px;
    margin-left: -60px;
    margin-top: 30px;
}
.m-r-0 {
    margin-right: 0px
}
.m-l-0 {
    margin-left: 0px;
    margin-bottom: -108px
}
.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}
.bg-c-lite-green {
    background: linear-gradient(to right, #448aff, #639cfa)
}
.user-profile {
    padding: 20px 0
}
.card-block {
    padding: 1.25rem
}
.m-b-25 {
    margin-bottom: 95px
}
.img-radius {
    border-radius: 5px
}
h6 {
    font-size: 14px
}
.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}
.card-block {
    padding: 1.25rem
}
.b-b-default {
    border-bottom: 1px solid #e0e0e0
}
.m-b-20 {
    margin-bottom: 20px
}
.p-b-5 {
    padding-bottom: 5px !important
}
.card .card-block p {
    line-height: 25px
}
.m-b-10 {
    margin-bottom: 10px;
    margin-left: 90px;
}
.text-muted {
    color: #919aa3 !important ;
    margin-left: 67px;
}
.b-b-default {
    border-bottom: 1px solid #e0e0e0
}
.f-w-600 {
    font-weight: 600
}
.f-w-400 {
    font-weight: 600;
    margin-left: 90px;
}
.m-b-20 {
    margin-bottom: 20px
}
.m-t-40 {
    margin-top: 20px
}
.p-b-5 {
    padding-bottom: 5px !important
}
.m-b-10 {
    margin-bottom: 10px
}
.m-t-40 {
    margin-top: 20px
}
</style>
@endpush
