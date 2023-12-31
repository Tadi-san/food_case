<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>
<?php
    if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }

    if(isset($_SESSION['no-login-message'])){
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
  
?>
            
            <br><br>

            <!-- Login Form Starts HEre -->
            <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            <!-- Login Form Ends HEre -->
            <p> demo: username = t , password = t</p>
            <p class="text-center">Created By - <a href="">Tadi-Dev</a></p>
        </div>

    </body>
</html>

<?php 
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE 
        username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if ($result == TRUE) {
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $_SESSION['login'] = "";
                $_SESSION['user'] = $username;
                header("location:".SITEURL."admin/");
            }
            else {
                $_SESSION['login'] = "<div class='text-center error'> Password or username error <div/>";
                header("location:".SITEURL."admin/login.php");
            }
        }


    }
?>