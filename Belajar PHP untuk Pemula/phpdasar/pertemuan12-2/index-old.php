<?php 
    require'functions.php';
    
    $products = query("
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
WHERE product.DRAFT = 0 AND product.AKTIF = 1
ORDER BY product_kelompok.NAMA ASC, product_merk.NAMA ASC, product.DESKRIPSI ASC, product_satuan.NAMA ASC
;
    ");
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
    <h1>Daftar Product</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Kelompok</th>
            <th>Merk</th>
            <th>Kode</th>
            <th>Deskripsi</th>
            <th>Harga Jual</th>
            <th>Satuan</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ( $products as $product ) : ?>

            <tr>
                <td><?= $i ?></td>
                <td><?= $product["kelompok"]; ?></td>
                <td><?= $product["merk"]; ?></td>
                <td><?= $product["kode"]; ?></td>
                <td><?= $product["deskripsi"]; ?></td>
                <td><?= $product["harga_jual"]; ?></td>
                <td><?= $product["satuan"]; ?></td>
            </tr>
        
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>