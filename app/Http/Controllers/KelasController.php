<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    //
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    public function insert(Request $request){
        try {
            Kelas::create([
                'nama_kelas' => $request->nama_kelas,
            ]);

            return redirect()->back()->with('success', 'Kelas berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Kelas gagal ditambahkan');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $kelas = Kelas::find($id);
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->save();

            return redirect()->back()->with('success', 'Kelas berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Kelas gagal diubah');
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $kelas = Kelas::whereId($id)->delete();

            return redirect()->back()->with('success', 'Kelas berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Kelas gagal dihapus');
        }
    }
}
