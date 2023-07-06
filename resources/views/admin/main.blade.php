<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Tech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="/custom.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet" />
    <style>
        @import url('https://fonts.cdnfonts.com/css/montserrat');
    </style>
    <link rel="icon" href="{{ asset('logo_web.jpeg') }}" type="image/x-icon">
</head>

<body>
    @include('layouts.navbar')

    <div class="container mt-4">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="card card-custom">
                    <div class="card-body p-4">
                        <div class="title-custom">
                            Data Berita
                        </div>
                        <hr class="line-custom" />
                        <div>
                            {{-- <a href="/create"><button class="btn btn-primary mt-4 mb-2">Tambah</button></a> --}}
                            <button type="button" class="btn btn-primary mt-4 mb-2" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                <i class="fa fa-plus fa-sm"></i> Tambah
                            </button>
                            <div class="float-end">
                                <form class="d-flex" role="search" method="post" action="/cariAdmin">
                                    @csrf
                                    <input type="text" class="form-control form-control-custom" placeholder="Cari..."
                                        aria-label="Cari" aria-describedby="addon-wrapping" name="cari"
                                        id="cari">
                                </form>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" width="50" class="text-center">#</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Isi</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Penulis</th>
                                        <th scope="col" width="300">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $index + 1 }}</th>
                                            <td>{{ $item->judul_berita }}</td>
                                            <td> {{ \Illuminate\Support\Str::limit($item->isi_berita . '...', 100) }}
                                            </td>
                                            <td>
                                                <img src={{ asset('images/' . $item->image) }} width="150"
                                                    height="100" />
                                            </td>
                                            <td>{{ $item->kategori }}</td>
                                            <td>{{ $item->penulis }}</td>
                                            <td>
                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $item->id }}"><i
                                                        class="fa fa-edit fa-sm"></i>
                                                    Ubah</button>
                                                <div class="modal fade" id="editModal{{ $item->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content modal-content-custom">
                                                            <div class="modal-body">
                                                                <form
                                                                    action="/admin/edit/{{ $item->id }}/{{ auth()->user()->name }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-title-custom">
                                                                        <h3>Ubah</h3>
                                                                        <h6>Ubah konten berita</h6>
                                                                    </div>
                                                                    <div class="mt-4">
                                                                        <div class="mb-3">
                                                                            <label for="judul_berita"
                                                                                class="form-label form-label-custom">Judul
                                                                                Berita</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-custom"
                                                                                name="judul_berita" id="judul_berita"
                                                                                placeholder="Masukkan Judul"
                                                                                value="{{ $item->judul_berita }}"
                                                                                autocomplete="off" />
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="kategori_berita"
                                                                                class="form-label form-label-custom">Kategori
                                                                                Berita</label>
                                                                            <select name="kategori" id="kategori"
                                                                                required>
                                                                                <option>--Pilih Kategori--</option>
                                                                                <option value="Ekonomi">Ekonomi</option>
                                                                                <option value="Teknologi">Teknologi
                                                                                </option>
                                                                                <option value="Olahraga">Olahraga
                                                                                </option>
                                                                                <option value="Bisnis">Bisnis</option>
                                                                                <option value="Kesehatan">Kesehatan
                                                                                </option>
                                                                                <option value="Hiburan">Hiburan</option>
                                                                                <option value="Sosial">Sosial</option>
                                                                                <option value="Pendidikan">Pendidikan
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="image"
                                                                                class="form-label form-label-custom">Gambar
                                                                                Berita</label>
                                                                            <input type="file"
                                                                                class="form-control form-control-custom"
                                                                                name="image" id="image">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="isi_berita"
                                                                                class="form-label form-label-custom">Isi
                                                                                Berita</label>
                                                                            <textarea type="body" class="form-control form-control-custom" id="isi_berita" name="isi_berita"
                                                                                placeholder="Masukkan isi berita" rows="5" autocomplete="off" required>{{ $item->isi_berita }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-4 text-center">
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-bs-dismiss="modal">Tutup</button>
                                                                        <input type="submit" id="submit"
                                                                            class="btn btn-primary" value="Simpan" />
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $item->id }}">
                                                    <i class="fa fa-trash fa-sm"></i> Hapus
                                                </button>
                                                <div class="modal fade" id="deleteModal{{ $item->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content modal-content-custom">
                                                            <div class="modal-body">
                                                                <form action="/admin/{{ $item->id }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-title-custom">
                                                                        <h3>Hapus</h3>
                                                                        <h6>Yakin menghapus data
                                                                            {{ $item->judul_berita }} ?</h6>
                                                                    </div>
                                                                    <div class="mt-4 text-center">
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-bs-dismiss="modal">Tidak</button>
                                                                        <input type="submit" id="submit"
                                                                            class="btn btn-primary" value="Hapus" />
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-custom">
                <div class="modal-body">
                    <form method="POST" action="/admin/{{ auth()->user()->name }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-title-custom">
                            <h3>Tambah</h3>
                            <h6>Tambah konten berita</h6>
                        </div>
                        <div class="mt-4">
                            <div class="mb-3">
                                <label for="judul_berita" class="form-label form-label-custom">Judul Berita</label>
                                <input type="text" class="form-control form-control-custom" name="judul_berita"
                                    id="judul_berita" placeholder="Masukkan Judul" autocomplete="off" required />
                            </div>
                            <div class="mb-3">
                                <label for="kategori_berita" class="form-label form-label-custom">Kategori
                                    Berita</label>
                                <select name="kategori" id="kategori" required>
                                    <option>--Pilih Kategori--</option>
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Teknologi">Teknologi</option>
                                    <option value="Olahraga">Olahraga</option>
                                    <option value="Bisnis">Bisnis</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <option value="Hiburan">Hiburan</option>
                                    <option value="Sosial">Sosial</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label form-label-custom">Gambar Berita</label>
                                <input type="file" class="form-control form-control-custom" name="image"
                                    id="image" required>
                            </div>
                            <div class="mb-3">
                                <label for="isi_berita" class="form-label form-label-custom">Isi Berita</label>
                                <textarea type="body" class="form-control form-control-custom" id="isi_berita" name="isi_berita"
                                    placeholder="Masukkan isi berita" rows="5" autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            <input type="submit" id="submit" class="btn btn-primary" value="Simpan" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @yield('body')

    {{-- @include('layouts.footer') --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

<script src="https://kit.fontawesome.com/8b3979d85e.js" crossorigin="anonymous"></script>

</html>
