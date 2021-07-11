<?php 
    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "abcde12345abcde", "phpdasar");

    // ambil / query data dari table mahasiswa
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
    
    //cek error
    // if ( !$result ) {
    //     echo mysqli_error($conn);
    // }

    // ambil data (fetch) mahasiswa dari object result. Saran gunakan mysqli_fetch_row atau mysqli_fetch_assoc

    // mysqli_fetch_row() -> mengembalikan array numerik 
    // $mhs = mysqli_fetch_row($result);
    // var_dump($mhs[1]);

    // mysqli_fetch_assoc() -> mengembalikan array associative 
    // $mhs = mysqli_fetch_assoc($result);
    // var_dump($mhs["jurusan"]);

    // mysqli_fetch_array() -> mengembalikan keduanya
    // $mhs = mysqli_fetch_array($result);
    // var_dump($mhs);

    // mysqli_fetch_object()
    // $mhs = mysqli_fetch_object($result);
    // var_dump($mhs->nama);

    // contoh mysqli_fetch_assoc
    // while( $mhs = mysqli_fetch_assoc($result) ) {
    //     var_dump($mhs);
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No. </th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?= $i = 1; ?>
        <?php while ( $row = mysqli_fetch_assoc($result) ) : ?>

            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="">ubah</a> |
                    <a href="">hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
                <td><?= $row["nrp"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
        
        <?= $i++; ?>
        <?php endwhile; ?>
    </table>
</body>
</html>