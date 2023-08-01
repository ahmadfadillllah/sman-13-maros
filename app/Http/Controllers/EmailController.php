<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    //
    public function index($id)
    {

        $siswa = Siswa::join('kelas', 'siswa.kelas_id', 'kelas.id')
            ->join('surat', 'siswa.id', 'surat.siswa_id')
            ->join('nomorsurat', 'surat.nomorsurat_id', 'nomorsurat.id')
            ->select('siswa.*',
            'kelas.id as kelas_id', 'kelas.nama_kelas',
            'nomorsurat.nomor as nomor_surat','nomorsurat.status as statussurat',
            'surat.tgl_panggil')
            ->with('pelanggaran')
            ->where('siswa.id', $id)
            ->first();

        $pelanggaran = Pelanggaran::where('siswa_id', $id)->get();

        return view('email.index', compact('siswa', 'pelanggaran'));
    }
}
