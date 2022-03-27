@extends('layouts.account')
@section('content')
<div class="account-layout  border">
  <div class="account-hdr bg-light text-dark border">
   Become a Jobber in Speedy
  </div>
  <div class="account-bdy p-3">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <p class="lead">Upgrade to Jobber Role</p>
      </div>
      <div class="col-sm-12 col-md-8">
        <div>
          <p class="text-sm"><i class="fas fa-info-circle"></i> <span class="font-weight-bold">Join Our Growing Jobber Community .</span> </p>
          <div class="my-4">
          <p class="my-3">Click the button to assign <span class="text-primary">Jobber roles</span> to your account.</p>
            <form action="{{route('account.becomeEmployer')}}" method="POST">
              @csrf
              <div class="form-group">
                <div class="d-flex">
                  <button type="submit" class="btn primary-outline-btn">Become Jobber</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
