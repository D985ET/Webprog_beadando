<!DOCTYPE html>
<html>
    <head>
        <title>Webpage</title>
        <meta http-equiv="content-type" content="text/HTML; charset=UTF-8">
        <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
        <meta http-equiv="content-style-type" content="text/css">
        <link rel="stylesheet" type="text/css" href="css/webpage.css">
    </head>
    <body>
    <?php require "mydbm.php"; ?>
    <?php
        session_start();
        if(isset($_SESSION["user"]))
        {
            echo "<div id=page>";//maga a mag
                echo "<div id=header>";//fejléc
            include "header.php";
                echo "</div>";
                echo "<div id=menu>";
            include "menu.php"; 
                echo "</div>";
                echo "<div id=content>";//content
            include "content.php";
            echo "<h4>".date("Y.m.d.")."</h4>";
            echo "</div>";
        }
        else
        {
            echo '<meta http-equiv="refresh" content="0; URL=login.html">';
        }
    ?>
    
    </body>
</html>