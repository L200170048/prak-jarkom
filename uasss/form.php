<?php
    $conn=mysqli_connect('localhost','root','','informatika');
    error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MASUKAN DATA MAHASISWA</title>
</head>
<body>
    <center>
        <h3>FORM MAHASISWA</h3>
        <table>
            <form action="form.php" method='POST'>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td> <input type="text" name="nim"> </td>
                </tr>

                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td> <input type="text" name="nama"> </td>
                </tr>

                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td> <input type="radio" name="kelas" value='A'> A  
                         <input type="radio" name='kelas' value='B'> B
                         <input type="radio" name="kelas" value='C'> C
                    </td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td> <input type="text" name="alamat"> </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value='submit'>
                    </td>
                </tr>
            </form>
        </table>

        <?php
            error_reporting(E_ALL ^ E_NOTICE);
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $kelas = $_POST['kelas'];
            $alamat = $_POST['alamat'];
            $submit = $_POST['submit'];
            $input = "INSERT INTO mahasiswa (nim, nama, kelas, alamat) VALUE ('$nim','$nama','$kelas','$alamat')";
            
            if ($submit){
                if($nim==''){
                    echo "nim tidak boleh kosong";
                }elseif($nama==''){
                    echo "nama tidak boleh kosong";
                }elseif($kelas==''){
                    echo "kelas tidak boleh kosong";
                }elseif($alamat==''){
                    echo "alamat tidak boleh kosong";
                }else{
                    mysqli_query($conn, $input);
                    echo "
                        <script>
                            alert('data berhasil dimasukan');
                            document.location.href='admin/index.php';
                        </script>
                    ";
                }
            }
        ?>
    </center>
</body>
</html>