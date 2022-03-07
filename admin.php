<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
  else {   
error_reporting(E_ALL | E_STRICT); 
include_once("config.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Admin</title>
		<link rel="stylesheet" href="css/style_2.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway:700" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="../asset/internal/img/img-local/favicon.ico">
		<style>
		  button{
          height: 27px;
          width: 85px;
          background: #8cd91a;
          border-radius: 5px;
          color: #fff;
          font-family: Montserrat;
        }
		</style>
	</head>
	<body>


		<div class="sidebar">
			<ul>
				<li>
					<a href="admin.php?page=data-admin"><span class="fa fa-user" aria-hidden="true"></span>Data Admin</a>
				</li>	
						<?php } ?>

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
				}else{
					include "function/view-admin.php";
				}

				 ?>
			</section>
		</div>
		

	</body>
</html>