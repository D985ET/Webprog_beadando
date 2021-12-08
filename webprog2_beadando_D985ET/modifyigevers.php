<?php
require_once "mydbm.php";
$dbname = "elso";
$con = connect("root","",$dbname);
$page = isset($_GET["page"])? abs((int)$_GET["page"]): 1;
$query = "select count(*) from igeversek";

$limit = 5;
$res=mysqli_query($con,$query) or die ("Nem sikerült".$query);//connection
$list=mysqli_fetch_row($res); //összerakja őket egy listába, felveszi az oszlopok nevét
$c = array_shift($list); 

$maxpage = ceil($c / $limit);

if($page <= 0)
{
    $page = 1;
}
else if($page >= $maxpage)
{
    $page = $maxpage;
}

$offset = ($page-1)*$limit;
$query="select ID,name,image,username,topic,testament from igeversek";
$query .=" limit $offset,$limit";

$result=mysqli_query($con,$query) or die ("Nem sikerült ".$query); // ha ez nem sikerül, die

while (list($ID,$nev,$image,$username,$topic,$testament)=mysqli_fetch_row($result))
{
	

 echo "<div id=migevers>";
         echo '<form action="" method="POST">';
        echo '<img src="' . $image .'"alt=".$image." height=200  /><br>';
        echo "<p>Név:" . $nev . "</p>";
        echo '<input type="textbox" placeholder="új név" name="igenevchange" >';
        echo "<p>Téma: " . $topic . "</p>";
        echo '<select name="topicchange" >
        <option value="Szeretet">Szeretet</option><option value="Hit">Hit</option><option value="Erő">Erő</option></select>';
        echo "<p>Testamentum: ".$testament . "</p>";
        echo '<select name="testamentchange">
        <option value="Ószövetség">Ószövetség</option><option value="Újszövetség">Újszövetség</option>
        </select><br><br>';
        echo '<input type="submit" name="elkuld" value="Módosít">';
        echo '<input type="hidden" name="igeid" value="'.$ID.'">';
        echo '</form></div>';


}  
//módosítás:

if(isset($_POST["elkuld"]))
{
  
   
   if($_POST["igenevchange"]!="")
   {
      $igenev = $_POST["igenevchange"];
    
   }
   else
   {
      
      $query="select name from igeversek where ID=".$_POST["igeid"].";";
      $result = mysqli_query($con,$query);
      list($igenev) = mysqli_fetch_row($result);
     
   }
   
   $query="update igeversek set name='".$igenev."', topic='".$_POST["topicchange"]."' , testament='".$_POST["testamentchange"]."' where ID=".$_POST["igeid"].";";
   $result = mysqli_query($con,$query);
   
   echo '<meta http-equiv="refresh" content="3; URL=index.php?d=4">';

}


mysqli_close($con);
?>
