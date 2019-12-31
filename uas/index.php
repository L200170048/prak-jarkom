<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
</head>

<?php
    session_start();
    if (isset($_SESSION['admin'])){
        header('Location: admin/index.php');
    }

    error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED);
    $conn = mysqli_connect('localhost','root','','uass');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    if($submit){
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        var_dump($row);

        $cek = mysqli_num_rows($query);

        if($row['status']=='administrator'){
            $_SESSION['admin']=$row['username'];
            $_SESSION['status']='administrator';
            header('Location: admin/index.php');
            
        } elseif($row['status']=='member'){
            $_SESSION['member']=$row['username'];
            $_SESSION['status']='member';
            header('Location: member/index.php');
        } else{
            echo "
                <script>
                    alert('login gagal');
                    document.location = 'index.php';
                </script>
            ";
        }
    }
?>

<body>
    <center>
        <h3>Halaman Login</h3>
        <table>
            <form action="index.php" method='POST'>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username"></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password"></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="submit" value='Login'></td>
                </tr>
            </form>
        </table>
    </center>
</body>
</html>