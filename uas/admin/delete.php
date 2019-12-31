<?php
    error_reporting(E_ALL ^ E_NOTICE);
    $conn= mysqli_connect('localhost','root','','uass');
    $nim=$_GET['nim'];
    $hapus= "DELETE FROM mahasiswa where nim='$nim'";
    $dataa = mysqli_query($conn, $hapus);
    if(data > 0){
        echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href='index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data belum  terhapus');
                document.location.href='index.php';
            </script>
        ";
    } 
?>