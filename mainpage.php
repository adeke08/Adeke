<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
                <li ><a href="projects.php">Projects</a></li>
                   <li class="active" ><a href="mainpage.php">Overview</a></li>
                   <li ><a href="Scrumboard.php">Scrumboard</a></li>
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

<div class="container">
  <div class="row content">
    <div class="col-sm-3">
      <br>
      <ul class="nav nav-pills nav-stacked">
        <li ><a id="project_info" href="#section3">Project info</a></li>
        <li><a id="sprints" href="#section3">Sprints</a></li>
        <li><a id="backlog" href="#section3">Backlog</a></li>
        <li><a id="team" href="#section3">Team</a></li>
      </ul>
      <br>
    </div>

    <div class="col-sm-9">
      <div class="project_info">
      asdfasdf adsfasdf
      </div>
      <div class="sprints">
      asdfasdf adsfasdf
      </div>
      <div class="backlog">
      asdfasdf adsfasdf
      </div>
      <div class="team">
      asdfasdf adsfasdf
      </div>

    </div>
  </div>
</div>











<script>
$(document).ready(function(){
    $("#project_info").click(function(){
      $(".project_info").show();
        $(".sprints").hide();
          $(".backlog").hide();
            $(".team").hide();
    });
    $("#sprints").click(function(){
        $(".project_info").hide();
          $(".sprints").show();
          $(".backlog").hide();
            $(".team").hide();
    });
     $("#backlog").click(function(){
        $(".project_info").hide();
          $(".sprints").hide();
          $(".backlog").show();
            $(".team").hide();
    });
     $("#team").click(function(){
        $(".project_info").hide();
          $(".sprints").hide();
          $(".backlog").hide();
            $(".team").show();
    });
});
</script>


</body>
<footer class="container-fluid">
  <p>Footer Text</p>
</footer>
</html>
