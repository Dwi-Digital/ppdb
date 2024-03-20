<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
         h4.kop1{
            position: relative;
            top: -40px;
        }
        h3.kop2{
            position: relative;
            top: -60px;
        }
        p.kop3{
            position: relative;
            top: -75px;
            font-size: 12px;
        }
        hr {
            height: 1px;
            background-color: #555555;
            position:relative;
            top:-7em;
            }
         #halaman{
            width:auto;
            height:auto;
            padding-top:30px;
            padding-left:30px;
            padding-right:30px;
            padding-bottom:30px;
        }
    </style>
</head>

<body>
    <div id="halaman"style="page-break-after:always;">
        <center>
            <h4 class="kop1">PEMERINTAH ACEH</h4>
            <h3 class="kop2">D I N A S P E N D I D I K A N</h3>
            <P class="kop3">Jalan Tgk. H. Mohd Daud Beureueh Nomor 22 Banda Aceh Kode Pos 23121 <br>Telepon (0651)
                22620, Faks (0651) 32386 <br> Website : disdik.acehprov.go.id, Email : disdik@acehprov.go.id</P>
        </center>

        <img class="aceh" width="15%" src="{{ asset('storage/images/user'. Auth::user()->avatar) }}"
            style="margin-top:-30px;margin-bottom:-100px;margin-left:180px;">
        <hr />
        <center>
            <h4 class="rp1">RAPOR PENDIDIKAN <br> DATA UMUM SEKOLAH</h4>
        </center>
    </div>

</body>

</html>
