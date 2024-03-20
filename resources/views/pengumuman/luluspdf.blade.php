<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @foreach ($lulus as $p)
    <title>{{$p->nama_siswa}} - {{$p->nisn}}</title>
    @endforeach

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .certificate {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(226, 57, 57, 0.1);
            text-align: center;
            width: 80%;
            margin: auto;
            position: relative;
            top: 2.5em;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 24px;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        h3 {
            font-size: 20px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h5 {
            font-size: 25px;
        }
    </style>
</head>

<body>
    @foreach ($lulus as $p)
        <div class="certificate">
            <h1>Congratulations</h1>
            <p>diberikan kepada</p>
            <h2><b> {{ $p->nama_siswa}} </b></h2>
            <p>Lulus seleksi pendaftran PPDB</p>
            <h3> {{ $p->sekolah_lulus }} </h3>
            <p>Tanggal Lulus: {{ \Carbon\Carbon::parse($p->created_at)->translatedFormat('l, j F Y') }}</p>
            <hr style="margin-top: 2em;margin-bottom:1em;">

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h5 class="mb-2">Keterangan Kelulusan</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>SEKOLAH LULUS</th>
                                        <th>BOBOT WILAYAH</th>
                                        <th>NISN</th>
                                        <th>NAMA SISWA</th>
                                        <th>UMUR</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{$p->sekolah_lulus}}</td>
                                        <td>{{$p->bobot}}</td>
                                        <td>{{$p->nisn}}</td>
                                        <td>{{$p->nama_siswa}}</td>
                                        <td>{{$p->umur}}</td>
                                        <td><span style="color: green;"><b>LULUS</b></span></td>
                                    </tr>
                                    <!-- Tambahkan baris tabel sesuai kebutuhan Anda -->
                                </tbody>
                            </table>
                            <p>Kelulusan dilihat dari <b>BOBOT Desa Tinggal</b> dan <b>Umur CPD</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</body>

</html>
