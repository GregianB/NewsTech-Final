<?php

namespace App\Http\Controllers\search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Data;

class CariController extends Controller
{
    function cari(Request $request)
    {
        $keyword = $request->input('cari');

        $data = DB::table('beritas')
            ->where('judul_berita', 'like', '%'.$keyword.'%')
            ->latest()
            ->get();

        return view('search.result', ['data' => $data]);
        //return view('search.result');
    }

    function cariAdmin(Request $request)
    {
        $keyword = $request->input('cari');

        $data = DB::table('beritas')
            ->where('judul_berita', 'like', '%'.$keyword.'%')
            ->latest()
            ->get();

        return view('admin.main', ['data' => $data]);
        //return view('search.result');
    }
}
