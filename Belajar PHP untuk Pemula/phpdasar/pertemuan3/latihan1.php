<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <!-- gini -->
        <!-- <?php 
            for ( $i = 1; $i <= 3; $i++) {
                echo "<tr>";
                for( $j = 1; $j <= 5; $j++ ) {
                    echo "<td>$i,$j</td>";
                }
                echo "</tr>";
            }
        ?> -->

        <!-- jadi gini -->
        <!-- <?php for ( $i = 1; $i <= 3; $i++ ) { ?>
            <tr>
                <?php for( $j = 1; $j <= 5; $j++ ) { ?>
                    <td><?php echo "$i, $j"; ?></td>
                <?php } ?>
            </tr>
        <?php } ?> -->

        <!-- akhire gini -->
        <!-- <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
            <tr>
                <?php for( $j = 1; $j <= 5; $j++ ) : ?>
                    <td><?php echo "$i, $j"; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?> -->

        <!-- https://www.youtube.com/watch?v=9gpAJPWD-xI&list=PLFIM0718LjIUqXfmEIBE3-uzERZPh3vp6&index=5&ab_channel=WebProgrammingUNPAS -->
        <!-- akhire gini 23:25 -->
        <!-- <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
            <tr>
                <?php for( $j = 1; $j <= 5; $j++ ) : ?>
                    <td><?= "$i, $j"; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?> -->

    </table>
</body>
</html>