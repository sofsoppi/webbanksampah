<?php 



$mysqli = new mysqli('localhost', 'root', '', 'taweb') or die (mysqli_error($mysqli));

$id = 0;
$update = false;
$id_setor = '';
$tanggal_setor= '';
$nin= '';
$nama= '';
$jenis_sampah= '';
$berat= '';
$harga= '';
$total= '';
$nia= '';

if (isset($_POST['save'])){
    $id_setor = $_POST['id_setor'];
    $tanggal_setor = $_POST['tanggal_setor'];
    $nin = $_POST['nin'];
    $nama = $_POST['nama'];
    $jenis_sampah = $_POST['jenis_sampah'];
    $berat = $_POST['berat'];
    $harga = $_POST['harga'];
    $total = $_POST['total'];
    $nia = $_POST['nia'];

    $mysqli->query("INSERT INTO setor (id_setor, tanggal_setor, nin, nama, jenis_sampah, berat, harga, total, nia) 
                    VALUES('$id_setor', '$tanggal_setor', '$nin', '$nama', '$jenis_sampah', '$berat', '$harga', '$total', '$nia')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM setor WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM setor WHERE id=$id") or die($mysqli->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        $id_setor = $row['id_setor'];
        $tanggal_setor = $row['tanggal_setor'];
        $nin = $row['nin'];
        $nama = $row['nama'];
        $jenis_sampah = $row['jenis_sampah'];
        $berat = $row['berat'];
        $harga = $row['harga'];
        $total = $row['total'];
        $nia = $row['nia'];

    }
}   

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $id_setor = $_POST['id_setor'];
    $tanggal_setor = $_POST['tanggal_setor'];
    $nin = $_POST['nin'];
    $nama = $_POST['nama'];
    $jenis_sampah = $_POST['jenis_sampah'];
    $berat = $_POST['berat'];
    $harga = $_POST['harga'];
    $total = $_POST['total'];
    $nia = $_POST['nia'];

    $mysqli->query("UPDATE data SET id_setor='$id_setor', tanggal_setor='$tanggal_setor', nin='$nin', nama='$nama', jenis_sampah='$jenis_sampah', berat='$berat', harga='$harga', total='$total', nia='$nia' WHERE id=$id") or
            die($mysqli->error);

    $SESSION['message'] = "Record has been updates!";
    $SESSION['msg_type'] = "warning";

    header('location: index.php');
}


?>