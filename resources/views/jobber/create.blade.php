@extends('layouts.account')

@section('content')
  <div class="account-layout border">
    <div class="account-hdr bg-primary text-white border">
      Complete your profile information
    </div>
    <div class="account-bdy p-3">
     <form action="{{route('jobber.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Choose a Jobber Category</label>
          <select class="form-control" name="category" style="width: 97%" value="{{ old('category') }}" required>
            @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="pb-3">
          <div class="py-3">
            <p style="margin-left: -70px">Jobber picture</p>
          </div>
          <div class="custom-file" style="width: 97%">
            <input type="file" class="custom-file-input" style="width: 97%"  id="validatedCustomFile" name="photo" required>
            <label class="custom-file-label" for="validatedCustomFile">Choose picture...</label>
            @error('photo')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <div class="py-3">
            <p style="margin-left: -70px">Jobber Title</p>
          </div>
          <input type="text" placeholder="Jobber title" style="width: 97%" class="form-control @error('password') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <div class="py-3">
              <p style="margin-left: -70px">Jobber Age</p>
            </div>
            <input type="text" placeholder="Jobber age" style="width: 97%" class="form-control @error('password') is-invalid @enderror" name="age" value="{{ old('age') }}" required>
              @error('age')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

          <div class="form-group">
            <div class="py-3">
              <p style="margin-left: -70px">Jobber Phone</p>
            </div>
            <input type="text" placeholder="Jobber phone" style="width: 97%" class="form-control @error('password') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
              @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>



        <div class="form-group">
          <div class="py-3">
            <p  style="margin-left: -70px"> Jobber Social Media Url</p>

          </div>
          <input type="text" placeholder="Jobber Facebook" style="width: 97%" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook')}}" required>
            @error('facebook')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="pb-3">
          <div class="py-3">
            <p style="margin-left: -70px">Jobber banner/cover</p>
          </div>
          <div class="custom-file" style="width: 97%">
            <input type="file" class="custom-file-input" name="cover_img" >
            <label class="custom-file-label">Choose cover img...</label>
            @error('cover_img')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="pt-2">
          <p class="mt-3 alert alert-primary">Provide a short paragraph description about you</p>
        </div>
        <div class="form-group">
          <textarea class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="line-divider"></div>
        <div class="mt-3">
          <button type="submit" class="btn primary-btn">Create Profile Jobber</button>
          <a href="{{route('account.authorSection')}}" class="btn primary-outline-btn">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endSection
