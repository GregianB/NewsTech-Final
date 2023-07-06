<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function show()
    {
        return view('auth.register');
    }

    //untuk simpan data ke database

    public function register(Request $request)
    {
        $level = 2;
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = 'ppkosong.png';
        $user->level = $level;
        

        if($user->name == null || $user->email == null || $user->password == null){
            return redirect('/register')->with('Failed', 'Gagal Mendaftar, Isi form dengan benar!');
        //return "berhasil simpan";
        }
        else {
            try{
                $user->save();
            }
            catch(QueryException $exception){
                if ($exception->errorInfo[1] === 1062) {
                    // Penanganan kesalahan Duplicate entry
                    return redirect()->back()->with('Error', 'Email sudah terdaftar, Silahkan gunakan email lain!');
                }
                return redirect()->back()->with('Error', 'Terjadi kesalahan saat menyimpan data.');
            }
            $user->save();
            return redirect('/login')->with('Success', 'Berhasil mendaftar! Silahkan login.');
        }
    }
}
