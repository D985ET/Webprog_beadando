<div id="userdelete">
<h2>Felhasználó törlése:</h2>
        <form  method="POST" action="" enctype=multipart/form-data>
        <table>
            <tr><td>Törlés ID alapján:</td><td><input type="text" name="_id" pattern="[A-Z a-z 0-9]*" required></td><td><input type="submit" value="Töröl" name="MODIFY"></td></tr>
            
        </table>
        </form>
</div>
<?php
//ID szerint törlünk  DELETE FROM USERS where id=" ";
if(isset($_POST["MODIFY"]))
{
    require_once "mydbm.php";
    $dbname = "elso"; //adatbázis neve
    $con = connect("root","",$dbname);
    $query = "select img from users where id=".$_POST["_id"].";";
    $result = mysqli_query($con,$query);
    list($img) = mysqli_fetch_row($result);
    if(file_exists($img))
    {
        unlink($img);
    }
   
    rmdir(dirname($img));
    $query = "delete from users where id=".$_POST["_id"].";";
    
    $result = mysqli_query($con,$query) or die ("nem sikerült".$query);
    
    echo "Sikeresen törlés!";
    echo '<meta http-equiv="refresh" content="3; URL=index.php?d=2">';
    
}

?>