
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan</title>
    <style>
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
        @page{
            size:A4;
            width:210mm;
            height:279mm;
            margin-left:3rem;
            margin-top:3rem;
            margin-bottom:3rem;
            margin-right:3rem;
            transform:scale(72%);
        }
        body{
            font-family:Arial, Helvetica, sans-serif;
        }
        table{
            page-break-inside:auto
        }
        tr{
            page-break-inside:avoid;
            page-break-after:auto
        }
        header{
            border:1px solid #000;
        }
        section{
            width:210mm
        }
		.rotate{
			transform: rotate(-90deg);
		}
		.text-center{
			text-align: center;
		}
		.p05{
			padding:.2rem;
		}
        body{
            width:210mm;
            height:279mm;
            margin:0 auto;
            /* border:.1rem solid rgba(0,0,0,0.35); */
			border-bottom:none;
        }
        header{
            width:100%;
            display:flex;
            justify-content:flex-start;
            /* border:1px solid #000; */
        }
        .logo{
            width:100px;
            height:auto;
            border-right:1px solid #000;
            padding:.3rem;
        }
        .potong{
            page-break-after: always;
        }
        img{
            width:100%;
            height:100%;
            object-fit:cover;
        }
        .kop{
            padding:.3rem;
            align-self:center;
        }
        .kop-text{
            justify-content:center;
            align-items:center;
            align-content:center;
            text-align:center;
            font-size:smaller;
        }
        .info{
            border-left:1px solid #000;
            border-right:1px solid #000;
			border-collapse:collapse;
            flex-grow:1;
            padding:.3rem;
        }
        .code{
            display:flex;
            flex-direction:column;
            font-size:34px;
            flex-basis:15%;
            padding:0;
        }
        .code div:first-child{
            width:100%;
            background:#000;
            color:#fff;
            text-align:center;
            padding:.5rem;
        }
        .code div:last-child{
            text-align:center;
            width:100%;
            padding:.5rem;
        }
        .title{
            font-size:16pt;
            font-weight:bold;
        }
        .bg-dark{
            background:#000;
            color:#fff;
            padding:.5rem;
            text-align:center;
        }
		.bordered{
			border:1px solid black;
			border-collapse:collapse;
			padding:.2rem;
			box-sizing: border-box;
		}
        .border-top{
            border-top:.1rem solid rgba(0,0,0,0.45);
			border-collapse:collapse;
			box-sizing: border-box;
        }
        .border-bottom{
            border-bottom:.1rem solid rgba(0,0,0,0.45);
			border-collapse:collapse;
			box-sizing: border-box;
        }
        .border-left{
            border-left:.1rem solid rgba(0,0,0,0.45);
			border-collapse:collapse;
			box-sizing: border-box;
        }
        .border-right{
            border-right:.1rem solid rgba(0,0,0,0.45);
			border-collapse:collapse;
			box-sizing: border-box;
        }
        .flex{
            display:flex;
        }
        .flex .basis50{
            flex-basis:50%;
        }
        .col-2{
            display:flex;
            flex-basis:50%;
        }
        ul li:not(nth-child(1)){
            padding:.3rem;
        }
        ul li{
        list-style:none;
        }
        .basis50 ul li:first-child{
            border-bottom:1px solid #000;
            padding:.3rem;
        }
        table {
            border:1px solid #000;
            border-collapse: collapse;
            /* font-size: x-small; */
        }
        tr td{
            border:none solid #000;
            border-collapse: collapse;
        }
        #content > tr td{
            width:20px;
        }
        .info table > tr td{
            width:20px;
        }
        td{
            padding:.3rem
        }
    </style>
</head>
    <body>
        <div class="potong">
            <table width="100%" style="table-layout:fixed;border:none">
                <tr style="text-align:center;border:none">
                    <td colspan="1" style="border:none" rowspan="4">
                        <img src="{{ asset('logo_sulsel.png') }}" alt="" style="width: 80px;">
                    </td>
                    <td colspan="7" style="border:none;text-align:center;"><h2>PEMERINTAH PROVINSI SULAWESI SELATAN</h2></td>
                    <td colspan="1" style="border:none" rowspan="4">
                        <img src="{{ asset('logo.png') }}" alt="" style="width: 80px;">
                    </td>
                </tr>
                <tr style="text-align:center;border:none">
                    <td colspan="7" style="border:none"><h2>DINAS PENDIDIKAN UPT. SMA NEGERI 13 MAROS</h2></td>
                </tr>
                <tr style="text-align:center;border:none">
                    <td colspan="7" style="border:none;font-size: 10pt">Alamat : Jl. Taman Safari No.99 Desa Pucak Kec. Tompobulu Kab. Maros Kode Pos 90553</td>
                </tr>
                <tr style="text-align:center;border:none">
                    <td colspan="7" style="border:none;font-size: 10pt">Email : aalmarusy@yahoo.co.id website:http://www.sman13maros.sch.id</td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="9" style="border:none;"><hr style="border:2px solid #000"></td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr>
                    <td colspan="1" style="border:none;">Nomor</td>
                    <td colspan="8" style="border:none;">: {{ $siswa->nomor_surat }}</td>
                </tr>
                <tr>
                    <td colspan="1" style="border:none;">Hal</td>
                    <td colspan="8" style="border:none;">: -</td>
                </tr>
                <tr>
                    <td colspan="1" style="border:none;">Perihal</td>
                    <td colspan="8" style="border:none;">: Panggilan Orang Tua Siswa</td>
                </tr>
                <tr style="height:40px;"></tr>
                <tr>
                    <td colspan="9" style="border:none;">Kepada</td>
                </tr>
                <tr>
                    <td colspan="9" style="border:none;">Yth. Bapak/Ibu/Orang Tua/Wali Siswa :</td>
                </tr>
                <tr>
                    <td colspan="1" style="border:none;padding-left:20px;">Nama</td>
                    <td colspan="8" style="border:none;padding-left:30px;">: {{ $siswa->nama_siswa }}</td>
                </tr>
                <tr>
                    <td colspan="1" style="border:none;padding-left:20px;">NIS</td>
                    <td colspan="8" style="border:none;padding-left:30px;">: {{ $siswa->nis }}</td>
                </tr>
                <tr>
                    <td colspan="1" style="border:none;padding-left:20px;">Kelas</td>
                    <td colspan="8" style="border:none;padding-left:30px;">: {{ $siswa->kelas->nama_kelas }}</td>
                </tr>
                <tr>
                    <td colspan="9" style="border:none;">Dengan Hormat, </td>
                </tr>
                <tr>
                    <td colspan="9" style="border:none;">Bersama ini, megundang Bapak/Ibu/Orang Tua/Wali Siswa untuk datang di SMA Negeri 13 Maros, Untuk membicarakan masalah yang menyangkut anak bapak/ibu selaku siswa kami, pada :</td>
                </tr>
                <tr>
                    <td colspan="1" style="border:none;padding-left:20px;">Hari/Tanggal</td>
                    <td colspan="8" style="border:none;padding-left:30px;">: {{ date('l', strtotime($siswa->tgl_panggil)) }}, {{ date('d-m-Y', strtotime($siswa->tgl_panggil)) }}</td>
                </tr>
                <tr>
                    <td colspan="1" style="border:none;padding-left:20px;">Waktu</td>
                    <td colspan="8" style="border:none;padding-left:30px;">: {{ date('H:m', strtotime($siswa->tgl_panggil)) }}</td>
                </tr>
                <tr>
                    <td colspan="1" style="border:none;padding-left:20px;">Bertempat</td>
                    <td colspan="8" style="border:none;padding-left:30px;">: Kantor SMA Negeri 13 Maros</td>
                </tr>
                <tr>
                    <td colspan="1" style="border:none;padding-left:20px;"></td>
                    <td colspan="8" style="border:none;padding-left:30px;">&nbsp;&nbsp;Jl. Taman Safari No. 99 Pucak Kabupaten Maros</td>
                </tr>
                <tr>
                    <td colspan="9" style="border:none;">Sehubungan pentingnya masalah tersebut maka kehadiran Bapak/Ibu/Orang Tua/Wali Siswa sangat kami harapkan demi untuk kepentingan anak didik kita dimasa sekarang dan dimasa yang akan datang.</td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr>
                <tr>
                    <td colspan="9" style="border:none;">Atas perhatian dan kerjasama yang baik diucapkan terima kasih.</td>
                </tr>
            </table>

            <table width="100%" style="table-layout:fixed;border:none">
                <tr style="height:20px;"></tr>
                <tr style="text-align: center;">
                    <td colspan="4" style="border:none"></td>
                    <td style="border:none"></td>
                    <td colspan="4" style="border:none">Maros, {{ date("d F Y") }}</td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="4" style="border:none"></td>
                    <td style="border:none"></td>
                    <td colspan="4" style="border:none">Wakasek Kesiswaan,</td>
                </tr>
                <tr style="height:80px;"></tr>
                <tr style="text-align: center;">
                    <td colspan="4" valign="bottom" style="border:none"></td>
                    <td style="border:none"></td>
                    <td colspan="4" valign="bottom" style="border:none">Susanty Dian Sari M.Nur, SE</td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="4" valign="bottom" style="border:none"></td>
                    <td style="border:none"></td>
                    <td colspan="4" valign="bottom" style="border:none">NIP : 198103172009042002</td>
                </tr>
            </table>
        </div>

        <div class="potong">
            <table width="100%" style="table-layout:fixed;border:none">
                <tr style="text-align:center;border:none">
                    <td colspan="1" style="border:none" rowspan="4">
                        <img src="{{ asset('logo_sulsel.png') }}" alt="" style="width: 80px;">
                    </td>
                    <td colspan="7" style="border:none;text-align:center;"><h2>PEMERINTAH PROVINSI SULAWESI SELATAN</h2></td>
                    <td colspan="1" style="border:none" rowspan="4">
                        <img src="{{ asset('logo.png') }}" alt="" style="width: 80px;">
                    </td>
                </tr>
                <tr style="text-align:center;border:none">
                    <td colspan="7" style="border:none"><h2>DINAS PENDIDIKAN UPT. SMA NEGERI 13 MAROS</h2></td>
                </tr>
                <tr style="text-align:center;border:none">
                    <td colspan="7" style="border:none;font-size: 10pt">Alamat : Jl. Taman Safari No.99 Desa Pucak Kec. Tompobulu Kab. Maros Kode Pos 90553</td>
                </tr>
                <tr style="text-align:center;border:none">
                    <td colspan="7" style="border:none;font-size: 10pt">Email : aalmarusy@yahoo.co.id website:http://www.sman13maros.sch.id</td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="9" style="border:none;"><hr style="border:2px solid #000"></td>
                </tr>
                <tr>
                    <td colspan="9" style="border:none;text-align:center;"><h3>SURAT PERJANJIAN</h3></td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr>
                    <td colspan="1" style="border:none;">Nomor</td>
                    <td colspan="8" style="border:none;">: {{ $siswa->nomor_surat }}</td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr>
                    <td colspan="9" style="border:none;">Yang bertanda tangan dibawah ini saya :</td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr>
                    <td colspan="2" style="border:none;padding-left:20px;">Nama</td>
                    <td colspan="8" style="border:none;padding-left:30px;">: {{ $siswa->nama_siswa }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none;padding-left:20px;">Tempat/Tgl Lahir</td>
                    <td colspan="8" style="border:none;padding-left:30px;">: {{ $siswa->tempat_lahir }}, {{ date('d-m-Y', strtotime($siswa->tanggal_lahir)) }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none;padding-left:20px;">Kelas</td>
                    <td colspan="8" style="border:none;padding-left:30px;">: {{ $siswa->kelas->nama_kelas }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none;padding-left:20px;">NIS</td>
                    <td colspan="8" style="border:none;padding-left:30px;">: {{ $siswa->nis }}</td>
                </tr>

                <tr>
                    <td colspan="9" style="border:none;">Pengakuan: Telah melanggar peraturan dan tata tertib sekolah/madrasah berupa:</td>
                </tr>
                @foreach ($pelanggaran as $item)
                    <tr>
                        <td colspan="9" style="border:none;">{{ $loop->iteration }}, {{ $item->pelanggaran }} ({{ $item->keterangan }})</td>
                    </tr>
                @endforeach
                <tr style="height:20px;"></tr>
                <tr>
                    <td colspan="9" style="border:none;"><b>BERJANJI</b></td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr>
                    <td colspan="9" style="border:none;">1.	Akan mentaati segala peraturan dan tata tertib yang berlaku di SMA NEGERI 13 MAROS</td>
                </tr>
                <tr>
                    <td colspan="9" style="border:none;">2.	Akan menjaga nama baik diri sendiri, madrasah, keluarga, masyarakat, agama, dan tidak akan melakukan perbuatan-perbuatan yang tidak terpuji.</td>
                </tr>
                <tr>
                    <td colspan="9" style="border:none;">3.	Tidak akan mengulangi kesalahan tersebut diatas dimasa-masa mendatang.</td>
                </tr>
                <tr style="height:20px;"></tr>
                <tr>
                    <td colspan="9" style="border:none;"><b>SANKSI</b></td>
                </tr>
                <tr>
                    <td colspan="9" style="border:none;">Bila ternyata dikemudian hari setelah diadakan perjanjian kami melanggar salah satu poin diatas kami sanggup dikeluarkan dari SMA NEGERI 13 MAROS</td>
                </tr>
                <tr>
                    <td colspan="9" style="border:none;">Demikian perjanjian ini saya buat dalam keadaan sadar dan tidak ada unsur paksaan dari pihak lain.</td>
                </tr>
            </table>

            <table width="100%" style="table-layout:fixed;border:none">
                <tr style="height:20px;"></tr>
                <tr style="text-align: center;">
                    <td colspan="4" style="border:none"></td>
                    <td style="border:none"></td>
                    <td colspan="4" style="border:none">Maros, {{ date("d F Y") }}</td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="4" style="border:none"></td>
                    <td style="border:none"></td>
                    <td colspan="4" style="border:none">Mengetahui,</td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="4" style="border:none"></td>
                    <td style="border:none"></td>
                    <td colspan="4" style="border:none">Kepala Sekolah</td>
                </tr>
                <tr style="height:40px;"></tr>
                <tr style="text-align: center;">
                    <td colspan="4" valign="bottom" style="border:none"></td>
                    <td style="border:none"></td>
                    <td colspan="4" valign="bottom" style="border:none">(.................)</td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="4" style="border:none">Yang Membuat Perjanjian</td>
                    <td style="border:none"></td>
                    <td colspan="4" style="border:none">Mengetahui,</td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="4" style="border:none"></td>
                    <td style="border:none"></td>
                    <td colspan="4" style="border:none">Orang tua/Wali siswa</td>
                </tr>
                <tr style="height:40px;"></tr>
                <tr style="text-align: center;">
                    <td colspan="4" valign="bottom" style="border:none">( {{ $siswa->nama_siswa }} )</td>
                    <td style="border:none"></td>
                    <td colspan="4" valign="bottom" style="border:none">( {{ $siswa->orang_tua }} )</td>
                </tr>
            </table>
        </div>
    </body>
    <script>
        window.print();
    </script>
</html>
