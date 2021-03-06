<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: admin.php");
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_2.css">
    <title>Berhasil Login</title>
</head>
<body>

<div class="sidebar">
			<ul>
				<li>
					<a href="admin.php?page=data-admin"><span class="fa fa-user" aria-hidden="true"></span>Data Admin</a>
				</li>	

				<li>
					<a href="admin.php?page=data-nasabah"><span class="fa fa-users" aria-hidden="true"></span>Data Nasabah</a>
				</li>
				 	
				<li>
					<a href="admin.php?page=data-sampah"><span class="fa fa-trash" aria-hidden="true"></span>Data Sampah</a>
				</li>
				
				<li>
					<a href="admin.php?page=data-setor"><span class="fa fa-handshake-o" aria-hidden="true"></span>Transaksi Setor</a>
				</li>
				
				<li>
					<a href="admin.php?page=data-tarik"><span class="fa fa-handshake-o" aria-hidden="true"></span>Transaksi Tarik</a>
				</li>

				<li>
					<a href="admin.php?page=data-report"><span class="fa fa-line-chart" aria-hidden="true"></span>Grafik Monitoring</a>
				</li>

				<li>
					<a href="logout.php"><span class="fa fa-sign-out" aria-hidden="true"></span>Logout</a>
				</li>

			</ul>
		</div>


		<div class="box-1">
        <form action="" method="POST" class="login-email">
            <?php echo "<h1>Selamat Datang, " . $_SESSION['username'] ."!". "</h1>"; ?>
 
        </form>
			<section>
	
				<?php 
					if(isset($_GET['page'])){
						$page = $_GET['page'];

					switch ($page) {
						case 'data-admin':
							include "function/dataadmin/index.php";
							break;
						case 'data-nasabah':
							include "function/datanasabah/index.php";
							break;
						case 'data-sampah':
							include "function/datasampah/index.php";
							break;
						case 'data-setor':
							include "function/transaksi_setor/index.php";
							break;
						case 'data-tarik':
							include "function/transaksi_tarik/index.php";
							break;
						case 'data-report':
							include "function/view-report.php";
							break;
						case 'tambah-data-sampah':
							include "function/tambah-sampah.php";
							break;			
						default:
							echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
							break;
					}
				}
				 ?>
			</section>
		</div>
		

</body>
</html>


