<?php 
	error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT telp_admin, email_admin, alamat_admin FROM tb_admin WHERE id_admin = 2");
    $a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_id = '".$_GET['id']."'  ");
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <!--===== HEADER =====-->
    <header>
        <div class="container">
            <h1><a href="index.php">Himang</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
            </ul>
        </div>
    </header>

 <!-- search -->
 <div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!--===== Detai produk =====-->
	<div class="section">
		<div class="container">
			 <h3>Detail Produk</h3>
			<div class="box">
				<div class="col-2">
					<img src="produk/<?php echo $p->produk_gbr  ?>" width="100%">
				</div>
				<div class="col-2">
					<h4><?php echo $p->produk_nama ?> </h4>
					<h4 class="har">Rp. <?php echo number_format($p->produk_harga)  ?> </h4>
					<p>Deskripsi : <br>
						<?php echo $p->produk_desk ?>
					</p>
					<p><a href="https://api.Whatsapp.com/send?phone=<?php echo $a->telp_admin ?>&text=Hai kak saya tertarik dengan produk anda" target="_blank">Hubungi Via WhatsApp <img src="gbr/wh.png" width="50px"></a></p>
				</div>
			</div>
		</div>
	</div>

	

        <!--===== Footer =====-->
        <div class="footer">
            <div class="container">
                <h4>Alamat</h4>
                    <p><?php echo $a->alamat_admin ?></p>
                        <h4>Email</h4>
                    <p><?php echo $a->email_admin ?></p>
                <h4>WhatsApp</h4>
                    <p><?php echo $a->telp_admin ?></p>
                <small>Copyright &copy; 2022 Himang</small>
            </div>
        </div>
    </body>
</html>