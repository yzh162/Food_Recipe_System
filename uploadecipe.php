<?php
 try {
$dbh = new PDO('mysql:host=localhost;dbname=my_db', 'root', 'root');


    echo " <form enctype='multipart/form-data' action='upload.php'  method='post'>  
    Recipe name: <input type='text' name='Recipe_name' > (*) <br> 
    Recipe Description: <input type='text' name='Recipe_description'>  <br> 
    Cooking Time: <input type='text' name='cookingtime'>  <br>
    Prepare Time: <input type='text' name='pretime' ><br> 
    Skill_level: <input type='text' name='skilllevel'> <br>
    
    <input type='submit' name='submit' value='Create New Recipe'> 
    <input type='submit' name='cancel' value='Not to Create New Recipe'>

</form>";

if ($email_add)
{
    
}
$sql="INSERT INTO User(Email_address, Username,Password,Headshot)  VALUES('$email_add','$usrname','$passwd','$image')";
$dbh->query($sql);


    echo "Congratulations! $usrname has been created successfully!";
    $result="SELECT * FROM User WHERE Email_address='$email_add' ";
  //   echo "ee";
 echo "$image";   
    
foreach ($dbh->query($result) as $row)
{     
  echo "<br> Username:". $row['Username'] .   "</tr> ";
  echo "<br> Password:". $row['Password']."</tr>";
  //echo '<br> Headshot: <img src="data:image/jpeg;base64,'.base64_encode( $row['Headshot'] ).' "> <a href="UpdateHead.php">Update Headshot</a> ';

  echo "<br> User_Created_time:". $row['User_Created_time']."</tr>";
  echo "<br> Last_login_timeword:". $row['PassLast_login_timeword']."</tr>";

 }
 
 
 
 }
 
  catch (PDOException $e) {
      print $e->getMessage();
  }
  ?>