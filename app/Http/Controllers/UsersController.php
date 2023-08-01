<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public function index()
    {
        // $user = User::with('siswa', 'wali_kelas')->where('role', '!=', 'admin')->get();
        $user = User::leftJoin('siswa', 'users.id', '=', 'siswa.user_id')
        ->leftJoin('walikelas', 'users.id', '=', 'walikelas.user_id')
        ->select('users.id as id','users.username as username', 'users.email as email', 'siswa.nama_siswa as nama_siswa', 'walikelas.nama_wali as nama_wali')
        ->where('nama_siswa', '!=', null)
        ->orWhere('nama_wali', '!=', null)
        ->get();
        // dd($user);

        return view('users.index', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required|max:30|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6|max:15',
        ]);

        try {
            $user = User::find($id);
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'User telah ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'User gagal ditambahkan');
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->username = null;
            $user->email = null;
            $user->password = null;
            $user->save();

            return redirect()->back()->with('success', 'User berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'User gagal dihapus');
        }
    }
}
