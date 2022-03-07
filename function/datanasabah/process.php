<?php 
$mysqli = new mysqli('localhost', 'root', '', 'taweb') or die (mysqli_error($mysqli));

$id = 0;
$update = false;
$username = '';
$nama= '';
$rt= '';
$alamat= '';
$telepon= '';
$email= '';
$saldo= '';
$sampah= '';

if (isset($_POST['save'])){
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $rt = $_POST['rt'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $telepon = $_POST['email'];
    $telepon = $_POST['saldo'];
    $telepon = $_POST['sampah'];

    $mysqli->query("INSERT INTO nasabah (username, nama, rt, alamat, telepon, email, saldo, sampah) 
                    VALUES('$username', '$nama', '$rt', '$alamat', '$telepon', '$email', '$saldo', '$sampah')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM nasabah WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM nasabah WHERE id=$id") or die($mysqli->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        $username = $row['username'];
        $nama = $row['nama'];
        $rt = $row['rt'];
        $alamat = $row['alamat'];
        $telepon = $row['telepon'];
        $telepon = $row['email'];
        $telepon = $row['saldo'];
        $telepon = $row['sampah'];
    }
}   

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $rt = $_POST['rt'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $telepon = $_POST['email'];
    $telepon = $_POST['saldo'];
    $telepon = $_POST['sampah'];

    $mysqli->query("UPDATE data SET username='$username', nama='$nama', rt='$rt', alamat='$alamat', telepon='$telepon', email='$email', saldo='$saldo', sampah='$sampah' WHERE id=$id") or
            die($mysqli->error);

    $SESSION['message'] = "Record has been updates!";
    $SESSION['msg_type'] = "warning";

    header('location: index.php');
}


?>