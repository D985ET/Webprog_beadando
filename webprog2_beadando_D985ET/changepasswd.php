<?php
session_start();
require_once "mydbm.php";
$username="root";
$passwd = "";
$dbname = "elso";
$con = connect($username,$passwd,$dbname);
$query = "select passwd from users where uname='".$_SESSION["user"]."'";
$result = mysqli_query($con,$query) or die("hiba".$query);

list($password)=mysqli_fetch_row($result);
if(isset($_POST["_send"]))
{
    if($password==md5($_POST["_oldpassword"]))
    {
        $query = "UPDATE users SET passwd=md5('".$_POST["_newpassword"]."') WHERE uname='".$_SESSION["user"]."'";
        $result = mysqli_query($con,$query) or die("hiba".$query);
        if($result)
        {
            echo 'Sikeres módosítás!<br/>3 másodpercen belül visszairányítjuk az oldalra';
        }
        
    }
    else{
        echo 'Helytelenül adta meg a jelenlegi jelszót! Próbálja újra! '
        . '<br/>3 másodpercen belül visszairányítjuk az oldalra';
    }
    echo '<meta http-equiv="refresh" content="3; URL=index.php">'; 
}
mysqli_close($con);