<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    //
    public function index()
    {
        $wali_kelas = WaliKelas::with('kelas')->get();
        $kelas = Kelas::all();
        return view('wali_kelas.index', compact('wali_kelas', 'kelas'));
    }

    public function insert(Request $request){
        try {

            $user = new User;
            $user->role = 'wali kelas';
            $user->avatar = 'user.png';
            $user->save();

            $request->request->add(['user_id' => $user->id]);
            WaliKelas::create([
                'nama_wali' => $request->nama_wali,
                'user_id' => $request->user_id,
                'kelas_id' => $request->kelas_id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_wa' => $request->no_wa,
                'alamat' => $request->alamat,
            ]);

            return redirect()->back()->with('success', 'Wali Kelas berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Wali Kelas gagal ditambahkan');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $wali = WaliKelas::find($id);
            $wali->nama_wali = $request->nama_wali;
            $wali->kelas_id = $request->kelas_id;
            $wali->jenis_kelamin = $request->jenis_kelamin;
            $wali->tempat_lahir = $request->tempat_lahir;
            $wali->tanggal_lahir = $request->tanggal_lahir;
            $wali->no_wa = $request->no_wa;
            $wali->alamat = $request->alamat;
            $wali->save();

            return redirect()->back()->with('success', 'Wali Kelas berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Wali Kelas gagal diubah');
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $kelas = WaliKelas::whereId($id)->delete();

            return redirect()->back()->with('success', 'Wali Kelas berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Wali Kelas gagal dihapus');
        }
    }
}
