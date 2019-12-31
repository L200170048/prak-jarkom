<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        echo '
            <script>
                alert("anda harus login");
                document.location="../index.php";
            </script>
        ';
    }
?>

<?php
    $conn = mysqli_connect('localhost','root','','uass');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halo Admin</title>
</head>
<body>
    <center>
    anda login sebagai <?php echo $_SESSION['status']; ?> </br>
    <a href="../logout.php">Logout</a>

    <hr>

    <h3>Data Mahasiswa</h3>
    <a href="form.php">Tambah data mahasiswa</a> </br> </br>

    <table border='1'>
        <tr>
            <td>NIM</td>
            <td>Nama</td>
            <td>Alamat</td>
            <td colspan='2' align='center'> Aksi </td>
        </tr>

        <?php
            $cari = "SELECT * FROM mahasiswa order by NIM";
            $hasil_cari = mysqli_query($conn, $cari);
            while($data = mysqli_fetch_array($hasil_cari)){
                echo "
                    <tr>
                        <td> $data[NIM] </td>
                        <td> $data[Nama] </td>
                        <td> $data[Alamat] </td>
                        <td> <a href='update.php?nim=$data[NIM]'> Edit </td>
                        <td> <a href='delete.php?nim=$data[NIM]'> Hapus </td>
                    </tr>
                ";
            }
        ?>
    </table>
    </center>
</body>
</html>