<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah data</title>
</head>

<?php
    error_reporting(E_ALL ^ E_NOTICE);
    $conn = mysqli_connect('localhost','root','','uass');
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $submit = $_POST['submit'];
    $input = "INSERT INTO mahasiswa (NIM, Nama, Alamat) VALUE ('$nim', '$nama', '$alamat')";
    if($submit){
        mysqli_query($conn, $input);
        echo "
            <script>
                alert('data berhasil ditambahakan');
                document.location='index.php';
            </script>
        ";
    }
?>

<body>
    <center>
        <h3>Tambahkan data mahasiswa</h3>
        <table>
            <form action="form.php" method='POST'>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><input type="text" name='nim' require=''></td>
                </tr>

                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name='nama' require=''></td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input type="text" name='alamat' require=''></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name='submit' value='Tambahkan'></td>
                </tr>
            </form>
        </table>
    </center>
</body>
</html>