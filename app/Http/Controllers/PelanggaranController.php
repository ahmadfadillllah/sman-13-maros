<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\NomorSurat;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\Surat;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PelanggaranController extends Controller
{
    //
    public function index()
    {
        $nomor_surat = NomorSurat::where('status', null)->get();
        if(Auth::user()->role == 'admin'){
            $siswa = Siswa::join('kelas', 'siswa.kelas_id', 'kelas.id')
            ->select('siswa.*', 'kelas.id as kelas_id')->with('pelanggaran')
            ->get();
        }else{
            $kelas = Kelas::join('walikelas', 'kelas.id', 'walikelas.kelas_id')->where('user_id', Auth::user()->id)->first();
            $siswa = Siswa::join('kelas', 'siswa.kelas_id', 'kelas.id')
            ->select('siswa.*', 'kelas.id as kelas_id')
            ->where('kelas_id', $kelas->kelas_id)->with('pelanggaran')
            ->get();

        }
        return view('pelanggaran.index', compact('siswa', 'nomor_surat'));
    }

    public function show($id)
    {
        $pelanggaran = Pelanggaran::where('siswa_id', $id)->get();
        $siswa = Siswa::whereId($id)->first();
        return view('pelanggaran.show', compact('pelanggaran', 'siswa'));
    }

    public function insert(Request $request, $siswa_id){
        try {
            Pelanggaran::create([
                'siswa_id' => $siswa_id,
                'pelanggaran' => $request->pelanggaran,
                'tgl_kejadian' => $request->tgl_kejadian,
                'keterangan' => $request->keterangan,
            ]);

            return redirect()->back()->with('success', 'Pelanggaran berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $pelanggaran = Pelanggaran::find($id);
            $pelanggaran->pelanggaran = $request->pelanggaran;
            $pelanggaran->tgl_kejadian = $request->tgl_kejadian;
            $pelanggaran->keterangan = $request->keterangan;
            $pelanggaran->save();

            return redirect()->back()->with('success', 'Pelanggaran berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Pelanggaran gagal diubah');
        }
    }

    public function send(Request $request, $id)
    {
        $request->validate([
            'nomorsurat_id' => 'required',
            'tgl_panggil' => 'required',
        ]);

        $day = date('D', strtotime($request->tgl_panggil));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );

        DB::beginTransaction();
        $siswa = Siswa::whereId($id)->first();
        // dd($siswa);
        try {
            $nomor_surat = NomorSurat::find($request->nomorsurat_id);
            $nomor_surat->status = true;
            $nomor_surat->save();

            Surat::create([
                'siswa_id' => $id,
                'nomorsurat_id' => $request->nomorsurat_id,
                'tgl_panggil' => $request->tgl_panggil,
            ]);

            $token = "PRAnQ7gRVnJM9D7Kb9hdDwbopnRJhpNBZHNZGUjidy7we3TYyN";
            $phone_siswa = $siswa->no_wa;
            $phone_ortu = $siswa->no_wa_ortu;
            $message =
"Assalamualaikum Warahmatullahi Wabarakatuh

*Undangan : Surat Panggilan*

Diharapkan kehadiran Bapak/Ibu *$siswa->orang_tua* dari orang tua siswa a/n *$siswa->nama_siswa* pada :

Hari : ".$dayList[$day]."
Tanggal : ".date('d-m-Y', strtotime($request->tgl_panggil))."
Tempat : Kantor SMA Negeri 13 Maros,
Jl. Taman Safari No. 99 Pucak Kabupaten Maros

Atas perhatiannya kami ucapkan banyak Terimakasih

_Catatan : Undangan dapat diunduh melalui tautan berikut_
_https://sman13maros.com/e-mail/".$id."_

Wassalamu'alaikum Warahmatullahi Wabarakatuh

Mengetahui

Wakasek Kesiswaan";

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.ruangwa.id/api/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'token='.$token.'&number='.$phone_siswa.'&message='.$message,
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.ruangwa.id/api/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'token='.$token.'&number='.$phone_ortu.'&message='.$message,
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            DB::commit();

            return redirect()->back()->with('success', 'Surat berhasil dikirim');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('info', 'Surat gagal dikirim');
        }
    }

    public function send_again(Request $request, $id)
    {
        $day = date('D', strtotime($request->tgl_panggil));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $siswa = Siswa::whereId($id)->first();
        try {
            $token = "PRAnQ7gRVnJM9D7Kb9hdDwbopnRJhpNBZHNZGUjidy7we3TYyN";
            $phone_siswa = $siswa->no_wa;
            $phone_ortu = $siswa->no_wa_ortu;
            $message =
"Assalamualaikum Warahmatullahi Wabarakatuh

*Undangan : Surat Panggilan*

Diharapkan kehadiran Bapak/Ibu *$siswa->orang_tua* dari orang tua siswa a/n *$siswa->nama_siswa* pada :

Hari : ".$dayList[$day]."
Tanggal : ".date('d-m-Y', strtotime($request->tgl_panggil))."
Tempat : Kantor SMA Negeri 13 Maros,
Jl. Taman Safari No. 99 Pucak Kabupaten Maros

Atas perhatiannya kami ucapkan banyak Terimakasih

_Catatan : Undangan dapat diunduh melalui tautan berikut_
_https://sman13maros.com/e-mail/".$id."_

Wassalamu'alaikum Warahmatullahi Wabarakatuh

Mengetahui

Wakasek Kesiswaan";

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.ruangwa.id/api/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'token='.$token.'&number='.$phone_siswa.'&message='.$message,
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.ruangwa.id/api/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'token='.$token.'&number='.$phone_ortu.'&message='.$message,
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            return redirect()->back()->with('success', 'Surat berhasil dikirim');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Surat gagal dikirim');
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            Pelanggaran::whereId($id)->delete();

            return redirect()->back()->with('success', 'Pelanggaran berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Pelanggaran gagal dihapus');
        }
    }
}
