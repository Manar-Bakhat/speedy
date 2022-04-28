@extends('layouts.account')

@section('content')
  <div class="account-layout border">
    <div class="account-hdr bg-light text-dark border">
      Deactivate Account
    </div>
    <div class="account-bdy p-3">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <p class="lead">Deleting Account :</p>

        </div>
        <div class="col-sm-12 col-md-8">
          <div class="py-3">
            <p class="mb-3">Logout instead</p>
            <a href="{{route('account.logout')}}" class="btn primary-out-btn">Logout</a>
          </div>

          <div>
            <p class="text-sm"><i class="fas fa-info-circle"></i> <span class="font-weight-bold">You will not be able to retrive your account once you have deleted it.</span> </p>
            <div class="my-4">
            <p class="my-3">Click the button to delete this account.</p>

                  <div class="d-flexx">
                    <button type="" class="btn danger-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete Account</button>

                     <!--- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1"    aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-danger" id="exampleModalLabel">Warning <i class="fa-solid fa-triangle-exclamation"></i></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <center><strong>Are you sure you want to <font color="#448aff">delete</font> your account ?</strong></center>
                            </div>

                            <form action="{{route('account.delete')}}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="form-group">

                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                              <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- fin -->

                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>











@endSection

