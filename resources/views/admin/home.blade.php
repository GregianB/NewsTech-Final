@extends('main')
@section('body')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                @include('layouts.carousel')
            </div>
            <div class="col-4" style="display: grid">
                <div class="card card-custom">
                    <div class="card-body">
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="card card-custom">
                    <div class="card-body p-4">
                        <div class="title-custom">
                            Berita Terbaru
                        </div>
                        <hr class="line-custom" />

                        <div class="news-custom mt-4">
                            <a href="/detail-berita">
                                <div class="news-link-custom d-flex align-items-center">
                                    <div class="news-img-custom">
                                        <img src="https://cdn.alsgp0.fds.api.mi-img.com/middle.community.micommunityid.bkt/ad7df5b4863f85f9b1b241299190a849"
                                            width="300" height="200" />
                                    </div>
                                    <div class="news-content-custom">
                                        <div class="news-title-custom">
                                            Redmi A2 dengan harga baru, asik buat nemenin liburan dirumah!
                                        </div>
                                        <div class="news-text-custom">
                                            Liburan sekolah walaupun di rumah aja nggak perlu khawatir kalo bareng Redmi A2
                                            yang asik banget buat dipake main game!
                                        </div>
                                        <div class="news-date-custom">
                                            23 Juni 2023
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/detail-berita">
                                <div class="news-link-custom d-flex align-items-center">
                                    <div class="news-img-custom">
                                        <img src="https://cdn.alsgp0.fds.api.mi-img.com/middle.community.micommunityid.bkt/ad7df5b4863f85f9b1b241299190a849"
                                            width="300" height="200" />
                                    </div>
                                    <div class="news-content-custom">
                                        <div class="news-title-custom">
                                            Redmi A2 dengan harga baru, asik buat nemenin liburan dirumah!
                                        </div>
                                        <div class="news-text-custom">
                                            Liburan sekolah walaupun di rumah aja nggak perlu khawatir kalo bareng Redmi A2
                                            yang asik banget buat dipake main game!
                                        </div>
                                        <div class="news-date-custom">
                                            23 Juni 2023
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
