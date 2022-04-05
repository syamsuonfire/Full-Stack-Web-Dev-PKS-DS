@extends('layout.master')
@section('title')
Halaman Detail Cast
@endsection

@section('content')
<h1>{{$cast->nama}}</h1>
<h1>{{$cast->umur}}</h1>
<p>{{$cast->bio}}</p>
@endsection