<!DOCTYPE html>
<body>

<?php
if(!isset($_GET["d"]))
{
    $_GET["d"]=0;
}
switch($_GET["d"])
{
	case 0:include "kereses.php";break;
	case 1:include "profile.php"; break;
	case 2:include "formlist.php"; break;
	case 3:include "addigeversform.php"; break;
	case 4:include "modifyigevers.php";break;
	case 5:include "useradd.php";break;
	case 6:include "userdelete.php";break;
	default: include "profile.php"; break;
}
?>
</body>