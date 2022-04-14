@extends('layouts.account')

@section('content')
  <div class="account-layout border">
    <div class="account-hdr border bg-primary text-white shadow">
      My saved Jobs
    </div>
    <div class="account-bdy p-3">
      <div class="my-3">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead class="bg-light small">
              <tr>
                <th>Jobber Nom</th>
                <th>Jobber Phone</th>
                <th>Service Title</th>
                <th>Service City</th>
                <th>Service Zoned</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
                @if($posts->count() >0)
                <tr>

                  <td><a href="{{route('post.show',['service'=>$post])}}">{{$post->jobber->title}}</a></td>
                  <td><a href="#">{{$post->jobber->phone}}</a></td>
                  <td><a href="{{route('account.employer',['employer'=>$post->jobber])}}">{{substr($post->service_title,0,14)}}</a></td>
                  <td><a href="#">{{$post->service_ville}}</a></td>
                  <td>{{$post->service_zone}}</td>
                  <td>
                    <form action="{{route('savedService.destroy',['id'=>$post])}}" method="POST">
                        @csrf
                        @method("delete")
                    <button href="#" class="btn secondary-outline-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Unsave</button>
                </form>
                </td>

                </tr>
                @else
                <tr>
                  <td>You have no service saved.</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure do you want to delete Save Service?
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Yes</button>
        </div>
        </form>
      </div>
    </div>
  </div>



@endSection
