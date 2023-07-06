@extends('layouts.main')
@section('body')
    <div class="mt-5">
        <h1>{{ $post->title }}</h1>
    </div>
    <div>
        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="">
    </div>
    <div>
        <p>
            {{ $post->body }}
        </p>
    </div>
@endsection