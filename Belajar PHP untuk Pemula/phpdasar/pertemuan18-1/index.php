<?php 
    session_start();

    if ( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

    require'functions.php';


    // tombol cari ditekan
    if ( isset($_POST["cari"]) ) {
        $mahasiswa = cari($_POST["keyword"]);
    } else {
        $mahasiswa = cari("");
    }

    var_dump($_POST);

    // pagination
    $jumlahDataPerHalaman = 3;
    $jumlahData = count($mahasiswa);

    if ($jumlahData > 0) {
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    
        $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
        $halamanAktif = ( !is_numeric($halamanAktif) ) ? 1 : $halamanAktif;
        $halamanAktif = ( $halamanAktif < 1 ) ? 1 : $halamanAktif;
        $halamanAktif = ( $halamanAktif > $jumlahHalaman ) ? $jumlahHalaman : $halamanAktif;
        
        $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;
    
        //$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");
    } else {
        $jumlahHalaman = 1;    
        $halamanAktif = 1;
        $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;
    
        //$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");
    }

    // tombol logout ditekan
    if ( isset($_POST["logout"]) ) {
        session_destroy();
        header("Location: login.php");
        exit;
    }
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
    <a href="logout.php">Log Out</a>
    
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>

    <br><br>

    <form action="" method="post">      
        <?php 
            $xkeyword = ( isset($_POST["cari"]) ) ? $_POST["keyword"] : "";
        ?>
        <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian..." autocomplete="off" value="<?= $xkeyword; ?>">
        <button type="submit" name="cari">Cari !</button>
    </form>

    <br>

    <!-- navigasi -->

    <form action="" method="post">
        <?php if( $halamanAktif > 1) : ?>
            <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
        <?php endif; ?>

        <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
            <?php if( $i == $halamanAktif ) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
            <?php else : ?>
                <a type="submit" name="cari" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if( $halamanAktif < $jumlahHalaman) : ?>
            <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
        <?php endif; ?>
    </form>

    <br>

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

        <?php $i = 1; ?>
        <?php foreach ( $mahasiswa as $row ) : ?>

            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
                <td><?= $row["nrp"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
        
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>