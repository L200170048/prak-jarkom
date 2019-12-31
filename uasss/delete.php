<?php
    error_reporting(E_ALL ^ E_NOTICE);
    $conn = mysqli_connect('localhost','root','','informatika');
    $nim = $_GET['nim'];
    $hapus = "DELETE FROM mahasiswa WHERE nim='$nim'";
    $dataa = mysqli_query($conn,$hapus);
    if($dataa > 0){
        echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href='admin/index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data belum  terhapus');
                document.location.href='admin/index.php';
            </script>
        ";
    }
?>