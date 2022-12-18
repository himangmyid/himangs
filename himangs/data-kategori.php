<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
    <!--===== HEADER =====-->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Himang</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>
    <!--===== KONTEN =====-->
    <div class="section">
        <div class="container">
            <h3>Data Kategori</h3>
            <div class="box">
                <p><a href="tambah-kategori.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px" >No</th>
                            <th>Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
                        if(mysqli_num_rows($kategori) > 0){
                        while($row = mysqli_fetch_array($kategori)){
                        ?>
                    <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['kategori_nama'] ?></td>
                            <td><a href="edit-kategori.php?id=<?php echo $row['kategori_id'] ?>">Edit</a> || <a href="proses-hapus.php?idk=<?php echo $row['kategori_id'] ?>" onclick="return confirm ('Apakah Sudah Yakin Hapus')">Hapus</a></td>
                        </tr>
                    <?php }  }else{ ?>
                    <tr>
                        <td colspan="8">Tidak Ada Data Kategori</td>
                    </tr>
                    <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!--===== FOOTER =====-->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 Himang</small>
        </div>
    </footer>
</body>

</html>