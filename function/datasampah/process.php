<?php 
$mysqli = new mysqli('localhost', 'root', '', 'taweb') or die (mysqli_error($mysqli));

$id = 0;
$update = false;
$jenis_sampah = '';
$satuan= '';
$harga= '';
$gambar= '';
$deskripsi= '';

if (isset($_POST['save'])){
    $jenis_sampah = $_POST['jenis_sampah'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $deskripsi = $_POST['deskripsi'];

    $mysqli->query("INSERT INTO sampah (jenis_sampah, satuan, harga, gambar, deskripsi) 
                    VALUES('$jenis_sampah', '$satuan', '$harga', '$gambar', '$deskripsi')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM sampah WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM sampah WHERE id=$id") or die($mysqli->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        $jenis_sampah = $row['jenis_sampah'];
        $satuan = $row['satuan'];
        $harga = $row['harga'];
        $gambar = $row['gambar'];
        $deskripsi = $row['deskripsi'];
    }
}   

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $jenis_sampah = $_POST['jenis_sampah'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $deskripsi = $_POST['deskripsi'];

    $mysqli->query("UPDATE data SET jenis_sampah='$jenis_sampah', satuan='$satuan', harga='$harga', gambar='$gambar', deskripsi='$deskripsi' WHERE id=$id") or
            die($mysqli->error);

    $SESSION['message'] = "Record has been updates!";
    $SESSION['msg_type'] = "warning";

    header('location: index.php');
}


?>