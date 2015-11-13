<html>
    <head>
        <meta charset="UTF-8">
        <title>Food Recipes:Enables users to upload and share recipes with others</title>
        <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="csss.css" rel="stylesheet">
    </head>

<body>

 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Food Recipes</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="Welcome.php?user=User">User</a> 
                    </li>
                    <li>
                        <a href="Welcome.php?recipe=Recipes">Recipes</a> 
                    </li>
                         
                    

                </ul>
            </div>
        </div>
    </nav>

    <header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="tagline">Find More Delicious Food</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    

    <div class="container">

        <hr>

        <div class="row">
            <div class="col-sm-8">
                <h2>Login</h2>
                 <form action="Login.php" method="post" name="loginin">
                   Email Address:<br><input type="text" name= "email_adr" ><br>
                   Password:<br> <input type="password" name="psw" ><br>
                   <input type="submit" value="Submit" name="submit">
                   <input type="submit" value="New Account" name="new_acc">
                   

               </form>>
               
                
                
               
  <?php
  try {
$dbh = new PDO('mysql:host=localhost;dbname=my_db', 'root', 'root');
echo"<b>Information about:</b>";
     if($_GET['user']=='User')      
      {
            echo $_GET['user'];
            echo "<br>";

            $sth='SELECT * FROM User';
        foreach ($dbh->query($sth) as $row)
        {
            $ddd =$row['Email_address']; 
            //echo "qq";
            echo "<a href='newEmptyPHP.php?user=$ddd'>$ddd</a>  <br>";        
        
        echo "</tr>";
        }
      }

       elseif($_GET['recipe']=='Recipes')      
      {
            echo $_GET['recipe'];
            echo "<br>";

            $sth='SELECT * FROM Recipes';
        foreach ($dbh->query($sth) as $row)
        {
            $dddd =$row['Recipe_name']; 
           // echo $dddd;
            echo "<a href='detail1.php?recipe=$dddd'>$dddd</a>  <br>";        
        
        echo "</tr>";
        }
      }

  }
  catch (PDOException $e) {
      print $e->getMessage();
  }

         //   echo "<b>Information about:</b>";
?>
                
                
                
                
                
                
                
                
            </div>
            
        </div>

        <hr>

   <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Want to Find More Information</h2>
                <p>Feel free to contact us if you have interest and questions. </p>

                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/sportstutoring" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                    <li>
                        <a href="" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Linkedin</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>



        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Sports Tutoring &copy; 2015|All Rights Reserved </p>
                </div>
            </div>
        </footer>

    </div>


    </body>
</html>

 
    


