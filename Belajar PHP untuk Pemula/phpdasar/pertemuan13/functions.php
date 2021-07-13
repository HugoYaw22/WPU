<?php 
    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "abcde12345abcde", "phpdasar");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data) {
        global $conn;

        $nrp = htmlspecialchars($data["nrp"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        // upload gambar
        $gambar = upload();
        if ( !$gambar ) {
            return false;
        }

        // query insert data
        $query = "
        INSERT INTO mahasiswa
        VALUES
        (NULL, '$nrp', '$nama', '$email', '$jurusan', '$gambar')    
        ";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function upload() {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek apakah tidak ada gambar yang di upload
        if ( $error === 4 ) {
            echo "<script>
                alert('pilih gambar terlebih dahulu !');
            </script>";
            return false;
        }

        // cek apakah yang di upload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
            echo "<script>
                alert('yang anda upload bukan gambar !');
            </script>";
            return false;
        }

        // cek jika ukurannya terlalu besar
        if ( $ukuranFile > 2000000 ) {
            echo "<script>
                alert('ukuran gambar terlalu besar !');
            </script>";
            return false;
        }

        // lolos pengecekan, gambar siap di upload
        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    }

    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $nrp = htmlspecialchars($data["nrp"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        
        $gambarLama = htmlspecialchars($data["gambarLama"]);
        // cek apakah user pilih gambar baru atau tidak
        if( $_FILES['gambar']['error'] === 4 ) {
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }

        // query update data
        $query = "
        UPDATE mahasiswa SET
            mahasiswa.nrp = '$nrp',
            mahasiswa.nama = '$nama',
            mahasiswa.email = '$email',
            mahasiswa.jurusan = '$jurusan',
            mahasiswa.gambar = '$gambar'
        WHERE mahasiswa.id = $id
        ";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function cari($keyword) {
        $query = "
        SELECT 
            * 
        FROM mahasiswa
        WHERE 
            mahasiswa.nama LIKE '%$keyword%' OR
            mahasiswa.nrp LIKE '%$keyword%' OR
            mahasiswa.email LIKE '%$keyword%' OR
            mahasiswa.jurusan LIKE '%$keyword%'
        ";

        return query($query);
    }
?>