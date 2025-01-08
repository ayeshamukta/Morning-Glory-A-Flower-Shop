<?php
session_start();
include('server/connection.php');

if(!isset($_SESSION['logged_in']))
{
  header('location: login.php');
  exit;
}
if(isset($_GET['logout']))
{
  if(isset($_SESSION['logged_in']))
  {
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('location: login.php');
    exit;
  }
  
  
}
if(isset($_SESSION['logged_in']))
{
  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id= ? ");
  $stmt->bind_param('i',$user_id);
  $stmt->execute();

  $orders = $stmt->get_result();
  
  
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://kit.fontawesome.com/fc88f24eb1.js" crossorigin="anonymous"></script>
    
</head>
<body>
<!-- navbar -->
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


     
      
      <!-- account -->
       <section class="my-5 py-5">
            <div class="row container mx-auto">
                <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                    <h3 class="font-weight-bold">Account Info</h3>
                    <hr class="mx-auto">

                    <div class="account-info">
                        <p>Name: <span><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name']; }?></span></p>
                        <p>Email: <span><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_email']; }?></span></p>
                        <p><a href="#order" id="order-btn">Your orders</a></p>
                        <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                        
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 ">
                    <form action="" id="account-form">
                        <h3>Change Password</h3>
                        <hr class="mx-auto">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" id="account-new-password" name="new password" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            
                            <input type="submit" class="btn" id="change-pass" value="Change Password">
                        </div>
                    </form>
                </div>
            </div>
       
       </section>


       <!-- Orders -->
       <section id="order" class="orders container  my-5 py-5">
        <div class="container mt-2">
            <h2 class="font-weight-bold text-center">Your Orders</h2>
            <hr class="mx-auto">
        </div>

        <table class="mt-5 pt-5"> 
            <tr>
                <th>Order Id</th>
                <th>Total Bill</th>
                <th>Date</th>
                
            </tr>
            <?php while($row = $orders->fetch_assoc()) {?>

                <tr>
                <td>
                    <div class="product-info">
                        <!-- <img src="assets/images/Picture1.jpg.png" alt=""> -->
                        <div>
                            <p class="mt-3"><?php echo $row['order_id']; ?> </p>
                        </div>
                    </div>
                </td>


                <td>
                    <span><?php echo $row['order_cost']; ?> BDT</span>
                </td>
                <td>
                <span><?php echo $row['order_date']; ?></span>
                </td>


                </tr>
            <?php } ?>
            
        </table>

       
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