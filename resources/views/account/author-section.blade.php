@extends('layouts.account')

@section('content')
  <div class="account-layout  border">
    <div class="account-hdr bg-light text-dark border">
      Jobbers Section
    </div>

    <section class="author-company-info">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Complete Your Profile Information Details</h4>
                        <p class="mb-1 alert alert-info">For Service listings you need to Complete your Profile details.</p>

                        <div class="mb-2 d-flex">
                          @if(!$jobber)
                          <a href="{{route('jobber.create')}}" class="btn primary-btn mr-2">Complete Profile</a>
                          @else
                          <a href="{{route('jobber.edit')}}" class="btn secondary-btn mr-2">Edit Profile</a>
                          <div class="ml-auto">

                          </div>
                          <form action="{{route('jobber.destroy')}}" id="jobberDestroyForm" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" id="jobberDestroyBtn" class="btn danger-btn">Delete Company</a>
                                </form>
                          @endif
                        </div>
                        @if($jobber)
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-body test text-center">
                                        <img src="{{asset($jobber->photo)}}" width="100px" class="img-fluid border p-2" alt="">
                                        <h5>{{$jobber->title}}</h5>
                                        <small>{{$jobber->category_name}}</small>
                                      <a class="d-block" href="{{$jobber->facebook}}"><i class="fa-brands fa-facebook"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="author-posts">
      <div class="row my-4">
        <div class="col-lg-12 col-md-8 col-sm-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-2">Manage Posts (Service)</h4>
              <a href="{{route('post.create')}}" class="btn primary-btn">Create new Post Service</a>
            </div>
          </div>
          <div class="table-responsive">
              <table class="table tabless table-striped table-hover">
              <table class="table tabless table-striped table-hover">
                  <thead class="thead-inverse">
                      <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>City</th>
                          <th>Zoned</th>
                          <th>Deadline</th>
                          <th>created at</th>
                          <th>Action</th>

                      </tr>
                  </thead>
                  <tbody>
                      @if($jobber)
                          @foreach($jobber->posts as $post)



                          <tr>
                              <td>{{$loop->index+1}}</td>
                              <td> <a href="{{route('post.show',['service'=>$post])}}" target="_blank" title="Go to this post">{{$post->service_title}}</a></td>
                              <td>{{$post->service_ville}}</td>
                              <td>{{$post->service_zone}}</td>

                              <td>@php
                                  $date = new DateTime($post->deadline);
                                  $timestamp =  $date->getTimestamp();
                                  $dayMonthYear = date('d/m/Y',$timestamp);
                                  $daysLeft = date('d', $timestamp - time()) .' days remaining';
                                  echo "$dayMonthYear <br> <span class='text-danger'> $daysLeft </span>";
                              @endphp</td>
                              <td>{{$post->created_at}}</td>
                              <td>
                                <a href="{{route('post.edit',['post'=>$post])}}" class="btn primary-btn mt-2">Edit</a>


                                <button type="submit"  id="delPostBtn" class="btn danger-btn" data-bs-toggle="modal" data-bs-target="#manar{{ $post->id }}">Delete</button>

                                                    <!-- Modal -->
   <div class="modal fade" id="manar{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Warning <i class="fa-solid fa-triangle-exclamation"></i></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <strong>Are you sure do you want to <font color="#448aff">delete</font> {{ $post->service_title }}"?</strong> 
        </div>
        <form action="{{route('post.destroy' ,$post->id)}}" class="d-inline-block" id="delPostForm" method="POST">
            @csrf
            @method('DELETE')
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Yes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- fin modal -->

</td>
                          </tr>
                          @endforeach
                          @else
                          <tr>
                              <td>You havent Completed your Profile yet.</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>
                      @endif
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    <!--/row-->
    </section>

  </div>
</div>




  <!-- Modal -->
  <!--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure do you want to delete post?
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Yes</button>
        </div>
        </form>
      </div>
    </div>
  </div>  -->







@endSection

@push('js')
<script>
    $(document).ready(function(){
        //delete author company
        $('#jobberDestroyBtn').click(function(e){
            e.preventDefault();
            if(window.confirm('Are you sure you want delete the company?')){
                $('#jobberDestroyForm').submit();
            }
        })
    })
</script>
@endpush
