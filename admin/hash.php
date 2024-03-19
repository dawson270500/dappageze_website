
<html>
    <body>
    <?php
    if(isset($_POST['hashme'])){
        echo password_hash($_POST['hash'], PASSWORD_BCRYPT);
    }
    ?><br>
        <form method="POST">
            <input type="text" name="hash">
            <input type="submit" name="hashme">
        </form>
    </body>
</html>