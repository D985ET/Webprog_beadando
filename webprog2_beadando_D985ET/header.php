<?php

$cookie_name=$_SESSION["user"];
$try=$_COOKIE[$cookie_name];
$db=0;
		
foreach($_COOKIE as &$cookie){
    if ($try == $cookie) {
        $db++;
    }
}

$color="white";
if($db>1){
    $color="#ddc3a5";
}
echo "<header>";
		
          
           
            echo "<p style='color:".$color."; font-size:20px; font-weight:bolder; margin:10px;'>Felhasználó: ".$_SESSION["user"]."</p>";
            echo "<form action=logout.php method=post><input style=margin-right:85px; type=submit name=logout value=Kijelentkezés></form></div>"; 
		
echo "</header>";
?>