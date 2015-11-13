<?php

  try {

	if ($_FILES["file"]["type"] == "image/gif" || $_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/pjpeg") 
            {
		
          
                $dbh = new PDO('mysql:host=localhost;dbname=my_db', 'root', 'root');
            
            if ($_FILES["file"]["error"] > 0) {
			echo "Error: " . $_FILES["file"]["error"];
		}
		else {
			echo "Upload: " . $_FILES["file"]["name"];
			echo "<br />";
			echo "Size: " . $_FILES["file"]["size"];
		}

		//require_once 'dbsetup.php';
                              
                
                $PicFile = $_FILES["file"]["tmp_name"];
		if ($PicFile == "none") {
			die("no file");
		}

		$PicSize = filesize($PicFile);
		$sqlPic = addslashes(fread(fopen($PicFile, "r"), $PicSize));
		unlink($PicFile);
             $emil   =$_POST['email_add'];
             $ursename= $_POST['username'];
             $psw=$_POST['psw'];
                
	$sql="INSERT INTO User (Email_address, Username,Password,Headshot) VALUES ('$emil','$ursename','$psw','" . $sqlPic . "')";
	$dbh->query($sql);
		
        
            
		echo "picture saved.";

		/*
		if (file_exists("pic/" . $_FILES["file"]["name"])) {
			echo $_FILES["file"]["name"] . " already exists.";
		}
		else {
			move_uploaded_file($_FILES["file"]["tmp_name"], "pic/" . $_FILES["file"]["name"]);
		}
		*/
	}
	else {
		echo "Invalid file";
	}
        
            }
		catch (PDOException $e) {
			print "DB Connection Error!: " . $e->getMessage();
			die();
		}
        
        
?>