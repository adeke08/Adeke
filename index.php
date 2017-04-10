<?
require "db.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['newuser'])){
      $users = R::dispense('users');
      $users->username = $_POST['username'];
      $users->mail = $_POST['mail'];
      $users->password = md5($_POST['password']);
      $users->password2 = md5($_POST['password2']);
      R::store($users);
      echo "<script> alert('User added'); </script>";
    }
  if(isset($_POST['login'])){
      $loginsql = "select * from users where username = '".$_POST['username']."'
    and password = '".md5($_POST['password'])."' ;";
    $user = R::getAll($loginsql);
      if($user){
      session_start();
      $_SESSION['username'] = $_POST['username'];
      header('Location: projects.php');
    }
  }
  if(isset($_POST['reg'])){
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
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>MyScrum</title>
  <meta charset="utf-8">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script type="text/javascript" charset="utf-8" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://fancyapps.com/fancybox/source/jquery.fancybox.pack.js?v=2.0.5"></script>
  <link rel="stylesheet" type="text/css" href="http://fancyapps.com/fancybox/source/jquery.fancybox.css?v=2.0.5" media="screen" />

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
                   <li><a href="#services-sec">About MyScrum</a></li>
                   <li><a href="#gallery-sec">Features</a></li>
                       <li><a href="#register" id="btnForm">Register</a></li>

                </ul>

           
        </div>
</div>
       


<div class="container topside">    
      <div class="topside_video">
        <video autoplay loop class="fillWidth">
        <source src="video/back.mp4" type="video/mp4"/>
        <source src="video/back.webm" type="video/webm"/>
        </video>
      </div>
</div>

<div class="container " style="margin-top: -350px; margin-bottom: 100px;">
    <div class="row">
          <div class="col-md-3">
            <div class="login_card">
               <h1>Log-in</h1>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" accept-charset="UTF-8">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="login"  value="login">Sign-Up</button>
                </form>
            </div>
          </div>
      </div>
</div>
          



 <div class="container basic-set" >
                <div class="row text-center">
                    <div class="col-md-12">
                        <h3 >Why <span class="logo_name">MySCRUM</span>?</h3>
                        
                    </div>
                </div>
           <div class="row" >
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="txt-block">

              
                <i class="fa fa-clone fa-4x"></i>
                  <h3>Convenience</h3>
                  <p>
                    Convenient work with the backlog of user stories
                  </p>
                      </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="txt-block">

              
                <i class="fa fa-cog fa-4x"></i>
                  <h3>Control</h3>
                  <p>
                    Velocity development speed measurement and its use for release and iteration planning
                  </p>
                      </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="txt-block">

              
                <i class="fa fa-calendar-check-o fa-4x"></i>
                  <h3>Flexibility</h3>
                  <p>
                    Making the management of your work and the use of the tool not just easy but uncompromisingly simple!
                  </p>
                      </div>
            </div>
        </div>
           </div>




           <div id="register" class="reg_form" >

    <div class="reg_form_img">
       <img src="http://corpix-templates.ru/upload/000/u1/88/8b/my-delaem-drug-druga-silnee-i-vmeste-pokorjaem-vershiny-photo-sli.jpg" alt="" />
      </div>
      <form action="" method="POST">
      
      <div class="reg_form_inside">
      <input type="text" name="username" placeholder="Username" /> <br>
      <input type="text" name="mail" placeholder="Email" /> <br>
      <input type="password" name="password" placeholder="Password" /> <br>
      <input type="password" name="password2" placeholder="Confirm Password" /> <br>
      <input type="submit" name="newuser" value= "Register">
       </div>
       </form>
</div>

<script type="text/javascript">
$("#btnForm").fancybox();
</script>

  <footer class="text-center container-fluid">
    <p>Application for Scrum</p>
  </footer>
</body>
</html>
