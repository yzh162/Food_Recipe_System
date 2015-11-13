
 
  <?php
//require_once 'dbsetup.php';
  try {
$dbh = new PDO('mysql:host=localhost;dbname=my_db', 'root', 'root');
echo"<b>Information about:</b>";
echo $_GET['user'];
echo "<br>";

$id = isset($_GET['user']) ? $_GET['user'] : false;
if ($id === false) {
    exit("missing input");
}
   
     $ppp =$_GET['user'];
     $result="SELECT * FROM User WHERE Email_address='$ppp' ";
  //   echo "ee";
     foreach ($dbh->query($result) as $row)
        {
            $dddd =$row['Recipe_name']; 
           // echo $dddd;
        //    echo "<a href='newEmptyPHP.php?recipe=$dddd'>$dddd</a>  <br>";        

    echo "<br> Username:". $row['Username'] . "</tr> "; 
    echo "<br> Password:". $row['Password']."</tr>";
    echo "<br> Headshot:". $row['Headshot']."</tr>";
    echo "<br> User_Created_time:". $row['User_Created_time']."</tr>";
    echo "<br> Last_login_timeword:". $row['PassLast_login_timeword']."</tr>";
            
        echo "</tr>";
        }

  }
  catch (PDOException $e) {
      print $e->getMessage();
  }

         //   echo "<b>Information about:</b>";
?>
    


