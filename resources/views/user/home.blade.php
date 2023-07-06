@extends('layouts.main')
@section('body')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                @include('layouts.carousel')
            </div>
            <div class="col-12 mt-4">
                <div class="card card-custom">
                    <div class="card-body p-4">
                        <div class="title-custom">
                            Berita Terbaru
                        </div>
                        <hr class="line-custom" />
                        <div class="news-custom mt-4">
                            @foreach ($data as $index => $item)
                                <a href="/detail-berita/{{ $item->id }}">
                                    <div class="news-link-custom d-flex align-items-center">
                                        <div class="news-img-custom">
                                            <img src={{ asset('images/' . $item->image) }} width="300" height="200" />
                                        </div>
                                        <div class="news-content-custom">
                                            <div class="news-title-custom">
                                                {{ $item->judul_berita }}
                                            </div>
                                            <div class="news-text-custom">
                                                {{ \Illuminate\Support\Str::limit($item->isi_berita.'...', 300) }}
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
