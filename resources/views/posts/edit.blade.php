@extends('layouts.main')
@section('body')
    <div class="d-flex justify-content-center">
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Edit Post</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Halaman mengubah post</h6>
                <div class="row">
                    <form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Masukan Judul" value="{{ $post->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Text Body</label>
                            <textarea type="body" class="form-control" id="body" name="body"
                                placeholder="Masukan sis artikel">{{ $post->body }}</textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" id="submit" name="submit">

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection