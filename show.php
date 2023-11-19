<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data produk</h1>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama produk</th>
                <th>harga</th>
                <th>gambar produk</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require './config/db.php';

                $products = mysqli_query($db_connect,"SELECT * FROM products");
                $no = 1;

                while($row = mysqli_fetch_assoc($products)) {
            ?>
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$row['name'];?></td>
                    <td><?=$row['price'];?></td>
                    <!-- <td><img src="<?=$row['image'];?>" width="100"></td> -->
                    <td><a href="<?=$row['image'];?>" target="_blank">unduh</a></td>
                    <td>
                    // Menampilkan data
echo "<h1>Edit Data Produk</h1>";
echo "<form action='edit.php?id=$id' method='post'>";
echo "<input type='hidden' name='id' value='$row[id]'>";
echo "<input type='text' name='nama' value='$row[nama]' placeholder='Nama'>";
echo "<input type='text' name='price' value='$row[harga]' placeholder='Price'>";
echo "<input type='submit' value='Simpan'>";
echo "</form>";


// Menghapus data
if (isset($_POST["nama"]) && isset($_POST["price"])) {
    $nama = $_POST["nama"];
    $price = $_POST["price"];

    mysqli_query($koneksi, "UPDATE tabel SET nama='$nama', price='$price' WHERE id='$id'");

    header("Location: show.php");
}

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>