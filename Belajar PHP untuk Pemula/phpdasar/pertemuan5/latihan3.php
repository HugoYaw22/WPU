<?php 
$mahasiswa = [
    ["Hugo YAW", "0461419371", "Teknik Informatika", "hugoyaw22@gmail.com"],
    ["Si A", "123456", "Teknik Informatika", "sia@gmail.com"],
    ["Si B", "789012", "Teknik Informatika", "sib@gmail.com"]
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

    <?php foreach( $mahasiswa as $mhs ) : ?>
    <ul>
        <li>Nama : <?php echo $mhs[0]; ?></li>
        <li>NRP : <?php echo $mhs[1]; ?></li>
        <li>Jurusan : <?php echo $mhs[2]; ?></li>
        <li>Email : <?php echo $mhs[3]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>