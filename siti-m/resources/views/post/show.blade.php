@extends('layouts.app')

@section('content')
<img src="{{asset('storage/post/',post->image)}}"alt="foto" class="w-100rounded">
<p><strong>{{$post->judul}}</strong></p>
<p>{!! $post->konten !!}</p>  
@endsection