@auth
@else
    <div class="header-custom">
        <a href="/login">Login</a>
        |
        <a href="/register">Register</a>
    </div>
@endauth

<nav class="navbar navbar-expand-sm navbar-custom">
    <div class="container-sm">
        <a class="navbar-brand" style="font-weight:bold; " href="#"><img
                src="{{ asset('logo_web-removebg-preview.png') }}" alt="Logo" width="75" height="75"
                style="margin-inline:4px;">News Tech</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-nav-custom">
                @auth
                    @if (auth()->user()->level == 1)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment(1) === 'beranda' ? 'active' : '' }}"
                                aria-current="page" href="/beranda">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment(1) === 'berita' ? 'active' : '' }}" aria-current="page"
                                href="/berita">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment(1) === 'admin' ? 'active' : '' }}" aria-current="page"
                                href="/admin">Data Berita</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <div class="d-flex justify-content-center align-items-center dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="nav-item nav-link">
                                        KATEGORI
                                    </div>
                                </div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item nav-link" href="/kategori/Ekonomi">&nbsp;Ekonomi</a></li>
                                    <li><a class="dropdown-item nav-link" href="/kategori/Teknologi">&nbsp;Teknologi</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link" href="/kategori/Olahraga">&nbsp;Olahraga</a></li>
                                    <li><a class="dropdown-item nav-link" href="/kategori/Bisnis">&nbsp;Bisnis</a></li>
                                    <li><a class="dropdown-item nav-link" href="/kategori/Kesehatan">&nbsp;Kesehatan</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link" href="/kategori/Hiburan">&nbsp;Hiburan</a></li>
                                    <li><a class="dropdown-item nav-link" href="/kategori/Sosial">&nbsp;Sosial</a></li>
                                    <li><a class="dropdown-item nav-link" href="/kategori/Pendidikan">&nbsp;Pendidikan</a></li>
                        </li>
                </ul>
            </div>
            </li>
        @elseif (auth()->user()->level == 2)
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) === 'beranda' ? 'active' : '' }}" aria-current="page"
                    href="/beranda">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) === 'berita' ? 'active' : '' }}" aria-current="page"
                    href="/berita">Berita</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <div class="d-flex justify-content-center align-items-center dropdown-toggle" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="nav-item nav-link">
                            KATEGORI
                        </div>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item nav-link" href="/kategori/Ekonomi">&nbsp;Ekonomi</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Teknologi">&nbsp;Teknologi</a>
                        </li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Olahraga">&nbsp;Olahraga</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Bisnis">&nbsp;Bisnis</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Kesehatan">&nbsp;Kesehatan</a>
                        </li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Hiburan">&nbsp;Hiburan</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Sosial">&nbsp;Sosial</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Pendidikan">&nbsp;Pendidikan</a></li>
                    </ul>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) === 'beranda' ? 'active' : '' }}" aria-current="page"
                    href="/beranda">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) === 'berita' ? 'active' : '' }}" href="/berita">Berita</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <div class="d-flex justify-content-center align-items-center dropdown-toggle" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="nav-item nav-link">
                            KATEGORI
                        </div>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item nav-link" href="/kategori/Ekonomi">&nbsp;Ekonomi</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Teknologi">&nbsp;Teknologi</a>
                        </li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Olahraga">&nbsp;Olahraga</a>
                        </li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Bisnis">&nbsp;Bisnis</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Kesehatan">&nbsp;Kesehatan</a>
                        </li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Hiburan">&nbsp;Hiburan</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Sosial">&nbsp;Sosial</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Pendidikan">&nbsp;Pendidikan</a></li>
                    </ul>
                </div>
            </li>
            @endif
        @else
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) === 'beranda' ? 'active' : '' }}" aria-current="page"
                    href="/beranda">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) === 'berita' ? 'active' : '' }}" href="/berita">Berita</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <div class="d-flex justify-content-center align-items-center dropdown-toggle" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="nav-item nav-link">
                            KATEGORI
                        </div>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item nav-link" href="/kategori/Ekonomi">&nbsp;Ekonomi</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Teknologi">&nbsp;Teknologi</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Olahraga">&nbsp;Olahraga</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Bisnis">&nbsp;Bisnis</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Kesehatan">&nbsp;Kesehatan</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Hiburan">&nbsp;Hiburan</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Sosial">&nbsp;Sosial</a></li>
                        <li><a class="dropdown-item nav-link" href="/kategori/Pendidikan">&nbsp;Pendidikan</a></li>
                    </ul>
                </div>
            </li>
        @endauth
        </ul>
        <form class="d-flex" role="search" method="post" action="/cari">
            @csrf
            <input type="text" class="form-control form-control-custom" placeholder="Cari..." aria-label="Cari"
                aria-describedby="addon-wrapping" name="cari" id="cari">
        </form>
        @auth
            <div class="m-2"></div>
            <div class="dropdown">
                <div class="d-flex justify-content-center align-items-center dropdown-toggle" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar-custom">
                        @if (auth()->user()->image == 'ppkosong.png')
                            <img src="{{ asset('usersfoto/ppkosong.png') }}" class="avatar-img-custom" />
                        @else
                            <img src="{{ asset('usersfoto/' . auth()->user()->image) }}" class="avatar-img-custom" />
                        @endif
                    </div>
                    <div class="avatar-user-custom">
                        &nbsp; {{ auth()->user()->name }}
                    </div>
                </div>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/profile/{{ auth()->user()->id }}"><i
                                class="fa-solid fa-user fa-fw mr-4"></i>&nbsp;Profile</a></li>
                    <li><a class="dropdown-item logout" href="/logout"><i
                                class="fa-solid fa-right-from-bracket fa-fw"></i>&nbsp;Logout</a></li>
                </ul>
            </div>
        @endauth
        {{-- <div class="d-flex justify-content-center align-items-center">
                <div class="avatar-custom">

                </div>
                <div class="avatar-user-custom">
                    {{ auth()->user()->name }}
                </div>
            </div> --}}
    </div>
    </div>
</nav>
