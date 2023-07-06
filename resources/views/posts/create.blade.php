@extends('layouts.main')
@section('body')
    <div class="d-flex justify-content-center">
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Create Post</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Halaman membuat post</h6>
                <div class="row">
                    <form method="POST" action="/posts" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Masukan Judul">
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Text Body</label>
                            <textarea type="body" class="form-control" id="body" name="body"
                                placeholder="Masukan sis artikel" cols=38></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" id="submit" name="submit">

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection