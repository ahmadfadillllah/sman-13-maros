<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>REPORT PELANGGARAN SISWA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
<style>
    @page { size: A4 }

    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }

    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }

    .text-center {
        text-align: center;
    }
</style>
</head>
<body class="A4">
    <section class="sheet padding-10mm">
        <h1>REPORT PELANGGARAN SISWA</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>NIS</th>
                    <th>NAMA SISWA</th>
                    <th>TGL KEJADIAN</th>
                    <th>JENIS</th>
                    <th>PELANGGARAN</th>
                    <th>KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $item)
                <tr style="text-align: center">
                    <td class="text-center" width="20">{{ $loop->iteration }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{date('d-m-Y H:m', strtotime($item->tgl_kejadian)) }}</td>
                    <td> {{ $item->jenis }} </td>
                    <td> {{ $item->pelanggaran }} </td>
                    <td> {{ $item->ketarangan }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
<script>
    window.print();
</script>
</html>
