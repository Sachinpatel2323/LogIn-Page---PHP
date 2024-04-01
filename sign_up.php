<?php
session_start();
include('config.php');

if(isset($_SESSION['user'])) {
    header('location: home.php');
    die;
}
?>

<html>
    <head></head>
    <body>
        <!-- form tag is open -->
        <form action = "sign_up.php" method = "POST">
            <center>
                 <!-- table start -->
                <table border = 1>
                    <h1>Sign up </h1>
                    <!-- for name input -->
                    <tr>
                        <td>Name :</td>
                        <th><input type="text" name = "txtname"></th>
                    </tr>
                    
                    <!-- for password input -->
                    <tr>
                        <td>Password :</td>
                        <th><input type="password" name = "txtpass"></th>
                    </tr>

                    <!-- for email input -->
                    <tr>
                        <td>E-Mail :</td>
                        <th><input type="email" name = "txtmail"></th>
                    </tr>

                    <!-- for city input -->
                    <tr>
                        <td>City :</td>
                        <th><input type="text" name = "txtcity"></th>
                    </tr>

                    <!-- for phone number input -->
                    <tr>
                        <td>Phone Number :</td>
                        <th><input type="number" name = "txtnum"></th>
                    </tr>

                    <!-- for submit button -->
                    <tr>
                        <th colspan=2><input type="submit" value = "submit" name = "txtsub"></th>
                    </tr>
                </table>
                <!-- table end -->
            </center>
        </form>
        <!-- form tag is end -->
    </body>
</html>

<?php
if(isset($_POST['txtsub']))
{
        $name=$_POST['txtname'];
        $password=$_POST['txtpass'];
        $email=$_POST['txtmail'];
        $city=$_POST['txtcity'];
        $number=$_POST['txtnum'];

        if($name=="" || $password=="" || $email=="" || $city=="" || $number=="")
        {
            echo "<script>alert('Enter your details');</script>";
            die;
        }
        
        $qry = "INSERT INTO USER_MASTER(NAME,PASSWORD,EMAIL,CITY,PHONE_NO) VALUES(:NAME, :PASSWORD, :EMAIL, :CITY, :PHONE)";
        $validate = $connection->query("SELECT EMAIL FROM USER_MASTER WHERE EMAIL='$email'");

        $qry_run = $connection->prepare($qry);

        // $row = $validate->fetch(PDO::FETCH_ASSOC);

        if(!($validate->rowCount() > 0)) {
            $result = $qry_run->execute([
                ':NAME' => $name,
                ':PASSWORD' => $password,
                ':EMAIL' => $email,
                ':CITY' => $city,
                ':PHONE' => $number,
            ]);

            if($result) {
                echo "<script>alert('User registered successfully.');</script>";
                echo "<script> location.replace('http://localhost/22BCA232/project/index.php'); </script>";
            }
            else {
                echo "<script>alert('User could not be registered!');</script>";
            }
        }
        else {
            echo "<script>alert('User already exist!');</script>";
        }
}
?>