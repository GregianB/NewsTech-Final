@extends('layouts.main')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <nav class="p-3"
                    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Cari</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pencarian Berita</li>
                    </ol>
                </nav>
                <div class="card card-custom">
                    <div class="card-body p-4">
                        <div class="title-custom">
                            Hasil Pencarian Berita
                        </div>
                        <hr class="line-custom" />
                        <div class="news-custom mt-4">
                            @foreach ($data as $index => $item)
                                <a href="/berita/detail-berita/{{ $item->id }}">
                                    <div class="news-link-custom d-flex align-items-center">
                                        <div class="news-img-custom">
                                            <img src={{ asset('images/' . $item->image) }} width="300" height="200" />
                                        </div>
                                        <div class="news-content-custom">
                                            <div class="news-title-custom">
                                                {{ $item->judul_berita }}
                                            </div>
                                            <div class="news-text-custom">
                                                {{ \Illuminate\Support\Str::limit($item->isi_berita . '...', 500) }}
                                            </div>
                                            <div class="news-date-custom">
                                                {{ $item->created_at }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
