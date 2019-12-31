<?php
    error_reporting(E_ALL ^ E_NOTICE);
    $conn = mysqli_connect('localhost','root','','informatika');
    $nim = $_GET['nim'];
    $carii = "SELECT * FROM mahasiswa where nim='$nim'";
    $hasill = mysqli_query($conn, $carii);
    $dataa = mysqli_fetch_array($hasill);
    function active_radio_button($value, $input){
        $result = $value == $input?'checked':'';
        return $result;
    }

    if($dataa > 0){
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Mahasiswa</title>
    </head>
    <body>
        <center>
            <h3>DATA MAHASISWA</h3>
            <table>
                <form  method='POST', action='update.php'>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><input type="text" name='nim' value ='<?php echo $dataa['NIM']?>'></td>
                    </tr>

                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" name="nama" value='<?php echo $dataa['Nama']?>'></td>
                    </tr>

                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="kelas" value='A' <?php echo active_radio_button('A',$dataa['Kelas'])?>>A
                            <input type="radio" name="kelas" value='B' <?php echo active_radio_button('B',$dataa['Kelas'])?>>B 
                            <input type="radio" name="kelas" value='C' <?php echo active_radio_button('C',$dataa['Kelas'])?>>C
                        </td>
                    </tr>

                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><input type="text" name="alamat" value='<?php echo $dataa['Alamat']?>'></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td> <input type="submit" name="submit" value='upadte data'></td>
                    </tr>
                </form>
            </table>

            <?php
                }
            ?>

            <?php
                error_reporting(E_ALL ^ E_NOTICE);
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $kelas = $_POST['kelas'];
                $alamat = $_POST['alamat'];
                $submit = $_POST['submit'];
                $update = "UPDATE mahasiswa SET Nama='$nama', Kelas='$kelas', Alamat='$alamat' where nim='$nim'";

                if($submit){
                    if($nim==''){
                        echo "nim tidak boleh diganti";
                    }elseif($nama==''){
                        echo "nama tidak boleh kosong";
                    }elseif($kelas==''){
                        echo "kelas tidak boleh kosong";
                    }elseif($alamat==''){
                        echo "alamat tidak boleh kosong";
                    }else{
                        mysqli_query($conn, $update);
                        echo "
                            <script>
                                alert('data berhasil diperbarui');
                                document.location.href='admin/index.php';
                            </script>
                        ";
                    }
                }
            ?>
        </center>
    </body>
    </html>
