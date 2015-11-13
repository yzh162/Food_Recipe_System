
 
  <?php
//require_once 'dbsetup.php';
  try {
$dbh = new PDO('mysql:host=localhost;dbname=my_db', 'root', 'root');
echo"<b>Information about:</b>";
echo $_GET['recipe'];
echo "<br>";

$id = isset($_GET['recipe']) ? $_GET['recipe'] : false;
if ($id === false) {
    exit("missing input");
}
   
     $ppp =$_GET['recipe'];
     $result="SELECT * FROM Recipes WHERE Recipe_name='$ppp' ";
  //   echo "ee";
     foreach ($dbh->query($result) as $row)
        {
            $dddd =$row['Recipe_name']; 
           // echo $dddd;
        //    echo "<a href='newEmptyPHP.php?recipe=$dddd'>$dddd</a>  <br>";        
        
  echo "<br> Recipe_name:". $row['Recipe_name'] . "</tr> ";
  echo "<br> Recipe_description:". $row['Recipe_description']."</tr>";
  echo "<br> Cooking_time:". $row['Cooking_time']."</tr>";
  echo "<br> Pre_time:". $row['Pre_time']."</tr>";
  echo "<br> Skill_level:". $row['Skill_level']."</tr>";
  echo "<br> Recipe_create_time:". $row['Recipe_create_time']."</tr>";
  echo "<br> Recipe_update_time:". $row['Recipe_update_time']."</tr>";
  echo "<br> Taste:". $row['Taste']."</tr>";
  echo "<br> Cuisines:". $row['Cuisines']."</tr>";
  echo "<br> Recipe_Rating:". $row['Recipe_Rating']."</tr>";
  echo "<br> Recipe_Comments:". $row['Recipe_Comments']."</tr>";
            
        echo "</tr>";
        }

  }
  catch (PDOException $e) {
      print $e->getMessage();
  }

         //   echo "<b>Information about:</b>";
?>
    


