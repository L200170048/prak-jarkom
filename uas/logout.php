<?php
    session_start();
    session_unset();
    session_destroy();
?>

<script>
    alert('anda berhasil logout');
    document.location='index.php';
</script>