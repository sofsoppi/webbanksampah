<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <?php require_once 'tarik.php' ; ?>

    <?php 
    
    if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

    <div class="container">
    <?php 
        $mysqli = new mysqli('localhost','root','','taweb') or die($mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM tarik") or die($mysqli->error);
       // pre_r(result);
       ?>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Id tarik</th>
                    <th>Tanggal tarik</th>
                    <th>NIN</th>
                    <th>Nama</th>
                    <th>Saldo</th>
                    <th>Jumlah Tarik</th>
                    <th>NIA</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
        <?php 
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id_tarik']; ?></td>
                    <td><?php echo $row['tanggal_tarik']; ?></td>
                    <td><?php echo $row['nin']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['saldo']; ?></td>
                    <td><?php echo $row['jumlah_tarik']; ?></td>
                    <td><?php echo $row['nia']; ?></td>
                    
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>"
                            class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id']; ?>"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
        <?php endwhile; ?>

        </table>
    </div>

    <?php 
        function pre_r($array) {
            echo '<pre>' ;
            print_r($array);
            echo '</pre>';
        }
    ?>

    <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
            <label>Id tarik</label>
            <input type="text" name="id_tarik" class="form-control" 
                    value="<?php echo $id_tarik; ?>" placeholder="Enter id tarik">
            </div>
            <div class="form-group">
            <label>Tanggal tarik</label>
            <input type="text" name="tanggal_tarik" class="form-control" 
                    value="<?php echo $tanggal_tarik; ?>" placeholder="Enter Tanggal">
            </div>
            <div class="form-group">
            <label>NIN</label>
            <input type="text" name="nin" class="form-control" 
                    value="<?php echo $nin; ?>" placeholder="Enter Nomor Induk Nasabah">
            </div>
            <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" 
                    value="<?php echo $nama; ?>" placeholder="Enter Nama">
            </div>
            <div class="form-group">
            <label>Saldo</label>
            <input type="text" name="Saldo" class="form-control" 
                    value="<?php echo $saldo; ?>"placeholder="Enter Saldo">
            </div>
            <div class="form-group">
            <label>Jumlah Tarik</label>
            <input type="text" name="jumlah_tarik" class="form-control" 
                    value="<?php echo $jumlah_tarik; ?>" placeholder="Enter jumlah tarik">
            </div>
            <div class="form-group">
            <label>NIA</label>
            <input type="text" name="nia" class="form-control" 
                    value="<?php echo $nia; ?>" placeholder="Enter Nomor Induk Admin">
            </div>
            <div class="form-group">
            <?php 
            if ($update == true);
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            
                <button type="submit" class="btn btn-primary" name="save">Tambah Data</button>
    
            </div>
        </form>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>