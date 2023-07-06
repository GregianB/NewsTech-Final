<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class GuestController extends Controller
{
    function show()
    {
        $data = Data::latest()->paginate(3);

        return view('user.home', ['data' => $data]);
    }

    function berita()
    {
        $data = Data::latest()->get();
        //$data = Data::all();

        return view('user.berita', ['data' => $data]);
    }

    function detail_berita($id)
    {
        $data = Data::find($id);   

        $komen = DB::table('comments')
            ->where('id_berita', '=', $id)
            ->latest()
            ->paginate(10);


        return view('user.detail-berita', ['data' => $data], ['komen' => $komen]);
    }

    function showByKategori($kategori)
    {  
        $data = DB::table('beritas')
            ->where('kategori', '=', $kategori)
            ->latest()
            ->get();

        return view('user.berita', ['data' => $data]);
    }

}
