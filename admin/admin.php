<?php
include '../SQL_Logins.php';
$conn = new mysqli($servername, $username, $password, $database);
session_start();
// Check connection
if ($conn->connect_error) {
    die("Report failure to DawsonThePagan, code 1. Connection failed: " . $conn->connect_error);
}
session_start(); // If not set, go back to login
if(!isset($_SESSION['admin_user'])){
    header("Location: http://www.baileydawson.uk/dappa/admin/index.php");
    exit();
}
$sql = "SELECT * FROM login_key WHERE pass_key='".$_SESSION['admin_user']."'";
$result = $conn->query($sql);
// 2 hour login key
if ($result->num_rows > 0) {
    if($row['time'] > strtotime("-4 hours")) {
        $_SESSION['admin_user'] = "";
        header("Location: http://www.baileydawson.uk/dappa/admin/index.php");
        exit();
    }
}else{
    $_SESSION['admin_user'] = "";
    header("Location: http://www.baileydawson.uk/dappa/admin/index.php");
    exit();
}
?>

<html>
    <head>
        <title>Dappa - Admin Panel</title>
        <style>
            .quickbox{
                display: inline; 
                border-style: solid; 
                padding: 1%; 
                text-align:center; 
                height: 20%; 
                float:left;
                margin: 1%;
                width:20%;
            }
            
            td, th{
                border: 1px solid black;
                overflow-x: hidden; /* Hide horizontal scrollbar */
                overflow-y: scroll;
                width: 10%;
            }
            table{
                border: 1px solid black;
                table-layout: fixed;    
                width: 100%;
                content: "\a";
                white-space: pre;
            }
        </style>
    </head>

    <body>
        <?php
            $sql = "DELETE FROM login_key WHERE time < ".strtotime("-30 minutes");
            if ($conn->query($sql) === FALSE) {
                echo "<strong>Tell dawson the keys failed to clear</strong><br>";
            }
        ?>
        <h2>Dappas Admin Panel</h2>
        <p><form action="index.php" method="POST">
            <input type="submit" value="Log out" name="logout">
            <a href="https://www.baileydawson.uk/dappa/game_list.php">Go to normal site</a>
        </form></p>
        <?php
            if(isset($_GET['edit']) && $_GET['edit'] > strtotime("-5 seconds")){
                echo "Successfully updated/inserted game";
            }
        ?>
        <div class="quickbox">
            <br><form method="POST">
                <input type="submit" name="getPass" value="Get Current Password">
            </form>
            <p>
                <?php
                    if(isset($_POST['getPass'])){
                        $sql = "SELECT * FROM subm_pass WHERE ID=0";
                        $result = $conn->query($sql);
            
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "Password is: " . $row['Pass'];
                        }
                        } else {
                            echo "Please report failure to DawsonThePagan";
                        }
                    }
                ?>
            </p>
        </div>
        <div class="quickbox">
            <br><form method="POST">
                <input type="submit" name="passRegen" value="Regen pass">
            </form>
            <p>
                <?php
                   if(isset($_POST['passRegen'])){
                    $newPass = "";
                    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                    for ($i = 0; $i < 8; $i++) {
                        $n = rand(0, strlen($alphabet) - 1);
                        $newPass = $newPass . $alphabet[$n];
                    }

                    $sql = "UPDATE subm_pass SET Pass='$newPass' WHERE ID=0";

                    if ($conn->query($sql) === TRUE) {
                        echo "Record updated successfully. New password is ".$newPass;
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                }
                ?>
            </p>
        </div>

        <div class="quickbox">
                <br><form method="POST" action="add_edit.php">
                <input type="submit" name="insert" value="Create new game">
            </form>
        </div>

        <br>
        <?php
            if(isset($_POST['disable'])){
                $sql = "UPDATE games SET Active='0' WHERE ID=".$_POST['ID'];

                if ($conn->query($sql) === TRUE) {
                    echo "Successfully Disabled";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            if(isset($_POST['enable'])){
                $sql = "UPDATE games SET Active='1' WHERE ID=".$_POST['ID'];

                if ($conn->query($sql) === TRUE) {
                    echo "Successfully Enabled";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            if(isset($_POST['delete'])){

                $sql = "DELETE FROM games WHERE ID=".$_POST['ID'];

                if ($conn->query($sql) === TRUE) {
                    echo "Successfully Deleted";
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            }
        ?>
        <table class="table">
            <tr>
                <th style='width:5%;'>Name</th>
                <th>Link</th>
                <th>Image</th>
                <th style='width:2%;'>Actions</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `games`";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Name'] . "</td><td>" . $row['Link'] . "</td><td><img style='width:40%' src='";
                        echo $row['Img'] . "'></td>";
                        echo "<td><form method='POST' action='add_edit.php'><input type='hidden' value='" . $row['ID'] . "' name='ID'>";
                        echo "<input type='submit' name='edit' value='Edit'></form>";
                        echo "<form method='POST'><input type='hidden' value='" . $row['ID'] . "' name='ID'>";
                        if($row['Active'] == "1"){
                            echo "<input type='submit' name='disable' value='Disable'>";
                        } else{
                            echo "<input type='submit' name='enable' value='Enable'>";
                        }
                        echo "<br><input type='submit' name='delete' value='Delete'>";
                        echo "</form></td>";
                        echo "</tr>";
                    }
                    } else {
                        echo "Please report failure to DawsonThePagan";
                    }
            ?>
        </table>
    </body>
</html>