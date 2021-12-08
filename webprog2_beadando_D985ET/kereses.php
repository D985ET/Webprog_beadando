<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <title>Igevers Keresés</title>
  </head>
  <body>
  <div id="search">
    <form class="searchIgevers" action="" method="post">
      <label style="margin-left:55px;">Testamentum: </label>
      <select name="selectIgevers">
        <option value="Ószövetség">Ószövetség</option>
        <option value="Újszövetség">Újszövetség</option>
      </select>
      <input type="submit" name="searchByTestament" id="button" value="Keres">
      <label>Keresés Téma szerint: </label>
      <select name="selectTopic">
        <option value="Hit">Hit</option>
        <option value="Szeretet">Szeretet</option>
        <option value="Erő">Erő</option>
      </select>
      <input type="submit" name="searchByTopic" id="button" value="Keres">
    </form>
  
  </body>

</html>
<?php
    
    require_once "mydbm.php";

    $connection = connect("root","","elso");

    if(isset($_POST['searchByTestament']))
    {
        $result = mysqli_query($connection,
        "select name,image,username,topic,testament from igeversek where testament='".$_POST['selectIgevers']."';");
    }
    if(isset($_POST['searchByTopic']))
    {
        $result = mysqli_query($connection,
        "select name,image,username,topic,testament from igeversek where topic='".$_POST['selectTopic']."';");
        
    }
    
    while(list($name,$image,$username,$topic,$testament)=mysqli_fetch_row($result))
    {
          echo '<div class="list">
              <img src="'.$image.'" alt="táblakép" height=200px>
              <p>Igevers:  '.$name.'</p>
              <p>Testamentum: '.$testament.'</p>
              <p>Téma:  '.$topic.'</p>
              <p>Felhasználó: '.$username.'</p></div>';        
    }
    mysqli_close($connection);
   ?>
   </div>