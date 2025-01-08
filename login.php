<?php

session_start();

include('server/connection.php');
if(isset($_SESSION['logged_in']))
{
  header('location: account.php');
  exit;
}

if(isset($_POST['login_btn']))
{
  $email= $_POST['email'];
  $password= md5($_POST['password']);


  $stmt = $conn->prepare("SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email= ? AND user_password=? LIMIT 1");

  $stmt->bind_param('ss',$email,$password);

  if($stmt->execute())
  {
    $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
    $stmt->store_result();

    if($stmt->num_rows()==1)
    {
      $stmt->fetch();

      $_SESSION['user_id']= $user_id;
      $_SESSION['user_name']= $user_name;
      $_SESSION['user_email']= $user_email;
      $_SESSION['logged_in']= true;
      header('location: account.php?message=Logged in Successfully');
    }
    else{
      header('location: login.php?error=Could not verify your account');
    }
  }
  // else
  // {
  //   header('location: login.php?error=Something went wrong');
  // }
  

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://kit.fontawesome.com/fc88f24eb1.js" crossorigin="anonymous"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary fixed-top py-3">
    <div class="container">
      <!-- <a class="navbar-brand" href="#">Navbar</a> -->
       <img class="logo" src="assets/images/onlinelogomaker-111024-2210-3459.png" alt="" >
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php">Product & Event</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="login.php"><i class="fa-solid fa-user"></i></a>
          </li>
          
          


        


          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li> -->
        </ul>
        <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
      </div>
    </div>
  </nav>


     
      
      <!-- login -->
       <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Login</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form action="login.php" id="login-form" method="POST">
            <p style="color: red;" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];}  ?></p>
                <div class="form-group">
                    <label >Email</label>
                    <input type="text" class="form-control" name="email" id="login-email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                   
                    <input type="submit" name="login_btn" class="btn" id="login-btn" value="Login" >
                </div>
                <div class="form-group">
                   
                    <a href="registration.php" id="register-url" class="btn">Don't have account? Register Now.</a>
                </div>
            </form>
        </div>
       
       </section>
      




    <!-- Footer -->
  <footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <img class="logo " src="assets/images/onlinelogomaker-111024-2210-3459.png" alt="" srcset="">
        <p class="pt-3">We provide the best products for the most affordable prices.</p>

      </div>
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h4 class="pb-2"> Featured</h4>
          <ul class="text-uppercase">
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About Us</a></li>
          </ul>
      </div>


      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h4 class="pb-2">Contact Us</h4>
        <div>
          <h6 class="text-uppercase">Address</h6>
          <p>1234 Street Name, City</p>
        </div>
        <div>
          <h6 class="text-uppercase">Number</h6>
          <p>016XXXXXXXX</p>
        </div>
        <div>
          <h6 class="text-uppercase">Email</h6>
          <p>morningGlory12@gmail.com</p>
        </div>
        
      </div>

      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h4 class="pb-2">Social Media</h4>
        <div class="row ">
          <i class="fa-brands fa-facebook"></i>
          <i class="fa-brands fa-instagram"></i>
          <i class="fa-brands fa-twitter"></i>


        </div>
      </div>

    </div>
    <hr>
    <p class="text-center">&copy;All Rights are Reserved.</p>
</footer>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>