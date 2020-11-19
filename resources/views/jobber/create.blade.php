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
          <select class="form-control" name="category" value="{{ old('category') }}" required>
            @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="pb-3">
          <div class="py-3">
            <p>Jobber picture</p>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="validatedCustomFile" name="logo" required>
            <label class="custom-file-label" for="validatedCustomFile">Choose logo...</label>
            @error('logo')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <div class="py-3">
            <p>Jobber Title</p>
          </div>
          <input type="text" placeholder="Jobber title" class="form-control @error('password') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
          <div class="py-3">
            <p>Jobber facebook Url</p>

          </div>
          <input type="text" placeholder="Jobber Website" class="form-control @error('facebook') is-invalid @enderror" name="website" value="{{ old('website')}}" required>
            @error('facebook')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="pb-3">
          <div class="py-3">
            <p>Jobber banner/cover</p>
          </div>
          <div class="custom-file">
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
          <p class="mt-3 alert alert-primary">Provide a short paragraph description about your company</p>
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
          <button type="submit" class="btn primary-btn">Create company</button>
          <a href="{{route('account.authorSection')}}" class="btn primary-outline-btn">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endSection