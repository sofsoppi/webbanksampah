<?php 
 
session_start();
session_destroy();
 
header("Location: index.php");
 
?>

<div class="container-logout">
        <form action="" method="POST" class="login-email">
            <?php echo "<h1>Selamat Datang, " . $_SESSION['username'] ."!". "</h1> "; ?>

        </form>
