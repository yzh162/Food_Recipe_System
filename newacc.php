<?php
 try {
$dbh = new PDO('mysql:host=localhost;dbname=my_db', 'root', 'root');
if (isset($_POST['submit']))
{
    if ($_POST['email_add']=="" || $_POST['username']=="" || $_POST['psw']=="" )
{
echo '<script type="text/javascript">'; 
echo 'alert("Please check the information. Email, Username and password cannot be NULL");'; 
echo 'window.location.href = "Welcome.php";';
echo '</script>';
exit();
}  
$email_add=$_POST['email_add'];
$usrname=$_POST['username'];
$passwd=$_POST['psw'];


if ($_FILES["file"]["type"] == "image/gif" || $_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/pjpeg") 
{
    
            if($_FILES['file']['size']>=16000000)
            {
                echo "The image is too Large";
                exit();
            }
            elseif ($_FILES['file']['size']<=16000000)
                {      
                $dbh = new PDO('mysql:host=localhost;dbname=my_db', 'root', 'root');
            
                 if ($_FILES["file"]["error"] > 0) {
			echo "Error: " . $_FILES["file"]["error"];
                        exit();
		}

                $PicFile = $_FILES["file"]["tmp_name"];
		if ($PicFile == "none") {
                        echo "no pic";
			die("no file");
		}

		$PicSize = filesize($PicFile);
		$sqlPic = addslashes(fread(fopen($PicFile, "r"), $PicSize));
		unlink($PicFile);
                $emil   =$_POST['email_add'];
                $ursename= $_POST['username'];
                $psw=$_POST['psw'];
                
                
                $dt = new DateTime();
                $EEE=$dt->format('Y-m-d H:i:s');
 
                $quet="UPDATE User SET Last_login_time='$EEE' Where Email_address='$ppp'";
                $dbh->query($quet);
     
                
                
                $sql="INSERT INTO User (Email_address, Username,Password,Headshot) VALUES ('$email_add','$usrname','$passwd','" . $sqlPic . "')";
                $dbh->query($sql);

                echo "Congratulations! $usrname has been created successfully!";
                $result="SELECT * FROM User WHERE Email_address='$email_add' ";
                //   echo "ee";
                echo "$image";   
    
                foreach ($dbh->query($result) as $row)
                {     
                    echo "<br> Email_address:". $row['Email_address'] .   "</tr> ";
                    echo "<br> Username:". $row['Username'] .   "</tr> ";
                    echo "<br> Password:". $row['Password']."</tr>";
                    echo '<br> Headshot: <img src="data:image/jpeg;base64,'.base64_encode( $row['Headshot'] ).' "   style="width:100px;height:100px" >';
                    echo "<br> User_Created_time:". $row['User_Created_time']."</tr>";
                 //   echo "<br> Last_login_time:". $row['Last_login_time']."</tr>";

                }
            }
    }
    
        elseif($_POST['file']=="") {
            
            
                $sql="INSERT INTO User (Email_address, Username,Password) VALUES ('$email_add','$usrname','$passwd')";
                $dbh->query($sql);

                echo "Congratulations! $usrname has been created successfully!";
                $result="SELECT * FROM User WHERE Email_address='$email_add' ";
                //   echo "ee";
                //echo "$image";   
    
                foreach ($dbh->query($result) as $row)
                {     
                    echo "<br> Email_address:". $row['Email_address'] .   "</tr> ";
                    echo "<br> Username:". $row['Username'] .   "</tr> ";
                    echo "<br> Password:". $row['Password']."</tr>";
                   // echo '<br> Headshot: <img src="data:image/jpeg;base64,'.base64_encode( $row['Headshot'] ).' "   style="width:100px;height:100px" >';
                    echo "<br>Headshot: NULL";
                    echo "<br> User_Created_time:". $row['User_Created_time']."</tr>";
                 //   echo "<br> Last_login_time:". $row['Last_login_time']."</tr>";

                }
            
            
        }
	else {
		echo "Invalid file";
                exit();
	} 
    
}
elseif (isset($_POST['cancel']))
{
    echo '<script type="text/javascript">'; 
 //   echo 'alert("Please check the information. Email, Username and password cannot be NULL");'; 
    echo 'window.location.href = "Welcome.php";';
    echo '</script>';
    
}





 }
  catch (PDOException $e) {
      print $e->getMessage();
  }
  ?>