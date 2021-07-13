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
        $gambar = htmlspecialchars($data["gambar"]);

        // query insert data
        $query = "
        INSERT INTO mahasiswa
        VALUES
        (NULL, '$nrp', '$nama', '$email', '$jurusan', '$gambar')    
        ";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $nrp = htmlspecialchars($data["nrp"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);

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
?>