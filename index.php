<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Morning Glory a Flower Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://kit.fontawesome.com/fc88f24eb1.js" crossorigin="anonymous"></script>
    
</head>
<body>

<!-- Navbar -->

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

<!-- Home style="margin-top: 10%;" -->
 <section id="home" >
  <div class="container">
    <h5>New Arrivals</h5>
    <h1>Best Prices</h1>
    <p>E-shop offers the best products with the most affordable prices.</p>
    <button>Shop Now</button>
  </div>
 </section>


 <!-- Events  -->

 <section id="events" class="container py-3">
    <div class="row">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/birthday.png" alt="">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/wedding.png" alt="">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/corporate.png" alt="">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/annyversary.png" alt="">
    </div>
 </section>

 <section id="new" class="w-100">
  <div class="row p-0 m-0">
    <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
      <img class="img-fluid" src="assets/images/yoksel-zok-1MJi7Nmkaso-unsplash.jpg" alt="" srcset="">
      <div class="details">
        <h2>Fresh Flowers</h2>
        <button class="text-uppercase">Shop Now</button>
      </div>
    </div>

    <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
      <img class="img-fluid" src="assets/images/pngwing 8.png" alt="" srcset="">
      <div class="details">
        <h2>Artificial Flowers</h2>
        <button class="text-uppercase">Shop Now</button>
      </div>
    </div>


    <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
      <img class="img-fluid" src="assets/images/Picture1.jpg.png" alt="" srcset="">
      <div class="details">
        <h2>Boque Flowers</h2>
        <button class="text-uppercase">Shop Now</button>
      </div>
    </div>
  </div>

 </section>


 <!-- featureD PRODUCT -->

 <section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3>Our Featured Events</h3>
    <hr>
    <p>Here you can check out our organized flowers & events.</p>
  </div>

  <div class="row mx-auto container-fluid">

    <?php include('server/get_featured_product.php'); ?>
    <?php while($row= $featured_product->fetch_assoc()){ ?>

    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/images/<?php echo $row['product_image'];?>" alt="" srcset="">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        
      </div>
      <h5 class="p-name"><?php echo $row['product_name'];?></h5>
      <h4 class="p-package"><?php echo $row['product_price'];?></h4>
      <a href="<?php echo "single_product.php?product_id=".$row['product_id'];?>"><button class="buy-btn">Buy Now</button>
      </a>
    </div>
    <?php } ?>
    
    

  </div>
 </section>

 <!-- Banner -->
  <section id="banner" class="my-5 py-5">
    <div class="container">
      <h4>Winter Season's sale</h4>
      <h1>Sale <br> UP to 30% OFF</h1>
      <button class="text-uppercase">Shop Now</button>
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