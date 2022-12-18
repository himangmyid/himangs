<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '".$_SESSION['id']."' ");
$d = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
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
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->nama_admin ?>"  required>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                    <input type="text" name="hp" placeholder="No Handphone" class="input-control" value="<?php echo $d->telp_admin ?>" required>
                    <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->email_admin ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->alamat_admin ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                if(isset($_POST['submit'])){

                    $nama   = ucwords($_POST['nama']);
                    $user   = $_POST['user'];
                    $hp     = $_POST['hp'];
                    $email  = $_POST['email'];
                    $alamat = ucwords($_POST['alamat']);

                    $update = mysqli_query($conn, "UPDATE tb_admin SET 
                                nama_admin = '". $nama."',
                                username = '". $user."',
                                telp_admin = '". $hp."',
                                email_admin = '". $email."',
                                alamat_admin = '". $alamat."'
                                WHERE id_admin ='".$d->id_admin."' ");

                                if($update){
                                    echo '<script>alert("Ubah data Berhasil")</script>';
                                    echo '<script>window.location="profil.php"</script>';
                                }else{
                                    'Gagal Update Profil '.mysqli_error($conn);
                                }
                }
                ?>
            </div>
            <h3>Ubah Passwoord</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control"  required>
                    <input type="password" name="pass2" placeholder=" Konfirmasi Password Baru" class="input-control"  required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                </form>
                <?php
                if(isset($_POST['ubah_password'])){

                    $pass1    = $_POST['pass1'];
                    $pass2    = $_POST['pass2'];

                    if($pass2 !=$pass1){
                        echo '<script>alert("Konfirmasi Password Baru tidak Sesuai")</script>';
                    }else{

                        $u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
                                password = '".MD5($pass1)."'
                                WHERE id_admin ='".$d->id_admin."' ");
                        if($u_pass){
                            echo '<script>alert("Ubah data Berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else{
                            'Gagal Update Profil '.mysqli_error($conn);
                        }
                    }
                }
                ?>
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