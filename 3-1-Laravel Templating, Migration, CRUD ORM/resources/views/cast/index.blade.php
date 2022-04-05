@extends('layout.master')
@section('title')
Halaman List Cast
@endsection

@section('content')
<a href="/cast/create" class="btn btn-primary mb-3">Tambah Cast</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Umur</th>
        <th scope="col">Bio</th>
      </tr>
    </thead>
    <tbody>
    @forelse ($casts as $key => $item)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->umur}}</td>
            <td>{{$item->bio}}</td>
            <td>

                <form class="mt-2" action="/cast/{{$item->id}}" method="post">
                    <a href="/cast/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                    <a href="/cast/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
    @empty
        <h1>Data tidak ada</h1>
    @endforelse
    </tbody>
  </table>
@endsection