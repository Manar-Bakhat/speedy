@extends('layouts.account')

@section('content')
  <div class="account-layout border">
    <div class="account-hdr bg-primary text-white border">
      Create Job listings
    </div>
    <div class="account-bdy p-3">
      <div class="alert alert-primary">Your company details will be attached automatically.</div>
      <p class="text-primary mb-4">Fill in all fields to create a job listing</p>
      <div class="row mb-3">
        <div class="col-sm-12 col-md-12">
          <form action="{{route('post.store')}}" id="postForm" method="POST">
            @csrf
            <div class="form-group">
              <label for="">Job title</label>
              <input type="text" placeholder="Service title" class="form-control @error('service_title') is-invalid @enderror" name="service_title" value="{{ old('service_title') }}" required autofocus >
              @error('service_title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Service ville</label>
                  <select name="service_ville" class="form-control" value="{{old('service_ville')}}" required>
                    <option value="Senior level">Senior level</option>
                    <option value="Mid level">Mid level</option>
                    <option value="Top level">Top level</option>
                    <option value="Entry level">Entry level</option>
                  </select>
                </div>
                <div class="col-md-6">
                    <label for="">Service zone</label>
                    <select name="service_zone" class="form-control" value="{{old('service_zone')}}" required>
                      <option value="Senior level">Senior level</option>
                      <option value="Mid level">Mid level</option>
                      <option value="Top level">Top level</option>
                      <option value="Entry level">Entry level</option>
                    </select>
                  </div>






              </div>
            </div>





            <div class="form-group">
              <div class="row">

                <div class="col-md-6">
                  <label for="">Deadline</label>
                  <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{ old('deadline') }}" required >
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">


              </div>
            </div>



            <div class="form-group">
              <label for="">Service Description (Specifications) <small>Optional Field</small></label>
              <input type="hidden" id="service_specification" name="service_specification" value="{{old('service_specification')}}">
              <div id="quillEditor" style="height:200px"></div>
            </div>

            <button type="button" id="postBtn" class="btn primary-btn">Create Job listing</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endSection

@push('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
  $(document).ready(function(){
    var quill = new Quill('#quillEditor', {
    modules: {
      toolbar: [
          [{ 'font': [] }, { 'size': [] }],
          ['bold', 'italic'],
          [{ list: 'ordered' }, { list: 'bullet' }],
          ['link', 'blockquote', 'code-block', 'image'],
        ]
      },
    placeholder: 'Job Reqirement , Job Specifications etc ...',
    theme: 'snow'
    });


    const postBtn = document.querySelector('#postBtn');
    const postForm = document.querySelector('#postForm');
    const service_specification = document.querySelector('#service_specification');

    if(service_specification.value){
      quill.root.innerHTML = specifications.value;
    }

    postBtn.addEventListener('click',function(e){
      e.preventDefault();
      service_specification.value = quill.root.innerHTML

      postForm.submit();
    })
  })
</script>
@endpush
