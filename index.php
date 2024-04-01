<?php
session_start();
include('config.php');

if(isset($_SESSION['user'])) {
    header('location: home.php');
    die;
}
?>

<html>
    <body>
        <center>
            <!-- form tag is open -->
        <form method="post">
            <!-- table start -->
            <table border = 1>
                <h1>Login </h1>
                
                <!-- for name input -->
                <tr>
                    <td>Email :</td>
                    <th><input type="email" name="email"></th>
                </tr>

                <!-- for password input -->
                <tr>
                    <td>Password :</td>
                    <th><input type="password" name="password"></th>   
                </tr>

                <!-- for submit button -->
                <tr>
                    <th colspan='2'>
                      <input type="submit" name="submit">
                      <!-- link of sign up page -->
                      <a href="sign_up.php">sign up</a>
                    </th>
                </tr>
            </table>
        </form>
        </center>
    </body>
</html>

<?php

    if(isset($_POST['submit'])) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        

        $qry = $connection->query("SELECT EMAIL, PASSWORD FROM USER_MASTER WHERE EMAIL='$email'");

        $row = $qry->fetch(PDO::FETCH_ASSOC);

        if($qry->rowCount() > 0) {
            if($row['PASSWORD'] == $password) {
                $_SESSION['user'] = $email;
                header('location: home.php');
                die;
            }
            else {
                echo "<script>alert('Password Incorrect!');</script>";
                die;
            }
        }
        else {
            echo "<script>alert('Email not Found!');</script>";
            die;
        }
    }

?>