@extends('layouts.main')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <nav class="p-3"
                    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @if (request()->segment(1) === 'detail-berita')
                            <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page"><a href="/berita ">Berita</a></li>
                            <li class="breadcrumb-item" aria-current="page">Detail Berita</li>
                        @endif
                    </ol>
                </nav>
                <div class="card card-custom">
                    <div class="card-body p-4">
                        <div class="news-custom">
                            <div class="news-title p-4">
                                <h3>{{ $data->judul_berita }}</h3>
                                <div class="mt-4">{{ $data->created_at }}&nbsp;&nbsp;{{ $data->kategori }}&nbsp;&nbsp;{{ $data->penulis }}</div>
                            </div>
                            <div class="m-3">
                                <div class="text-center">
                                    <img src="{{ asset('images/' . $data->image) }}" width="600" height="400" />
                                </div>
                                <p class="mt-4">
                                    {{ $data->isi_berita }}
                                </p>
                            </div>
                            @auth
                                <form method="post"
                                    action="/komentar/{{ auth()->user()->id }}/{{ auth()->user()->name }}/{{ auth()->user()->image }}/{{ $data->id }}">
                                    @csrf
                                    <div class="m-3 mt-4">
                                        <label for="exampleFormControlTextarea1" class="form-label-custom">Komentar</label>
                                        <textarea class="form-control form-control-custom" id="exampleFormControlTextarea1" rows="3" name="komentar"
                                            id="komentar" required></textarea>
                                        <input type="submit" class="btn btn-primary mt-2 float-end" value="Kirim">
                                    </div>
                                </form>
                            @else
                                <div class="m-3 mt-4">
                                    <label for="exampleFormControlTextarea1" class="form-label-custom">Komentar</label>
                                    <textarea class="form-control form-control-custom" id="exampleFormControlTextarea1" rows="3" name="komentar"
                                        id="komentar" required></textarea>
                                    <a href="/nokomentar"><input type="submit" class="btn btn-primary mt-2 float-end"
                                            value="Kirim"></a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4">
                <div class="card card-custom">
                    <div class="card-body p-3">
                        <div class="p-4">
                            @foreach ($komen as $index => $item)
                                @if ($item == null)
                                    <div class="commentar-content-custom mt-4">
                                        <h5>Belum ada komentar.</h5>
                                    </div>
                                @elseif ($item)
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-custom">
                                            <img src="{{ asset('usersfoto/' . $item->image_user) }}"
                                                class="avatar-img-custom" />
                                        </div>
                                        <div>
                                            <div class="commentar-user-custom">{{ $item->nama_user }}</div>
                                            <div class="commentar-date-custom">{{ $item->created_at }}</div>
                                        </div>
                                    </div>
                                    <div class="commentar-content-custom mt-4">{{ $item->komentar }}</div>

                                    <div class="mt-4 mb-4">
                                        <hr />
                                    </div>
                                @else
                                    Error.
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
