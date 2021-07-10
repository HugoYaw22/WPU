<?php 
    // $mahasiswa = [
    //     ["Hugo YAW", "0461419371", "Teknik Informatika", "hugoyaw22@gmail.com"],
    //     ["Si A", "123456", "Teknik Informatika", "sia@gmail.com"],
    //     ["Si B", "789012", "Teknik Informatika", "sib@gmail.com"]
    // ];

    // array associative
    // definisinya sama seperti array numerik, kecuali
    // key-nya adalah string yang kita buat sendiri

    $mahasiswa = [
        [
            "nama" => "Siapa", 
            "nrp" => "0461419371",
            "email" => "anu@anu.com",
            "jurusan" => "Teknik Informatika",
            "gambar" => "1.jpg"
        ],
        [
            "nama" => "si A", 
            "nrp" => "1234",
            "email" => "sia@anu.com",
            "jurusan" => "Teknik Industri",
            "gambar" => "2.jpg"
        ]

    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>
                <img src="img/<?= $mhs["gambar"] ?>">
            </li>
            <li>Nama : <?= $mhs["nama"]; ?></li>
            <li>NRP : <?= $mhs["nrp"]; ?></li>
            <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
            <li>Email : <?= $mhs["email"]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>