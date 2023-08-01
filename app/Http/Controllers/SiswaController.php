<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();
        $kelas = Kelas::all();
        return view('siswa.index', compact('siswa', 'kelas'));
    }

    public function insert(Request $request){
        try {

            $user = new User;
            $user->role = 'siswa';
            $user->avatar = 'user.png';
            $user->save();

            $request->request->add(['user_id' => $user->id]);
            Siswa::create([
                'nama_siswa' => $request->nama_siswa,
                'user_id' => $request->user_id,
                'kelas_id' => $request->kelas_id,
                'nis' => $request->nis,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_wa' => $request->no_wa,
                'orang_tua' => $request->orang_tua,
                'no_wa_ortu' => $request->no_wa_ortu,
                'alamat' => $request->alamat,
            ]);

            return redirect()->back()->with('success', 'Siswa berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Siswa gagal ditambahkan');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $siswa = Siswa::find($id);
            $siswa->nama_siswa = $request->nama_siswa;
            $siswa->kelas_id = $request->kelas_id;
            $siswa->nis = $request->nis;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->tempat_lahir = $request->tempat_lahir;
            $siswa->tanggal_lahir = $request->tanggal_lahir;
            $siswa->no_wa = $request->no_wa;
            $siswa->no_wa_ortu = $request->no_wa_ortu;
            $siswa->orang_tua = $request->orang_tua;
            $siswa->alamat = $request->alamat;
            $siswa->save();

            return redirect()->back()->with('success', 'Siswa berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Siswa gagal diubah');
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $kelas = Siswa::whereId($id)->delete();

            return redirect()->back()->with('success', 'Siswa berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Siswa gagal dihapus');
        }
    }
}
