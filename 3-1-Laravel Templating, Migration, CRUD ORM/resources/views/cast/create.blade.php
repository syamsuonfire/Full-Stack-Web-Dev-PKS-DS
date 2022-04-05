@extends('layout.master')
@section('title')
Halaman Tambah Cast
@endsection

@section('content')
<form method="POST" action="/cast">
    @csrf
    <div class="form-group">
      <label>Nama Cast</label>
      <input type="text" name="nama" class="form-control" >
      
    </div>
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Umur</label>
        <input type="number" name="umur" class="form-control" >
        
    </div>

    @error('deskripsi')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <div class="form-group">
      <label>Bio</label>
      <textarea name="bio" cols="30" rows="10" class="form-control"></textarea>
    </div>

    @error('bio')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection