<?php
require_once "mydbm.php";
$dbname = "elso";
$con = connect("root","",$dbname);
$query = "select uname,email,img from users where uname='".$_SESSION["user"]."'";
$result = mysqli_query($con,$query) or die ("nem sikerült".$query); //mysqli_query(adatbázis kiválasztás,mit csinálunk ezen belül)
echo "<div id=profilom>";
list($name,$email,$img)=mysqli_fetch_row($result);
{   echo "<table style= background-color:powerblue;>";
    echo "<h2> Adataid: </h2>";
    echo "<tr><td colspan = 2 ><img src=".$img." alt= Profilkép height = 300></td></tr>";
    echo "<tr><td>Név:</td><td>".$name . "</td></tr>";
    echo "<tr><td>E-mail:</td><td>".$email."</td></tr></table>";
}
echo '<form action="" method="POST"><input type="submit" name="_modify" value="Jelszó módosítás"></form>';

if(isset($_POST["_modify"]))
{
    echo '</br><form action="changepasswd.php" method="POST"><input type="password" name="_oldpassword" placeholder="Jelenlegi jelszó">'
    . '<input type="password" name="_newpassword" placeholder="Új jelszó">'
    .'<input type="submit" name="_send" placeholder="Módosít"></form>';
}
echo "</div>";
mysqli_close($con);
?>