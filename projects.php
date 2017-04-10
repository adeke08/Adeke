<?
session_start();
require "db.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST['newproject'])){
      
      $project = R::dispense('project');
      $project->name = $_POST['name'];
      $project->purpose = $_POST['purpose'];
      $project->description = $_POST['description'];
      $project->category = $_POST['category'];
      $project->client = $_POST['client'];
      $project->start = $_POST['start'];
      $project->end = $_POST['end'];
      $project->role = $_POST['role'];
      $code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0,5);
      $project->project_code= $code;
      R::store($project);

      $joinedproject = R::dispense('joinedproject');
      $joinedproject->code = $code;
      $joinedproject->role = 'product owner';
      $joinedproject->username = $_SESSION['username'];
      $joinedproject->status = 2;
      R::store($joinedproject);

      echo "<script> alert('Project created'); </script>";
    }
    if(isset($_POST['join'])){
      $joinedproject = R::dispense('joinedproject');
      $joinedproject->code = $_POST['code'];
      $joinedproject->role = $_POST['role'];
      $joinedproject->username = $_SESSION['username'];
      $joinedproject->status = 1;
      R::store($joinedproject);
      echo "<script> alert('You have joined'); </script>";


    }

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript" charset="utf-8" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://fancyapps.com/fancybox/source/jquery.fancybox.pack.js?v=2.0.5"></script>
  <link rel="stylesheet" type="text/css" href="http://fancyapps.com/fancybox/source/jquery.fancybox.css?v=2.0.5" media="screen" />

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/media.css">
  <style>
  
  </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container">
          
            <ul class="nav navbar-nav navbar-left logo_side">
                <a  href="#"><img src="img/logo.png"  width="100" height="50" alt="" /></a>
                <p>MySCRUM</p>
            </ul>
            

                <ul class="nav navbar-nav navbar-right menu_side">
                <li class="active"><a href="projects.php">Projects</a></li>
                   <li ><a href="mainpage.php">Overview</a></li>
                   <li ><a href="scrumboard.php">Scrumboard</a></li>
                   <li> <a>|</a> </li>    
                     <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="glyphicon glyphicon-user"></i>  <?=$_SESSION['username']?>  <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">My profile</a></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="index.php">Exit</a></li>
                        </ul>
                    </li>
                </ul>

           
        </div>
</div>
       
<div class="container text-center topside2">    
     
</div>

<div class="container">
  <div class="row content">
    <div class="col-md-12 projects">
    <br>
    <h3>Projects</h3> 
    <p> Start your own project or join to another </p> 
    <button href="#register" id="btnForm"> Create</button> 
    <button href="#join" id="btnForm">Join</button>
    <hr>
    <?php

          $sQuery = "
          select p.name 
          from joinedproject j, project p 
          where p.project_code=j.code 
          and j.username= '".$_SESSION['username']."' " ;
         // echo $sQuery;
          $rows = R::getAll($sQuery);
          foreach ($rows as  $row) {
          echo $row['name'];  

          echo '<hr>';
          }
        ?>
  
    
     
    </div>

    </div>
  </div>
</div>





           <div id="register" class="create_pr_form" >

    <p align="center">New project</p>
      <div class="row">
      <div class="col-md-4 create_pr_inside">
            <p>Project name *</p> 
            <p>Purpose</p> 
            <p>Description</p> 
            <p>Category</p> 
            <p>Сustomer</p>
            <p>Start</p> 
            <p>End</p> 
            <p>I am:</p> 
      </div>
      <form action="" method="POST">
      <div class="col-md-8 create_pr_inside">
      
            <input type="text" name="name" placeholder="Enter the name of the project" /> <br>
            <input type="text" name="purpose" placeholder="Purpose of the project" /> <br>
            <input type="text" name="description" placeholder="Describe the project"> <br>
            <input type="text" name="category" placeholder="Category name" /> <br>
            <input type="text" name="client" placeholder="Client or company name" /> <br>
            <input type="date" name="start" name="created">
             <input type="date" name="end" name="created">
            <input list="role" name="role" placeholder="Your role in this project" >
            <datalist id="role">
              <option value="Product owner">
              <option value="Scrum master">
              <option value="Member">
            </datalist>
            <input type="submit" name="newproject" value= "Save">
      
      </div>
      </form>
      </div>
</div>

<div id="join" class="create_pr_form" >

    <p align="center">Join to existing project</p>
      <div class="row">
      <div class="col-md-4 create_pr_inside">
            <p>Project code *</p> 
            <p>You are:</p> 
            
      </div>
      <form action="" method="POST">
      <div class="col-md-8 create_pr_inside">
            <input type="text" name="code" placeholder="Enter the CODE of the project" /> <br>
              <input list="role" name="role" placeholder="Your role in this project" >
            <datalist id="role">
              <option value="Product owner">
              <option value="Scrum master">
              <option value="Member">
            </datalist>
           <input type="submit" name="join" value= "Join">

      </div>
      </form>
      </div>
</div>









</body>
<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

<script type="text/javascript">
$("#btnForm").fancybox();
</script>
</html>
