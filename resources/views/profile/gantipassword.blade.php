@extends('layouts/main')
@section('body')
    <div class="container">
        <div class="row">
            <div>
                <nav class="p-3"
                    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/profile/{{ auth()->user()->id }}">Profil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Halaman ubah password</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex justify-content-center">
                <div class="card col-10" style="border-radius:20px">
                    <div class="card-body">
                        <h5 class="card-title mt-1">
                            <h1 style="font-weight:bold;">Profil password<h1>
                        </h5>
                        <h6 class="card-subtitle mb-1 text-body-secondary">Halaman untuk mengubah password profil.</h6>
                        <div class="row">
                            <div class="mb-2">
                                <hr />
                                <a href="/profile/{{ auth()->user()->id }}" class="btn btn-success float-end">Halaman Profile</a>
                            </div>
                            <div class="d-flex justify-content-center mb-3 col-12 mt-4">
                                @if (session('Success'))
                                    <div class="alert alert-success col-4">
                                        {{ session('Success') }}
                                    </div>
                                @elseif (session('Error'))
                                    <div class="alert alert-danger col-4">
                                        {{ session('Error') }}
                                    </div>
                                @else
                                @endif
                            </div>
                            <form method="POST" action="/updateProfilePassword/{{ auth()->user()->id }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-center mb-3 col-12">
                                    <div class="avatar-custom mb-2">
                                        <img src="{{ asset('usersfoto/' . auth()->user()->image) }}"
                                            class="avatar-custom" />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="mb-3 col-4">
                                        <label for="title" class="form-label mb-3" style="font-weight:500;">Password</label>
                                        <input type="password" class="form-control" id="pwd1" name="pwd1"
                                            placeholder="Masukan password baru" autocomplete="off" value=""
                                            required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="mb-3 col-4">
                                        <label for="title" class="form-label mb-3" style="font-weight:500;">Tulis ulang password</label>
                                        <input type="password" class="form-control" id="pwd2" name="pwd2"
                                            placeholder="Masukan ulang password baru" autocomplete="off" value=""
                                            required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="mb-3 col-4">
                                        <input type="submit" class="btn btn-primary mb-3" id="submit" name="submit"
                                            value="Simpan">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
