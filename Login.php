  <?php
//require_once 'dbsetup.php';
  try {   
$dbh = new PDO('mysql:host=localhost;dbname=my_db', 'root', 'root');
$id1 = isset($_POST['email_adr']  ) ? $$_POST['email_adr'] : false;


if (isset($_POST['submit']))
{
    $name=$_POST['email_adr'];
    $passw=$_POST['psw'];

        if ($_POST['email_adr']=="" || $_POST['psw']=="") {
   
        echo "Email Address AND Password can not be null <br>";
        echo "<a href='Welcome.php?user=User'>Return to Login Page</a>  <br>";  
        exit;
        }
        
        $result = "SELECT Email_address FROM User WHERE Email_address='$name' AND Password='$passw'";
      
          $rs=$dbh->query($result) ;
          $num_rows = $rs->rowCount();
        
     if ($num_rows)
     {
         echo "Welcome back to Account:$name";
         echo "<li>
            <a href='newEmptyPHP.php?user=$name'>Account Information</a>  <br>
            </li>
            <li>
            <a href='uploadecipe.php?user=$name'> Upload Recipes</a>
            </li>
            <li>
            <a href='newEmptyPHP.php?user=$name'> My recipes</a>
            </li>";        
    }
    else 
    {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please check the information. Email or Password is Wrong");'; 
    echo 'window.location.href = "Welcome.php";';
    echo '</script>';
        
    }
    
    
 }    
    
    elseif (isset($_POST['new_acc']))
    {        
    echo " <form enctype='multipart/form-data' action='newacc.php'  method='post'>  
    Email Address: <input type='text' name='email_add' > (*) <br> 
    UseRname: <input type='text' name='username'>  (*) <br> 
    Password: <input type='password' name='psw'>   (*) <br>
    Headshot: <input type='file' name='file' id='file'> <br> 
    <input type='submit' name='submit' value='Create New Account'>
    <input type='submit' name='cancel' value='Not to Create New Account'>
</form>";
    }  


  }
  catch (PDOException $e) {
      print $e->getMessage();
  }

  
         //   echo "<b>Information about:</b>";
?>

 








 

