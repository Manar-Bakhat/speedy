<!-- pour la barre de recherche -->

<form action="{{ route('service-search') }}" class="d-flex mt-2" style="margin-top:10px">
<div class="form-group formf " style= "margin-top: 20px ; height:10px ; margin-left: 900px">
    @csrf
     <input name="q" class="form-control" list="datalistOptions" id="exampleDataList" value="{{ request()->q ? request()->q : '' }}" placeholder="Type to search...">
<datalist id="datalistOptions">
  @foreach ($posts as $post )

   <option value="{{ $post->service_title }} ">{{ $post->service_ville }} {{ $post->service_zone }} </option>

  @endforeach
</datalist>

    </div>
<button type="submit" class="btn btn-dark" style="margin-top:20px"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></button>
</form>






