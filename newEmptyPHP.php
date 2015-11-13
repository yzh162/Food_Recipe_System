

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
     
     date_default_timezone_set("America/New_York");
     $EEE= date("Y-m-d H:i:s") ;
     
     $quet="UPDATE User SET Last_login_time='$EEE' Where Email_address='$ppp'";
     $dbh->query($quet);
     
       
     
     $result="SELECT * FROM User WHERE Email_address='$ppp' ";
  //   echo "ee";
     foreach ($dbh->query($result) as $row)
        {
           // echo $dddd;
        //    echo "<a href='newEmptyPHP.php?recipe=$dddd'>$dddd</a>  <br>";        

  echo "<br> Username:". $row['Username'] .   "<a href='UpdateUsername.php'>Update Username</a> </tr> ";
  echo "<br> Password:". $row['Password']."</tr>";
  if($row['Headshot']==""){
      echo '<br>Headshot: NULL <a href="UpdateHead.php">Update Headshot</a>';
  }
  else {
     echo '<br> Headshot: <img src="data:image/jpeg;base64,'.base64_encode( $row['Headshot'] ).' " style="width:100px;height:100px"> <a href="UpdateHead.php">Update Headshot</a> ';
  }
  echo "<br> User_Created_time:". $row['User_Created_time']."</tr>";
  echo "<br> Login_time:". $row['Last_login_time']."</tr>";
            
        echo "</tr>";
        }

  }
  catch (PDOException $e) {
      print $e->getMessage();
  }

         //   echo "<b>Information about:</b>";
?>
    


