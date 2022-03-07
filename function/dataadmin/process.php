<?php 
$mysqli = new mysqli('localhost', 'root', '', 'taweb') or die (mysqli_error($mysqli));

$id = 0;
$update = false;
$username = '';
$nama= '';
$telepon= '';
$email= '';

if (isset($_POST['save'])){
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];


    $mysqli->query("INSERT INTO users (username, nama, telepon, email) 
                    VALUES('$username', '$nama', '$telepon', '$email')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM users WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM users WHERE id=$id") or die($mysqli->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        $username = $row['username'];
        $nama = $row['nama'];
        $telepon = $row['telepon'];
        $email = $row['email'];
    }
}   

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];


    $mysqli->query("UPDATE data SET username='$username', nama='$nama', telepon='$telepon', email='$email' WHERE id=$id") or
            die($mysqli->error);

    $SESSION['message'] = "Record has been updates!";
    $SESSION['msg_type'] = "warning";

    header('location: index.php');
}


?>