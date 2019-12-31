<?php
    error_reporting(E_ALL ^ E_NOTICE);
    $conn = mysqli_connect('localhost','root','','uass');
    $nimm = $_GET['nim'];
    $carii = "SELECT * FROM mahasiswa WHERE nim = '$nimm'";
    $hasill = mysqli_query($conn, $carii);
    $dataa = mysqli_fetch_array($hasill);

    if($dataa > 0){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah data</title>
</head>

<body>
    <center>
        <h3>Tambahkan data mahasiswa</h3>
        <table>
            <form action="update.php" method='POST'>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><input type="text" name='nim' value='<?php echo $dataa['NIM']?>'></td>
                </tr>

                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name='nama' value='<?php echo $dataa['Nama']?>'></td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input type="text" name='alamat' value='<?php echo $dataa['Alamat']?>'></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name='submit' value='Ubah'></td>
                </tr>
            </form>
        </table>

        <?php
            }
        ?>

        <?php
            error_reporting(E_ALL ^ E_NOTICE);
            $conn = mysqli_connect('localhost','root','','uass');
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $alamat = $_POST['alamat'];
            $submitt = $_POST['submit'];
            $update = "UPDATE mahasiswa SET NIM='$nim', Nama='$nama', Alamat='$alamat' WHERE NIM='$nim' ";
            if($submitt){
                mysqli_query($conn, $update);
                echo "
                    <script>
                        alert('data berhasil diubah');
                        document.location='index.php';
                    </script>
                ";
            }
        ?>
    </center>
</body>
</html>