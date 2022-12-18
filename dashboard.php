<?php
include 'db.php';
    session_start();

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
    <title>Dashboard</title>
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
            <h3>Dashboard</h3>
            <div class="box" align="center">
                <P>Selamat Datang <?php echo $_SESSION['a_global']->nama_admin ?> di Toko Online</P>
                <img  src="gbr/admin.jpg" alt="admin"  
 width="20%"  alt="admin" > 
 <P align="center">Benidiktus Himang</P>
 <P align="center">(221019900013)</P>
 <P align="center">Pertukaran Mahasiswa merdeka 2 Inbound Universitas Pamulang</P>
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