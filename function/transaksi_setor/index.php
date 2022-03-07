<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <?php require_once 'setor.php' ; ?>

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
        $result = $mysqli->query("SELECT * FROM setor") or die($mysqli->error);
       // pre_r(result);
       ?>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Id Setor</th>
                    <th>Tanggal setor</th>
                    <th>NIN</th>
                    <th>Nama</th>
                    <th>Jenis Sampah</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>NIA</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
        <?php 
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id_setor']; ?></td>
                    <td><?php echo $row['tanggal_setor']; ?></td>
                    <td><?php echo $row['nin']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['jenis_sampah']; ?></td>
                    <td><?php echo $row['berat']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['total']; ?></td>
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
            <label>Id Setor</label>
            <input type="text" name="id_setor" class="form-control" 
                    value="<?php echo $id_setor; ?>" placeholder="Enter id setor">
            </div>
            <div class="form-group">
            <label>Tanggal Setor</label>
            <input type="text" name="tanggal_setor" class="form-control" 
                    value="<?php echo $tanggal_setor; ?>" placeholder="Enter Tanggal">
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
            <label>Jenis Sampah</label>
            <input type="text" name="jenis_sampah" class="form-control" 
                    value="<?php echo $jenis_sampah; ?>"placeholder="Enter Jenis Sampah">
            </div>
            <div class="form-group">
            <label>Berat</label>
            <input type="text" name="berat" class="form-control" 
                    value="<?php echo $berat; ?>" placeholder="Enter Berat">
            </div>
            <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" 
                    value="<?php echo $harga; ?>" placeholder="Enter Harga">
            </div>
            <div class="form-group">
            <label>Total</label>
            <input type="text" name="total" class="form-control" 
                    value="<?php echo $total; ?>" placeholder="Enter Total">
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