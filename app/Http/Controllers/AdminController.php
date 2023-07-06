<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    function showAdmin()
    {
        return view('admin.main');
    }

    function getData()
    {
        $data = Data::latest()->get();

        return view('admin.main', ['data' => $data]);
    }

    function postData(Request $request, $nama)
    {
        $validatedData = $request->validate([
            'judul_berita' => 'required|string|max:255',
            'kategori' => 'required|string',
            'isi_berita' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        $image = $request->file('image');

        if ($image) {
            $filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
        }

        $data = new Data();
        $data->judul_berita = $validatedData['judul_berita'];
        $data->isi_berita = $validatedData['isi_berita'];
        $data->image = $filename;
        $data->kategori = $validatedData['kategori'];
        $data->penulis = $nama;
        $data->save();

        return redirect('/admin')->with('Berhasil', 'Berhasil menambahkan berita');
    }

    function editData(Request $request, $id, $nama)
    {
        $data = Data::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            if (!empty($data->image)) {
                $pathfile = public_path('images\\' . $data->image);

                @unlink($pathfile);
            }

            // Upload dan simpan foto baru
            $newImage = $request->file('image');
            $filename = $newImage->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
            $data->image = $filename;
        }
        
        $data->judul_berita = $request->input('judul_berita');
        $data->isi_berita = $request->input('isi_berita');
        $data->kategori = $request->input('kategori');
        $data->penulis = $nama;
        $data->save();

        return redirect('/admin')->with('Berhasil', 'Berhasil mengubah berita');
    }

    function deleteData($id)
    {
        $data = Data::find($id);
        $pathfile = public_path('images\\' . $data->image);

        @unlink($pathfile);

        $data->delete();

        return redirect('/admin')->with('Berhasil', 'Berhasil menghapus berita');
    }
}
