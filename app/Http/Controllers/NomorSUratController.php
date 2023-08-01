<?php

namespace App\Http\Controllers;

use App\Models\NomorSurat;
use Illuminate\Http\Request;

class NomorSUratController extends Controller
{
    //
    public function index()
    {
        $surat = NomorSurat::all();
        return view('surat.index', compact('surat'));
    }

    public function insert(Request $request){
        try {
            NomorSurat::create([
                'nomor' => $request->nomor,
            ]);

            return redirect()->back()->with('success', 'Nomor Surat berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Nomor Surat gagal ditambahkan');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $kelas = NomorSurat::find($id);
            $kelas->nomor = $request->nomor;
            $kelas->save();

            return redirect()->back()->with('success', 'Nomor Surat berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Nomor Surat gagal diubah');
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $kelas = NomorSurat::whereId($id)->delete();

            return redirect()->back()->with('success', 'Nomor Surat berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Nomor Surat gagal dihapus');
        }
    }
}
