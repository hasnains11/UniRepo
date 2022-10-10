<?php
require './Connection.php';

if(isset($_POST["limit"], $_POST["start"]))
{  $query = "SELECT * FROM countries LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($conn, $query);
 while($row = mysqli_fetch_array($result))
 {

    echo"
    <div class=\"card\" style=\"width:18rem\">
    <img class=\"card-img-top\" src=\"{$row["flagurl"]}\" alt=\"Card image cap\">
    <div class=\"card-body\">
      <h5 class=\"card-title\">{$row["name"]}</h5>
      <center><p class=\"card-text\">
        <li>Population:{$row["population"]}</li>
        <li>Region:{$row["region"]}</li>
      </p>
      </center>
    </div>
  </div>
  <br/>
  <br/>
  
  ";

 }
}
?>