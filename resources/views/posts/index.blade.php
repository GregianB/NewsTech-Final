@extends('layouts.main')
@section('body')
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">THUMBNAIL</th>
                            <th scope="col">BODY</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td><img src="{{ asset('storage/' . $post->thumbnail) }}" width="100px" height="100px"
                                        class="img-thumbnail" alt="{{ $post->title }}"></td>
                                <td>{{ Str::limit($post->body, 50) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="/posts/{{ $post->id }}">Lihat</a></li>
                                            <li><a class="dropdown-item" href="/posts/edit/{{ $post->id }}">Ubah</a></li>
                                            <li>
                                                <form action="/posts/{{$post->id}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button  class="dropdown-item" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</button>
                                                </form>

                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection