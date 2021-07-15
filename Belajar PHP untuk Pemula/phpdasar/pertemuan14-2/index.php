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

    // tombol cari ditekan
    if ( isset($_POST["cari"]) ) {
        $products = cari(htmlspecialchars(mysqli_real_escape_string($conn, $_POST["keyword"])));
    }

    if ( isset($_POST["keyword"]) ) {
        $last_keyword = $_POST["keyword"];
    } else {
        $last_keyword = '';
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <title>Hello, world!</title>
    </head>

    <body>
    <h1 class="text-center py-3">Price List</h1>

    <div class="container">

        <!-- <form action="" method="post">
            <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian..." autocomplete="off">
            <button type="submit" name="cari">Cari !</button>
        </form> -->
        
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-6">
                    <input type="search" name="keyword" class="form-control form-control-sm" autofocus placeholder="masukan keyword pencarian..." aria-controls="report-table" size="40" autocomplete="off" style="height: 38px;" value="<?= $last_keyword; ?>">
                </div>

                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary" name="cari">Cari !</button>
                </div>    
            </div>
        </form>

        <br>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="report-table" class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Kelompok</th>
                                        <th>Merk</th>
                                        <th>Kode</th>
                                        <th>Deskripsi</th>
                                        <th>Harga Jual</th>
                                        <th>Satuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                    <?php foreach ( $products as $product ) : ?>

                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $product["kelompok"]; ?></td>
                                            <td><?= $product["merk"]; ?></td>
                                            <td><?= $product["kode"]; ?></td>
                                            <td><?= $product["deskripsi"]; ?></td>
                                            <td class="text-end"><?= number_format($product["harga_jual"], 0, '.', ','); ?></td>
                                            <td><?= $product["satuan"]; ?></td>
                                        </tr>
                                    
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    </body>
</html>