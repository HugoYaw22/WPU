<?php 
    // koneksi ke database
    $conn = mysqli_connect("doctoraccounting06.com", "da2_karman2", "abcde12345abcde", "da2_karman2");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function cari($keyword) {
        $query = "
    SELECT
        product.RECNO 'recno',
        product_kelompok.NAMA 'kelompok',
        product_merk.NAMA 'merk',
        product.ID 'kode',
        product.DESKRIPSI 'deskripsi',
        product.HARGA_JUAL 'harga_jual',
        product_satuan.NAMA 'satuan'
    FROM product
    LEFT JOIN product_kelompok ON product_kelompok.RECNO = product.KELOMPOK_RECNO
    LEFT JOIN product_merk ON product_merk.RECNO = product.MERK_RECNO
    LEFT JOIN product_satuan ON product_satuan.RECNO = product.SATUAN_RECNO
    WHERE (product.DRAFT = 0 AND product.AKTIF = 1) AND (
        product_kelompok.NAMA LIKE '%$keyword%' OR
        product_merk.NAMA LIKE '%$keyword%' OR
        product.ID LIKE '%$keyword%' OR
        product.DESKRIPSI LIKE '%$keyword%' OR
        product_satuan.NAMA LIKE '%$keyword%'
    )
    ORDER BY product_kelompok.NAMA ASC, product_merk.NAMA ASC, product.DESKRIPSI ASC, product_satuan.NAMA ASC
        ";

        return query($query);
    }
?>