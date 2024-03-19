<html>
<head>
    <?php
        include 'SQL_Logins.php';

        $row_start = "<div style='background-color: darkgrey; text-align: center;' class='row'>";
        $name_col_start = "<div class='col-xs-3 col-sm-2 border colSelText mobileEm2'>";
        $img_col_start = "<div class='col-xs-9 col-sm-10 border colSelImg mobileEm2'>";
        $link_start = "<a href='";
        $link_middle = "' target='_blank' rel='noopener noreferrer'>";
        $link_end = "</a>";
        $img_start = "<img class='imgNorm' src='";
        $img_end = "'/>";
        $select_form_start = "<form method='post' action='enter_pass.php'><input type='hidden' name='id' value='";
        $select_form_end = "'><input type='submit' name='subm' value='Select'></form>";
        $div_end = "</div>";

        $img_start_top = "<img class='imgTop' src='";
        
        
        function clean_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Report failure to DawsonThePagan, code 1. Connection failed: " . $conn->connect_error);
        }
    ?>
    <title>Dappageze: Games List</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="main.css">
</head>

    <body style="background-color: grey;">
    <div class="container" id="top">
        <div class="jumbotron" style="background-color: darkgrey;">
            <div class="row">
                <div class="col-sm-4">
                    <h1>Dappageze</h1>
                    <p class="mobileEm2">This page contains a list of games that can be chosen after winning marbles.</p>
                </div>
                <div class="col-sm-3 mobileHide">
                    <script>
                        var count = 0;
                        function adminLoad(){
                            count = count + 1; // When the profile pic is pressed 5 times, redirect to the admin panel
                            if(count == 5){
                                window.location.replace("https://www.baileydawson.uk/dappa/admin/index.php");
                            }
                        }
                    </script>
                    <img onclick="adminLoad()" style="border-radius: 50%;" src="https://static-cdn.jtvnw.net/jtv_user_pictures/f6d2af3e-471c-4cad-8468-cadd451b6dbf-profile_image-150x150.png">
                </div>  
                <div class="col-sm-5 mobileHide">
                    
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
                                echo  $link_start . $row['Link'] . $link_middle . $row['Name'] . $link_end . "<br>";
                                echo  $link_start . $row['Link'] . $link_middle . $img_start_top . $row['Img'] . $img_end . $link_end;
                            }
                            } else {
                                echo "Please report failure to DawsonThePagan, code 2";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
       
        <div class="container mainCont">
            <p><a href="#bottom" style="color: white;">Go to bottom</a>
            <form method="POST">
                <input type="text" name="search_text"><input type="submit" value="Search" name="search"><input type="submit" value="Clear Search">
            </form></p>
        <?php
            function prepared_query($mysqli, $sql, $params, $types = "")
            {
                $types = $types ?: str_repeat("s", count($params));
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param($types, ...$params);
                $stmt->execute();
                return $stmt;
            }

            if(isset($_POST['search'])){
                $sql = "SELECT * FROM games WHERE `Active` = 1 AND `Name` LIKE ?";
                $stmt = prepared_query($conn, $sql, '%'.$_POST['search_text'].'%');
                $result = $stmt->get_result(); 
            }else{
                $stmt = $conn->prepare("SELECT ID, Name, Img, Link, Active FROM games WHERE Active=1 ORDER BY Name ASC");
                $stmt->execute();
                $result = $stmt->get_result();
            }

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo $row_start;
                    echo $name_col_start . $link_start . $row['Link'] . $link_middle . $row['Name'] . $link_end . $select_form_start . $row['ID'] . $select_form_end . $div_end;
                    echo $img_col_start . $link_start . $row['Link'] . $link_middle . $img_start . $row['Img'] . $img_end . $link_end . $div_end;
                    echo $div_end;
                }
            } else if($result->num_rows == 0) {
                echo "<p style='color:light-grey;'>No games found with query</p>";
            }else{
                echo "Please report failure to DawsonThePagan, code 2";
            }
        ?>
        <a href="#top" style="color: white;">Go to top</a>
        </div>
    </div>
    <br>
    <footer id="bottom">
            <div class="container" style="width:100%;">
                <div class="row" style="width:100%; text-align: center; background-color: darkgrey;">
                    <div class="col-sm-6">
                        <span style="font-weight: bold;">Dappageze's Details</span><br>
                        <a href="https://discord.gg/maQM9SBTvM">Discord</a><br>
                        <a href="https://www.twitch.tv/dappageze">Twitch</a>
                    </div>
                    <div class="col-sm-6">
                        <span style="font-weight: bold;">Site Created by DawsonThePagan</span><br>
                        <a href="https://www.buymeacoffee.com/dawson270500">Buy Me a Coffee</a><br>
                        <a href="https://www.baileydawson.uk">Website</a>
                    </div>
                </div> 
                <p>
            </div> 
    </footer>
    </body>

</html>
<?php
 $conn->close();
?>