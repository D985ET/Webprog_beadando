<!DOCTYPE html>
<html>
    <head>
        
       <meta charset="UTF-8">
        <meta http-equiv="content-style-type" content="text/css">
        <link rel="stylesheet" type="text/css" href="css/webpage.css">
        <title>Regisztráció</title>
        <style>
            .error
            {
                color: orangered;
               
            }
        </style>
    </head>
    <body>
    <?php
            function test_input($data)
            {
                $data = trim($data);//leszedi a felesleges space/tab/newline karaktereket
                $data = stripslashes($data);//leszedi a "\" karaktert
                $data = htmlspecialchars($data);//speciális karaktereket átkonvertál html olvashatóváa
                return $data;
            } 
            $usernameErr = $emailErr = $passwdErr = $imgErr = "";
            $username = $email = $passwd = $img = "";
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                //username
                if(empty($_POST["_username"]))
                {
                    $usernameErr = "Név hiányzik!";
                }
                else
                {
                    $username = test_input($_POST["_username"]);
                }
                //passwd
                if(empty($_POST["_passwd"]))
                {
                    $passwdErr = "Jelszó hiányzik!";
                }
                else
                {
                    $passwd = test_input($_POST["_passwd"]);
                }
                //email
                if(empty($_POST["_email"]))
                {
                    $emailErr = "Email hiányzik";
                }
                else
                {
                    $email = test_input($_POST["_email"]);
                }
                //img
                if(empty($_POST["_img"]))
                {
                    $imgErr = "";
                }
                else
                {
                    $img = test_input($_POST["_img"]);
                }
            }
        ?>
        <div id="useradd">
        <h2>Új felhasználó hozzáadása:</h2>
        <span class="error"><b>A *-gal jelölt mezők kitöltése kötelező</b></span>
        <form method="POST" action="" enctype=multipart/form-data>
        <table>
            <tr><td>Felhasználónév</td><td><input type="text" name="_username" pattern="[A-Z a-z 0-9]*" required><span class="error">*<?php echo $usernameErr;?></span></td></tr>
            <tr><td>Jelszó</td><td><input type="password" name="_passwd" pattern="[A-Z a-z 0-9]*" required><span class="error">*<?php echo $passwdErr;?></span></td></tr>
            <tr><td>Email</td><td><input type="email" name="_email" required><span class="error">*<?php echo $emailErr;?></span></td></tr>
            <tr><td>Profilkép</td><td><input type="file" name="_img" required><span class="error">*<?php echo $imgErr;?></span></td></tr>
            <tr><td><input type="reset" value="Töröl" name="delete" class="button1"></td> <td><input type="submit" value="Elküld" name="sendo" class="button2"></td></tr>
            
        </table>
        </form>
        </div>
        
        <?php
        if(isset($_POST["sendo"]))
        {
            require_once "mydbm.php";
            $filename = trim($_FILES["_img"]["name"]);//MÓDOSÍTÁS
            $filename = rand().$filename;

            $beirando = "users/".$_POST["_username"] . "/".$filename;//kép

            $dbname="elso";

            $con = connect("root","",$dbname);
            
            $query="insert into users(uname,email,passwd,img,authority) values ('".$_POST['_username']."','"
            .$_POST['_email']."', md5('".$_POST['_passwd']."'),'".$beirando."','user');";

           //$result=mysqli_query($con,$query);//aki bejelntkezett annak az adatait tároljuk
           $result = mysqli_query($con,$query);
           
            if (!$result)
            {
                if(mysqli_errno($con)==1062) echo "Ezzel az e-mail címmel vagy felhasználónévvel már regisztráltak";
                else echo mysqli_errno($con)."Hiba: ".mysqli_error($con);
             }
            else
            {
                mkdir("users/".$_POST["_username"]);
                move_uploaded_file ($_FILES['_img']['tmp_name'],"users/".$_POST["_username"]."/".$filename);
                echo "<div class=regisztracio>";
                echo '<meta http-equiv="refresh" content="3; URL=index.php?d=2">';
                echo "Sikeres regisztráció";
                echo "</div>";
            }
            mysqli_close($con);

        }
        ?>
    </body>
</html>