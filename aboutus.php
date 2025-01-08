<?php 

include('server/connection.php');
$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->get_result();

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
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


           
            
            <section class="mt-5  py-5  col-lg-11 mx-auto">
                <h2 class="text-center pt-5 mt-2">About Us</h2>
                <hr class="mx-auto">
                <p>
                    Welcome to <span class="txt-blue">A Morning Glory</span>, where every petal tells a story and every bouquet brings joy! Our flower shop was born from a passion for nature’s beauty and a desire to share it with our community. Just like the morning glory blooms with the sunrise, we strive to brighten your day with fresh, vibrant, and exquisite floral arrangements.
                    <br>
                    <br>
                    At <span class="txt-blue">A Morning Glory</span>, we specialize in crafting unique floral designs for every occasion – from heartfelt celebrations to thoughtful gestures "just because." Our team of skilled florists is dedicated to selecting the freshest flowers, ensuring each arrangement is a masterpiece that conveys your emotions perfectly.
                    <br><br>
                    We believe in the language of flowers and their power to transform spaces, uplift spirits, and create lasting memories. Whether you're planning a dreamy wedding, decorating your home, or surprising a loved one, we’re here to make your vision bloom.
                    <br>
                    <br>
                    Step into <span class="txt-blue">A Morning Glory</span>, and let us help you celebrate life’s precious moments with nature’s finest treasures.
                </p>
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