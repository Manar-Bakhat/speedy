@extends('layouts.account')

@section('content')
  <div class="account-layout  border">
    <div class="account-hdr bg-primary text-white border">
      VIewing all comments <span class="badge badge-primary">Any Role</span>
    </div>
    <div class="account-bdy p-3">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="table-responsive pt-3">
            <table class="table table-hover table-striped small">
              <thead>
                <tr>

                  <th>User_name</th>
                  <th>Post_id</th>
                  <th>Comment</th>
                  <th>stars_rated</th>
                  <th>created at</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                @if($users->count())
                <!--  Quand on a deux foreach et que on veut afficher tous les informations dependement
                    de deuxieme foreach alors on mets tous les variables dans le deuxieme foreach
                -->
                @foreach($users as $user)
                <tr>
                    <!-- qui devrait etre ici -->
                    @foreach ($user->postes as $poste)
                    <td>{{ $user->name }}</td> <!-- exemple ici -->
                      <td>{{ $poste->id}}</td>
                      <td>{{ $poste->pivot->message }}</td>
                      <td>{{ $poste->pivot->stars_rated }}</td>
                      <td>{{ $poste->pivot->created_at }}</td>

                  <td>
                    <form action="{{ route('account.destroyComment') }}" method="POST">
                      @csrf
                      @method('delete')
                      <input type="hidden" name="id" value="{{$poste->pivot->id}}">


                      <button class="btn primary-btn">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
                @endforeach
                @else
                <tr>
                  <td>There isn't any users.</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-center mt-4 custom-pagination">

          </div>
        </div>
      </div>
    </div>
  </div>
@endSection
