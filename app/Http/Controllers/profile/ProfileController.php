<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function showProfile($id)
    {
        $data = Profile::find($id);
            
        return view('profile.profile', ['data' => $data]);
    }

    public function update(Request $request, $id) 
    {
        $data = Profile::findOrFail($id);
        $komens = Comment::where('id_user', $id)->first();

        $image = $request->file('foto');
        if ($image) {
            if ($data->image == 'ppkosong.png') {
                //no code
            }
            else {
                $pathfile = public_path('usersfoto\\' . $data->image);

                @unlink($pathfile);
            }

            // Upload dan simpan foto baru
            $newImage = $request->file('foto');
            $filename = $newImage->getClientOriginalName();
            $image->move(public_path('usersfoto'), $image->getClientOriginalName());
            $data->image = $filename;
            $komens->image_user = $filename;
        }
        
        $data->name = $request->input('nama');
        $komens->nama_user = $request->input('nama');

        if ($data->name = $request->input('nama') == null)
        {
            return redirect()->back()->with('Error', 'Gagal merubah profile, form nama kosong!');
        }
        else
        {
            $komens->nama_user = $request->input('nama');
            $komens->save();
            $data->name = $request->input('nama');
            $data->save();
            return redirect()->back()->with('Success', 'Berhasil mengubah data profil.');
        }

    }

    function showPassword($id)
    {
        $data = Profile::find($id);
            
        return view('profile.gantiPassword', ['data' => $data]);
    }

    public function updatePassword(Request $request, $id) 
    {
        $data = Profile::findOrFail($id);

        $key1 = $request->input('pwd1');
        $key2 = $request->input('pwd2');

        if ($key1 = $request->input('pwd1') != $key1 = $request->input('pwd2'))
        {
            return redirect()->back()->with('Error', 'Penulisan ulang password tidak sama!');
        }
        else 
        {
            $data->password = Hash::make($request->input('pwd1'));
            $data->save();
            return redirect()->back()->with('Success', 'Berhasil mengubah password profil.');
        }

    }

}
