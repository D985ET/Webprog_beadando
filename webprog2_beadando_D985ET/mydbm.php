<?php

function connect($username,$passwd,$dbname)
{
    $con=mysqli_connect("localhost",$username,$passwd,$dbname,3306);
    if (!isset($con))
    {
        die("Hiba".mysqli_error($con));
    }
    else
    {
        return $con;
    }

}
?>