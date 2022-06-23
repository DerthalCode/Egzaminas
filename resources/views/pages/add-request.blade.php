

@extends('main')
@section('content')
<h2>Sukurti nauja užklausą</h2>
@include('_partials/errors')
<form action="/store" method="post" enctype="multipart/form-data">
  @csrf
    <div class="mb-3">
      <input type="text" name="title" class="form-control" placeholder="Pagalbos pobudis">
    </div>
    <div class="mb-3">
      <textarea name="description" id="" cols="30" rows="10" placeholder="Aprašykite iškiluse problemą" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label>Įkelti nuotrauką</label>
      <input type="file" name="logo" class="form-control" accept=".png, .jpg, .jpeg">
    </div>
    <button type="submit" class="btn btn-primary">Saugoti</button>
  </form>
@endsection