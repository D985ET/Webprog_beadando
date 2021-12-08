
<?php
require_once "mydbm.php";
$dbname = "elso";
$con = connect("root","",$dbname);

if(!isset($_GET["order"]))
{
   $order = 0;
}
else
{
    $order = $_GET["order"];
}

if($order==0)
{
    $orderstring=" order by id";

}
else
{
    $orderstring=" order by uname";
}
$limit = 4;
$page = isset($_GET["page"])? abs((int)$_GET["page"]): 1;

$query = "select count(*) from users";

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
$query="select id,uname,email,img from users";
$query .= $orderstring;
$query .=" limit $offset,$limit";

$result=mysqli_query($con,$query) or die ("Nem sikerült ".$query); // ha ez nem sikerül, die

//sorbarendezés
echo "<table width=100% border=1><tr class=title><td><a href=index.php?d=".$_GET['d']."&order=0>Felvitel szerint</a></td><td>
<a href=index.php?d=".$_GET['d']."&order=1>Név szerint</a> </td></tr></table>";

while (list($id,$nev,$email,$kep)=mysqli_fetch_row($result))
{
	
 echo "<div id=tobbifelhasznalo> <table style=height:250px;>";
        echo "<tr><td colspan=2><img src=" . $kep . " alt=".$kep." height=200px /></td></tr>";
        echo "<tr><td>Név: </td><td>" . $nev . "</td></tr>";
        echo "<tr><td>E-mail: </td><td>" . $email . "</td></tr>";
        echo "<tr style = height:300px;></tr>";
        echo '</table> </div> ';
    
}
echo '<hr style="clear:both;">';




//limitálás:

$linklimit = 4; 
$linklimit2 = $linklimit / 2; 
$linkoffset = ($page > $linklimit2) ? $page - $linklimit2 : 0; 
$linkend = $linkoffset+$linklimit; 

if ($maxpage - $linklimit2 < $page)
{
   $linkoffset = $maxpage - $linklimit;
   if ($linkoffset < 0)
   {
      $linkoffset = 0;
   }
   $linkend = $maxpage;
}
echo "<div id=formlistlink>";
if ($page > 1)
{
  echo "<a href='index.php?d=".$_GET['d']."&order=".$order."&page=1'> Első </a>";
  echo "<a href='index.php?d=".$_GET['d']."&order=".$order."&page=".($page-1)."'> <- Előző </a>";
  
}


 for ($i=1+$linkoffset; $i <= $linkend and $i <= $maxpage; $i++)
 {
    $style = ($i == $page) ? "color: black;" : "color: green;";
    echo "<a href='index.php?d=".$_GET['d']."&order=".$order."&page=$i' style='$style'>[$i. oldal]</a>";
 }

 if ($page < $maxpage)
 {
   echo "<a href='index.php?d=".$_GET['d']."&order=".$order."&page=".($page+1)."'> Következő -></a>";
   echo "<a href='index.php?d=".$_GET['d']."&order=".$order."&page=".$maxpage."'> Utolsó </a>";
   }

   echo "</div>";
mysqli_close($con);
?>