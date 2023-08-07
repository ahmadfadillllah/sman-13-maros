<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $siswa = Siswa::count();
        $wali_kelas = WaliKelas::count();
        $user = User::whereNotNull('username')->count();
        if(Auth::user()->role == 'siswa'){
            $siswas = Siswa::where('user_id', Auth::user()->id)->first();
            $pelanggaran = Pelanggaran::where('siswa_id',$siswas->id)->count();
            $detail_pelanggaran = Pelanggaran::where('siswa_id',$siswas->id)->join('siswa', 'pelanggaran.siswa_id', 'siswa.id')->get();
        }else{
            $pelanggaran = Pelanggaran::count();
            $detail_pelanggaran = Pelanggaran::join('siswa', 'pelanggaran.siswa_id', 'siswa.id')->get();
        }
        // dd($detail_pelanggaran);
        return view('dashboard.index', compact('siswa', 'wali_kelas', 'user', 'pelanggaran', 'detail_pelanggaran'));
    }
}
