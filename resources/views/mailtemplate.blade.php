<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Akun Pengguna PPDB</title>x

   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 style="text-align: center; margin-bottom: 20px;">Data Akun Pengguna PPDB</h3>
                <table class="table">
                    <tr>
                        <th>Nama :</th>
                        <td>{{$empData['name']}}</td>
                    </tr>

                    <tr>
                        <th>Asal Sekolah :</th>
                        <td>{{$empData['instansi']}}</td>
                    </tr>
                    
                    <tr>
                        <th>Email :</th>
                        <td>{{$empData['email']}}</td>
                    </tr>
                </table>
                <p>Merupakan Data akun anda, jika lupa password sikalahkan reset password anda <a href="https://ppdbaceh.edigital.cloud/forgot-password">Reset Password</a></p>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Best Regards,<br>TIM IT PPDB 2024</p>
    </div>
</body>
</html>
