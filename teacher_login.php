<?php
	require 'dbconfig/config.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OneSchool</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25">
            <img style="width: 75px; text-align: center;border-radius: 50px;" src="images/Logo.jpg">
          </div>
          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="home.php" class="nav-link">Home</a></li>
                <li><a href="student_login.php" class="nav-link">Student</a></li>
                <li><a href="teacher_login.php" class="nav-link">Teachers</a></li>
                <li><a href="reading_section.php" class="nav-link">Reading Section</a></li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="#contact-section" class="nav-link"><span>Contact Us</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/Home_background.jpeg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">Expertise Pupils</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200"></p>

                </div>

                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                  <form method="post" class="form-box">
                    <h3 class="h4 text-black mb-4">Teacher Login</h3>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email Addresss" name="input_username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" name="input_password">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="Sign in" name="login_button">
                    </div>
                  </form>
                </div>
                <<?php 
                  	if(isset($_POST['login_button'])){
						$username = $_POST['input_username'];
						$password = $_POST['input_password'];
						$access = 'Teacher';

						$query = "select * from login where uname='$username' and password='$password' and access='$access'";
						$query_run = mysqli_query($con,$query);
						if(mysqli_num_rows($query_run)>0){
								echo '<script type ="text/javascript"> alert("Login succesfull")</script>';
                while($row=mysqli_fetch_array($query_run)){
                                   $name = $row['name'];
                  }

                //to pass variable to all the sessions 
                $_SESSION['username']=$username;
                $_SESSION['access']=$access;
                $_SESSION['full_name'] = $name;
                echo "<script>location.href='teacher_home.php'</script>";

						}
						else{
							echo '<script type ="text/javascript"> alert("Invalid username or password")</script>';
						}

					}
                   ?>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    
    <

       
<div class="site-section bg-light" id="contact-section">
      <div class="container">
        <center>
          <h2>Contact us</h2>
        <p>
          +91 9999999999<br>
          email:oneschool.gmail.com
        </p>
        <br>
        </center>
        <div class="row justify-content-center">
          <p>Devoloped by Sai Charan,Vrinda,Aisiri,Prithvi</p>
          <div class="col-md-7">



            
           
  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  
  <script src="js/main.js"></script>
    
  </body>
</html>