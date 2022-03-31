@extends('layouts.account')

@section('content')
  <div class="account-layout border">
    <div class="account-hdr bg-light text-dark border">
      Create Job listings
    </div>
    <div class="account-bdy p-3">
      <div class="alert alert-primary">Your Profile details will be attached automatically.</div>
      <p class="text-primary mb-4">Fill in all fields to create a Post Service</p>
      <div class="row mb-2">
        <div class="col-sm-12 col-md-12">
          <form action="{{route('post.update',['post'=>$post])}}" id="postForm" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="">Service title</label>
              <input type="text" placeholder="Service title" class="form-control @error('service_title') is-invalid @enderror" name="service_title" value="{{ $post->service_title }}" required autofocus >
              @error('service_title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <p class="texte" >Service City</p>
                  <select name="service_ville" class="form-control form" value="{{$post->service_ville}}" required>
                    <option value="Agadir">Agadir </option>
                    <option value="Beni Mellal">Beni Mellal</option>
                    <option value="Casablanca">Casablanca</option>
                    <option value="Chefchaouen">Chefchaouen</option>
                    <option value="Essaouira">Essaouira</option>
                    <option value="Fès">Fès</option>
                    <option value="Ifrane">Ifrane</option>
                    <option value="Kénitra">Kénitra</option>
                    <option value="Khénifra">Khénifra</option>
                    <option value="Khouribga">Khouribga</option>
                    <option value="Ksar El Kébir">Ksar El Kébir</option>
                    <option value="Marrakech">Marrakech</option>
                    <option value="Meknès">Meknès</option>
                    <option value="Nador">Nador</option>
                    <option value="Ouezzane">Ouezzane</option>
                    <option value="Rabat">Rabat</option>
                    <option value="Safi">Safi</option>
                    <option value="Salé">Salé</option>
                    <option value="Tanger">Tanger</option>
                    <option value="Tétouan">Tétouan</option>
                    <option value="Tanger">Tanger</option>
                  </select>
                </div>

                <div class="form">
                <div class="form-group">
                    <label for="">Service Zoned</label>
                    <input type="text" placeholder="Service zoned" class="form-control @error('service_zone') is-invalid @enderror" name="service_zone" value="{{ $post->service_zone }}" required autofocus >
                    @error('service_zone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>



              </div>
            </div>

            <div class="form-group ">
                <div class="row">
                   <div class="col-md-6">
                  <p class="texte">Deadline</p>
                  <input type="date" class="form-control form @error('deadline') is-invalid @enderror" name="deadline" value="@php $date = new DateTime($post->deadline); echo date('Y-m-d',$date->getTimestamp());@endphp" required >
                </div>
              </div>
            </div>





            <div class="form-group">
              <label for="">Service Description (Specifications) <small>Optional Field</small></label>
              <input type="hidden" id="service_specification" name="service_specification" value="{{$post->service_specification}}">
              <div id="quillEditor" style="height:200px"></div>
            </div>

            <button type="button" id="postBtn" class="btn primary-btn">Update Post Service</button>
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
    placeholder: 'service detail , service period , service price  etc ...',
    theme: 'snow'
    });


    const postBtn = document.querySelector('#postBtn');
    const postForm = document.querySelector('#postForm');
    const service_specification = document.querySelector('#service_specification');

    if(service_specification.value){
      quill.root.innerHTML = service_specification.value;
    }

    postBtn.addEventListener('click',function(e){
      e.preventDefault();
      service_specification.value = quill.root.innerHTML

      postForm.submit();
    })
  })
</script>
@endpush
