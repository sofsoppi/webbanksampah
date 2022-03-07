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
        $result = $mysqli->query("SELECT * FROM sampah") or die($mysqli->error);
       // pre_r(result);
       ?>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Jenis sampah</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
        <?php 
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['jenis_sampah']; ?></td>
                    <td><?php echo $row['satuan']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['gambar']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
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
            <label>Jenis Sampah</label>
            <input type="text" name="jenis_sampah" class="form-control" 
                    value="<?php echo $jenis_sampah; ?>" placeholder="Enter jenis sampah">
            </div>
            <div class="form-group">
            <label>Satuam</label>
            <input type="text" name="satuan" class="form-control" 
                    value="<?php echo $satuan; ?>" placeholder="Enter satuan">
            </div>
            <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" 
                    value="<?php echo $harga; ?>" placeholder="Enter harga">
            </div>
            <div class="form-group">
            <label>Gambar</label>
            <input type="text" name="gambar" class="form-control" 
                    value="<?php echo $gambar; ?>" placeholder="Enter gambar">
            </div>
            <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" 
                    value="<?php echo $deskripsi; ?>"placeholder="Enter deskripsi">
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