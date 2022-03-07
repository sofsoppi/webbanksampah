<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <?php require_once 'process.php' ; ?>

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
        $result = $mysqli->query("SELECT * FROM nasabah") or die($mysqli->error);
       // pre_r(result);
       ?>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>RT</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Saldo</th>
                    <th>Sampah</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
        <?php 
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['rt']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['telepon']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['saldo']; ?></td>
                    <td><?php echo $row['sampah']; ?></td>
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
            <label>Username</label>
            <input type="text" name="username" class="form-control" 
                    value="<?php echo $username; ?>" placeholder="Enter Username">
            </div>
            <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" 
                    value="<?php echo $nama; ?>" placeholder="Enter nama">
            </div>
            <div class="form-group">
            <label>RT</label>
            <input type="text" name="rt" class="form-control" 
                    value="<?php echo $rt; ?>" placeholder="Enter rt">
            </div>
            <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" 
                    value="<?php echo $alamat; ?>" placeholder="Enter alamat">
            </div>
            <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" 
                    value="<?php echo $telepon; ?>"placeholder="Enter telepon">
            </div>
            <div class="form-group">
            <label>email</label>
            <input type="text" name="email" class="form-control" 
                    value="<?php echo $telepon; ?>"placeholder="Enter email">
            </div>
            <div class="form-group">
            <label>Saldo</label>
            <input type="text" name="saldo" class="form-control" 
                    value="<?php echo $saldo; ?>"placeholder="Enter saldo">
            </div>
            <div class="form-group">
            <label>sampah</label>
            <input type="text" name="sampah" class="form-control" 
                    value="<?php echo $sampah; ?>"placeholder="Enter sampah">
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