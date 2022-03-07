<?php 
$mysqli = new mysqli('localhost', 'root', '', 'taweb') or die (mysqli_error($mysqli));

$id = 0;
$update = false;
$id_tarik = '';
$tanggal_tarik= '';
$nin= '';
$nama= '';
$saldo= '';
$jumlah_tarik= '';
$nia= '';

if (isset($_POST['save'])){
    $id_tarik = $_POST['id_tarik'];
    $tanggal_tarik = $_POST['tanggal_tarik'];
    $nin = $_POST['nin'];
    $nama = $_POST['nama'];
    $saldo = $_POST['saldo'];
    $jumlah_tarik = $_POST['jumlah_tarik'];
    $nia = $_POST['nia'];

    $mysqli->query("INSERT INTO tarik (id_tarik, tanggal_tarik, nin, nama, saldo, jumlah_tarik, nia) 
                    VALUES('$id_tarik', '$tanggal_tarik', '$nin', '$nama', '$saldo', '$jumlah_tarik', '$nia')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM tarik WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM tarik WHERE id=$id") or die($mysqli->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        $id_tarik = $row['id_tarik'];
        $tanggal_tarik = $row['tanggal_tarik'];
        $nin = $row['nin'];
        $nama = $row['nama'];
        $saldo = $row['saldo'];
        $jumlah_tarik = $row['jumlah_tarik'];
        $nia = $row['nia'];

    }
}   

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $id_tarik = $_POST['id_tarik'];
    $tanggal_tarik = $_POST['tanggal_tarik'];
    $nin = $_POST['nin'];
    $nama = $_POST['nama'];
    $saldo = $_POST['saldo'];
    $jumlah_tarik = $_POST['jumlah_tarik'];
    $nia = $_POST['nia'];

    $mysqli->query("UPDATE data SET id_tarik='$id_tarik', tanggal_tarik='$tanggal_tarik', nin='$nin', nama='$nama', saldo='$saldo', jumlah_tarik='$jumlah_tarik', nia='$nia' WHERE id=$id") or
            die($mysqli->error);

    $SESSION['message'] = "Record has been updates!";
    $SESSION['msg_type'] = "warning";

    header('location: index.php');
}


?>