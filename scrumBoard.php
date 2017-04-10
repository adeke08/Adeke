<?
require "db.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['newproject'])){
    $user = R::getAll('select * from users where email= :login',
    array(':login'=>$_POST['login']));
      if(!$user){
      $_SESSION['login'] = $_POST['login'];
      $users = R::dispense('users');
      $users->name = $_POST['name'];
      $users->email = $_POST['email'];
      $users->password = md5($_POST['password']);
      R::store($users);
      echo "<script> alert('User added'); </script>";
    }
  }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>MyScrum</title>
  <meta charset="utf-8">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/media.css">

</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container">
          
            <ul class="nav navbar-nav navbar-left logo_side">
                <a  href="#"><img src="img/logo.png"  width="100" height="50" alt="" /></a>
                <p>MySCRUM</p>
            </ul>
            

                <ul class="nav navbar-nav navbar-right menu_side">
                   <li><a href="Projects.php">Projects</a></li>
                   <li><a href="mainpage.php">Overview</a></li>
                   <li class="active"><a href="scrumboard.php">Scrumboard</a></li>
                   <li> <a>|</a> </li>    
                     <li class="dropdown">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="glyphicon glyphicon-user"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">AAA</a></li>
                            <li><a href="#">BBB</a></li>
                            <li><a href="#">Settings</a></li>
                        </ul>
                    </li>
                </ul>

           
        </div>
</div>
       
<div class="container topside2">    
      
</div>


<div class="container scrum_board" >
                
           <div class="row" >
            <div class="col-md-3 notes">
                <h3> <i class="glyphicon glyphicon-list"></i> Product backlog</h3> <i class="glyphicon glyphicon-share-alt"></i>
                  <hr>
                      
            </div>

            <div class="col-md-3 notes">
                <h3> <i class="glyphicon glyphicon-send"></i> To do</h3>
                  <hr>
                
            </div>
            
            <div class="col-md-3 notes">
                <h3> <i class="glyphicon glyphicon-time"></i> In progress</h3>
                  <hr>
                
            </div>

         <div class="col-md-3 notes">
                <h3> <i class="glyphicon glyphicon-check"></i> Done</h3>
                <hr>
                  
                     
        </div>

           </div>
           </div>






  <footer class="text-center container-fluid">
    <p>Application for Scrum</p>
  </footer>





</body>
</html>
