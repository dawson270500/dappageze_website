<?php
include '../SQL_Logins.php';
$conn = new mysqli($servername, $username, $password, $database);
session_start();
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
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

$showme = "";
$edit = false;
$name="";
$link="";
$img="";

if(isset($_POST['conf'])){
    if(isset($_POST['id'])){
        $sql = "UPDATE games SET Name='".clean_input($_POST['name'])."', Img='".clean_input($_POST['img'])."', Link='"
        .clean_input($_POST['link'])."' WHERE ID=".$_POST['id'];
    }
    else{
        $sql = "INSERT INTO games(`Name`, `Img`, `Link`) VALUES ('".clean_input($_POST['name'])."','".
        clean_input($_POST['img'])."','".clean_input($_POST['link'])."')";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: http://www.baileydawson.uk/dappa/admin/admin.php?edit=".time());
        exit();
    } else {
        $showme = "Error updating record: " . $conn->error;
        $edit = true;
        $name=$_POST['name'];
        $link=$_POST['link'];
        $img=$_POST['img'];
    }
}
?>
<html>
    <?php
        if(isset($_POST['edit'])){
            $edit = true;

            $sql = "SELECT * FROM `games` WHERE ID=".$_POST['ID'];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $name=$row['Name'];
                    $link=$row['Link'];
                    $img=$row['Img'];
                }
            }
        }
    ?>
    <head>
        <title>Dappa - Admin Panel</title>
        <style>
            .quickbox{
                display: inline; 
                padding: 1%; 
                text-align:center; 
                height: 20%; 
                float:left;
                margin: 1%;
                width:20%;
            }
        </style>
    </head>
    <body>
        <div class="quickbox">
            <?php
                if($edit){
                    echo "Edit the value below, then click submit<br>";
                }
            ?>
            <form method="POST">
                <p>Name: <input type="text" name="name" value="<?php if($edit){ echo $name; }?>"></p>
                <p>Link: <input id="link_text" type="text" name="link" value="<?php if($edit){ echo $link; }?>"></p>
                <p>Image: <input type="text" id="img_text" name="img" value="<?php if($edit){ echo $img; }?>"></p>
                <?php
                    if($edit){
                        echo "<input type='hidden' name='id' value='".$_POST['ID']."'>";
                    }
                ?>
                <p><input type="submit" name="conf" value="Submit">
                <button onclick="update()"  type="button">Update</button></p>
            </form>
            <?php
                if($showme != ""){
                    echo $showme;
                }
            ?>
        </div>
        <div class="quickbox">
            <p>Image that will be displayed is below</p>
            <img src="" style="width:100%;" id="img_gui" alt="Please enter something and click update">
        </div>
        <div class="quickbox">
            <p>Link test</p>
            <a href="" id="link_gui" target='_blank' rel='noopener noreferrer'>Click here to test link</a>
        </div>
    </body>
    <script>
        const img_text = document.getElementById("img_text");
        const img_gui = document.getElementById("img_gui");

        const link_text = document.getElementById("link_text");
        const link_gui = document.getElementById("link_gui");

        function update(){
            img_gui.src = img_text.value;
            link_gui.href = link_text.value;
        }
        if(img_text.value != ""){
            update();
        }
    </script>
</html>