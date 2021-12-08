<?php
    require "mydbm.php";
    if(isset($_POST["_login"]))
    $dbname="elso"; //adatbázis neve 

    $con = connect("root","",$dbname); //bejelentkezés

    $query = "select uname,passwd from users where uname='".$_POST['_username']."'";//login név létezik e

    $result=mysqli_query($con,$query) or die ("Hiba: ".mysqli_error($con));
    list($username,$passwd)=mysqli_fetch_row($result);
    if($passwd==md5($_POST["_password"]))//hogyha egyezik a passwd
    {
        session_start();
        $_SESSION["user"]=$username;//users

        $cookie_name = $username;
        $a = getenv("REMOTE_ADDR");
        $cookie_value = $a;
        setcookie($cookie_name,$cookie_value,time() + (86400 * 30), "/");
        
        echo '<meta http-equiv="refresh" content="0; URL=index.php?d=1">';

    }
    else
    {
        echo "<br/>Hibás jelszó vagy felhasználónév";
        echo "<br/><a href=login.html>Vissza a bejelntkezéshez</a>";
    }
    mysqli_close($con);

?>