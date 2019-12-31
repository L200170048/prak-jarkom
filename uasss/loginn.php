<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
</head>
<body>
    <?php
        session_start();
        if (isset($_SESSION['admin'])){
            header('Location: admin/index.php');
        }

        error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
        $conn = mysqli_connect('localhost','root','','informatika');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $submit = $_POST['submit'];
        if($submit){
            $sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            var_dump($row);
            $cek = mysqli_num_rows($query);

            if($row['status']=='administrator'){
                $_SESSION['admin']=$row['username'];
                $_SESSION['status']='administrator';
                header('Location: admin/index.php');
            
            }elseif($row['status']=='member'){
                $_SESSION['member']=$row['username'];
                $_SESSION['status']='member';
                header('Location: member/index.php');
            }else{
                echo "
                    <script>
                        alert('login gagal');
                        document.location = 'loginn.php';
                    </script>
                ";
            }
        }
    ?>

    <center>
        <h3>HALAMAN LOGIN</h3>
        <table>
            <form action="loginn.php" method="POST">
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text"  name='username'></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="text" name='password'></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="submit" value="submit"></td>    
                </tr>
            </form>
        </table>
    </center>
</body>
</html>