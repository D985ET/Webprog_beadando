<?php

require_once "mydbm.php";
$dbname="elso";
$con=connect("root","",$dbname);

$query="select authority from users where uname='".$_SESSION['user']."'";
$res=mysqli_query($con,$query) or die ("Hiba: ".mysqli_error($con));
list($aut)=mysqli_fetch_row($res);
if($aut=="admin")
    $query="select name,link from menu";//mindent megkap
else if($aut=="user")
    $query="select name,link from menu where link<=4"; //első 4 gombot kéri
else
    $query="select name,link from menu where link<=3"; //első 2 gombot kapja meg

$result=mysqli_query($con,$query) or die ("Hiba: ".mysqli_error($con));


echo "<table>";
while(list($menutitle,$link)=mysqli_fetch_row($result))
{
	echo "<td><a class=menu href=index.php?d=".$link.">".$menutitle."</a></td>";
}
echo "</table>";
mysqli_close($con);
?>