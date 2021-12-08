<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-style-type" content="text/css">
        
    </head>
    <body>
    <?php
    
    $nameErr = $imgErr = "";
    $name = $img = "";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    //username
    if(empty($_POST["_nev"]))
    {
        $nameErr = "Név hiányzik!";
    }
    else
    {
        $name = test_input($_POST["_nev"]);
    }
    //img
    if(empty($_POST["_kep"]))
    {
        $imgErr = "";
    }
    else
    {
        $img = test_input($_POST["_kep"]);
    }
}
?>
    <div id="igevershozzaadas">
    <form name="igevershozzad" method="POST" action="addigevers.php"   enctype=multipart/form-data>
        <table style=>
            <tr><td>Igevers helye:</td><td><input type="text" name="_nev" pattern="([^\s][A-z0-9À-ž\s]+)" placeholder="pl: Jelenések 21/4"><span class="error">*<?php echo $nameErr;?></span></td></tr>
            <tr><td>Igevers:</td><td><input type="file" name="_kep" required><span class="error">*<?php echo $imgErr;?></span></td></tr>
            <tr><td>Téma:</td><td><select name="_topic"><option value="Szeretet">Szeretet</option>
            <option value="Hit">Hit</option><option value="Erő">Erő</option></select></td></tr>
            <tr><td>Testamentum:</td><td><select name="_testament"><option value="Ószövetség">Ószövetség</option><option value="Újszövetség">Újszövetség</option></select>
            <tr><td><input type="reset" value="Töröl" name="delete" class="button1"></td> <td><input type="submit" value="Elküld" name="_add" class="button2"></td></tr> 
        </table>
    </form>
    </div>
    </body>
</html>