<?php 
// SUPERGLOBAL
// variable global milik php
// merupakan array associative
//var_dump($_SERVER);

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
    ],
    [
        "nama" => "si B", 
        "nrp" => "2345",
        "email" => "sib@anu.com",
        "jurusan" => "Teknik anu",
        "gambar" => "3.jpg"
    ],
    [
        "nama" => "si C", 
        "nrp" => "3456",
        "email" => "sic@anu.com",
        "jurusan" => "Teknik itu",
        "gambar" => "4.jpg"
    ]

];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    
    <ul>
        <?php foreach ( $mahasiswa as $mhs ) : ?>
            <li>
                <a href="latihan2.php?
                    nama=<?= $mhs["nama"]; ?>
                    &nrp=<?= $mhs["nrp"]; ?>
                    &email=<?= $mhs["email"]; ?>
                    &jurusan=<?= $mhs["jurusan"]; ?>
                    &gambar=<?= $mhs["gambar"]; ?>
                "><?= $mhs["nama"]; ?></a>
            </li>
        <?php endforeach; ?>   
    </ul>

</body>
</html>