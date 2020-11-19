@extends('layouts.post')
@section('content')



            <form action="{{route('account.becomeEmployer')}}" method="POST">
              @csrf
              <div class="form-group">
                <div class="d-flex">
                  <button type="submit" class="btn primary-outline-btn">Become Jobber</button>
                </div>
              </div>
            </form>

@endsection
