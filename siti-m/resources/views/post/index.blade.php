@extends('layouts.app')

@section('content')
    <a href="{{ route('post.create') }}" class="btn btn-outline-success mb-3">Tambah Post</a><table class="table">
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">foto</th>
      <th scope="col">judul</th>
      <th scope="col">konten</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody>
 @forelse ($posts as $post)
    <tr>
      <th scope="row">1</th>
      <td><img src=" {{asset('/storage/post/'.$post->foto)}}"alt="foto" width="100px"></td>
      <td>{{ $post->judul }}</td>
      <td>{{$post->konten }}</td>
      <td>
        <form onsubmit="return confirm ('apakah anda ingin menghapus data ini')" action="{{route('post.destroy', $post->id)}}" metod="POST">
          <a href=""class="btn btn-outline-primary">Edit</a>
        <a href="" class="btn btn-outline-secondary">Lihat</a>
        @csrf
        @method('DELETE')
        <button type="sumbit" class="btn btn-outline-danger">Delete</button>
        </form>
      </td>
    </tr>
  @empty
     <div class="alert alert-danger" role="alert">
      Data belum tersedia!
     </div> 
 @endforelse
    
  </tbody>
</table>

@endsection