<!DOCTYPE html>
<html>
<body>
<?php
if(isset($_POST["_add"]))
{
    require "mydbm.php";
    $trájm = str_replace(' ', '', $_POST["_nev"]);
    $beirando = "igevers/".$trájm."/vers_".rand(0,10001).".jpg";
  
    $dbname = "elso";
    $con = connect("root","",$dbname);
    

    session_start(); //OP
    $query ="insert into igeversek(name,image,username,topic,testament) values ('".$trájm."','".$beirando."','".$_SESSION["user"]."','".$_POST["_topic"]."','".$_POST["_testament"]."');";
    $result = mysqli_query($con,$query);
    if(!$result)
    {
        if(mysqli_errno($con)==1062) echo "A kép vagy név már létezik!";
        else echo mysqli_errno($con)."Hiba: ".mysqli_error($con);
    }
    else
    {
        if(!file_exists("igevers/".$trájm))
        {
            mkdir("igevers/".$trájm);
        }
        move_uploaded_file($_FILES["_kep"]["tmp_name"],$beirando);
        echo "Sikeres hozzádás!";
        echo '<meta http-equiv="refresh" content="3; URL=index.php?d=3">';//visszadobjon az igevers hozzásához
    }
    mysqli_close($con);
}
?>
</body>
</html>