<?php
include '../SQL_Logins.php';
$conn = new mysqli($servername, $username, $password, $database);
session_start();
// Check connection
if ($conn->connect_error) {
    die("Report failure to DawsonThePagan, code 1. Connection failed: " . $conn->connect_error);
}
if(isset($_POST['logout'])){
    $_SESSION['admin_user']="";
    $showme="Logged out";
}
if(isset($_SESSION['admin_user'])){
    $sql = "SELECT * FROM login_key WHERE pass_key='".$_SESSION['admin_user']."'";
    $result = $conn->query($sql);
    // 2 hour login key
    if ($result->num_rows > 0) {
        if($row['time'] > strtotime("-4 hours")) {
            $_SESSION['admin_user'] = "";
        }else{
            header("Location: http://www.baileydawson.uk/dappa/admin/admin.php");
            exit();
        }
    }
}

$showme="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['login'])){
        $sql = "SELECT * FROM `login` WHERE Username='".$_POST['user']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if(password_verify($_POST['password'], $row['Password'])){
                    $key = "";
                    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                    for ($i = 0; $i < 64; $i++) {
                        $n = rand(0, strlen($alphabet) - 1);
                        $key = $key . $alphabet[$n];
                    }    
                    $sql = "INSERT INTO `login_key` (`pass_key`, `time`) VALUES ('".$key."', '".time()."');";

                    if ($conn->query($sql) === TRUE) {#
                        echo "Success";
                        $_SESSION['admin_user']=$key;
                        header("Location: http://www.baileydawson.uk/dappa/admin/admin.php");
                        exit();
                    } else {
                        $showme = "Login failed";
                    }   
                                
                }else{
                    $showme="Invalid Username or Password";
                }
            }
        } else {
            $showme = "Invalid Username or Password";
        }
    }
}

?>

<html>
    <head>
        <title>Dappa - Admin panel</title>    
    </head>
    <body>
        Login please<br>
        <form method="POST">
            User: <input type="text" name="user"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" name="login" value="Login">
        </form>
        <?php
            if($showme!=""){
                echo $showme;
            }
            $conn->close();
        ?>
        <a href="https://www.baileydawson.uk/dappa/game_list.php">Go to normal site</a>
    </body> 
</html>