<html>
<head>
    <?php
        include 'SQL_Logins.php';   
         // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        $row_start = "<div style='background-color: darkgrey; text-align: center;' class='row'>";
        $name_col_start = "<div class='col-sm-2 border colSelText mobileEm2'>";
        $img_col_start = "<div class='col-sm-10 border colSelImg mobileEm2'>";
        $link_start = "<a href='";
        $link_middle = "' target='_blank' rel='noopener noreferrer'>";
        $link_end = "</a>";
        $img_start = "<img class='imgNorm' src='";
        $img_end = "'/>";
        $select_form_start = "<form method='post' action='enter_pass.php'><input type='hidden' name='id' value='";
        $select_form_end = "'><input type='submit' name='subm' value='Select'></form>";
        $div_end = "</div>";

        $img_start_top = "<img class='imgTop' src='";
    ?>
    <title>Dappageze - Password Entry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="main.css">

</head>
<script>
var num = 5;
function count_down(){
    num=num-1;
    document.getElementById("countDown").innerHTML = num;
}

function return_to_list() {
    window.location.replace("game_list.php");
}
</script>
<body>
    <div class="makeMeWide container">
        <div class="jumbotron" style="background-color: darkgrey;">
            <div class="row">
                <div class="col-sm-4">
                    <h1>Dappageze</h1>
                </div>
                <div class="mobileHide col-sm-3">
                    <img style="border-radius: 50%;" src="https://static-cdn.jtvnw.net/jtv_user_pictures/f6d2af3e-471c-4cad-8468-cadd451b6dbf-profile_image-150x150.png">
                </div>  
                <div class="mobileHide col-sm-5">
                    <?php
                        $last_GID = -1;
                        $sql = "Select GID, UID From prevgameselection Order By UID ASC";
                        $result = $conn->query($sql);
            
                        if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $last_GID=$row['GID'];
                            }
                        }

                        if($last_GID != -1){
                            echo "Last selected game was ";
                            
                            $sql = "SELECT ID, Name, Img, Link FROM games WHERE ID='$last_GID'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo  $link_start . $row['Link'] . $link_middle . $row['Name'] . $link_end;
                            }
                            } else {
                                echo "Please report failure to DawsonThePagan, code 2";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container enterPass">
        <form method="POST">
        <?php
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
        $subm_pass="";
        $sql = "SELECT * FROM subm_pass WHERE ID=0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $subm_pass=$row['Pass'];
        }
        } else {
            die("Please report failure to DawsonThePagan, code 2");
        }

        $redirect = " <p class='passScreenText'>Redirecting in <span id='countDown'>5</span> seconds. If you don't get redirect click <a href='game_list.php'>here</a></p><script>setTimeout(return_to_list, 5000); setInterval(count_down, 1000);</script>";
        $ID_input_start = "<p class='passScreenText'>You need to enter a password to submit a selection</p><input type='hidden' name='id' value='";
        $password_box = "<p class='passScreenText'>Password: <input type='text' style='width:70%'; name='passw'><input type='submit' name='PassEnt' value='Submit Password'></p>";
        $input_end = "'>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if(isset($_POST["subm"])){
                echo $ID_input_start . $_POST['id'] . $input_end;
                echo $password_box;
            }
            if(isset($_POST["PassEnt"])){
                if($_POST['passw']==$subm_pass){

                    $sql = "INSERT INTO `prevgameselection` (`GID`, `TimeStamp`) VALUES ('".$_POST['id']."', '".time()."');";

                    if ($conn->query($sql) === TRUE) {
                        echo "Sucessfully submitted game.";
                    } else {
                        echo "Report error to DawsonThePagan, Code 3";
                    }

                    $newPass = "";
                    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                    for ($i = 0; $i < 8; $i++) {
                        $n = rand(0, strlen($alphabet) - 1);
                        $newPass = $newPass . $alphabet[$n];
                    }

                    $sql = "UPDATE subm_pass SET Pass='$newPass' WHERE ID=0";

                    if ($conn->query($sql) === TRUE) {
                        echo $redirect;
                    } else {
                        echo "Report error to DawsonThePagan, Code 3";
                    }
                }
                else{
                    echo "Incorrect password.";
                    echo $redirect;
                }
            }
        }else
        {
            echo "<script>return_to_list()</script>";
        }
        ?>
        </form>
    </div>
</body>
</html>