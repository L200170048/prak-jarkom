<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        echo '
            <script>
                alert("anda harus login");
                document.location="../loginn.php";
            </script>
        ';
    }
?>

<?php
    error_reporting(E_ALL ^ E_NOTICE);
    $conn = mysqli_connect('localhost','root','','informatika');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman admin</title>

</head>
<body>
    <center>
        <h3>INI HALAMAN ADMIN</h3>
        Anda login sebagai <?php echo $_SESSION['status'] ?> </br>
        <a href="../logout.php">Logout</a>    
    
    <hr>

    <h3>DATA MAHASISWA</h3>
        <a href="../form.php"> Tambah data mahasiswa </a> </br> </br>
        <table border='5'>
            <tr>
                <td>NIM</td>
                <td>Nama</td>
                <td>Kelas</td>
                <td>Alamat</td>
                <td colspan='2' align='center'>Aksi</td>
            </tr>

            <?php
            $cari = "SELECT * from mahasiswa order by nim";
            $hasil = mysqli_query($conn, $cari);
            while($data=mysqli_fetch_array($hasil)){
                echo "
                    <tr>
                        <td> $data[NIM] </td>
                        <td> $data[Nama] </td>
                        <td> $data[Kelas] </td>
                        <td> $data[Alamat] </td>
                        <td> <a href='../update.php?nim=$data[NIM]'> Edit </td>
                        <td> <a href='../delete.php?nim=$data[NIM]'> hapus </td>
                    </tr>
                ";
            }
        ?>
        </table>
        
    </center>
</body>
</html>