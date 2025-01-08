<?php
// include('server/connection.php');
// if(isset($_GET['product_id']))
// {
//   $product_id= $_GET['product_id'];
//   $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
//   $stmt->bind_param("i", $product_id);
//   $stmt->execute();
//   $product = $stmt->get_result();
// }
// else
// {
//   header('location : index.php');
// }



session_start();
if(isset($_POST['add_to_cart']))
{
  if(isset($_SESSION['cart']))
  {
      $product_array_ids = array_column($_SESSION['cart'],"product_id");
      if( !in_array($_POST['product_id'],$product_array_ids))
      {
        $product_id = $_POST['product_id'];

        $product_array = array(
                          'product_id'=>$_POST['product_id'],
                          'product_name'=>$_POST['product_name'],
                          'product_price'=>$_POST['product_price'],
                          'product_image'=>$_POST['product_image'],
                          'product_quantity'=>$_POST['product_quantity'],
        );

        $_SESSION['cart'][$product_id] = $product_array;

      }
      else
      {
        echo '<script>alert("Product was already added.");</script>';
        
      }
  }
  else
  {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    


    $product_array = array(
                      'product_id'=>$product_id,
                      'product_name'=>$product_name,
                      'product_price'=>$product_price,
                      'product_image'=>$product_image,
                      'product_quantity'=>$product_quantity,
    );

    $_SESSION['cart'][$product_id] = $product_array;
  }
  calculateTotal();
}


elseif(isset($_POST['remove-product']))
{
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);

    calculateTotal();
}


elseif(isset($_POST['edit_quantity']))
{
  // get product id & quantity
  $product_id = $_POST['product_id'];
  $product_quantity = $_POST['product_quantity'];


  // get product array from session
  
  $product_array = $_SESSION['cart'][$product_id];
  
  // update quantity
  $product_array['product_quantity'] = $product_quantity;

  // return array
  $_SESSION['cart'][$product_id] = $product_array;

  calculateTotal();

}


else
{
  // header('location: index.php');
}

function calculateTotal()
{
    $total = 0;

  foreach($_SESSION['cart'] as $key => $value)
  {
    $product = $_SESSION['cart'][$key];

    $price = $product['product_price'];
    $quantity = $product['product_quantity'];
    $total = $total+($price*$quantity);

  }

  $_SESSION['total']= $total;
}




?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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


     
      <!-- cart -->
       <section class="cart container my-5 py-5">
            <div class="container mt-5">
                <h2 class="font-weight-bold">Your Cart</h2>
                <hr>
            </div>

            <table class="mt-5 pt-5"> 
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </tr>


                <?php foreach ($_SESSION['cart'] as $key => $value) { ?>


                <tr>
                    <td>
                        <div class="product-info">
                            <img src="assets/images/<?php echo $value['product_image'];?>" alt="">
                            <div>
                                <p><?php echo $value['product_name'];?></p>
                                <small><span>BDT </span><?php echo $value['product_price'];?></small>
                                <br>
                                <form method="POST" action="cart.php">
                                  <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                                  <input class="remove-btn" name="remove-product" type="submit" value="Remove">
                                  
                                </form>
                                
                            </div>
                        </div>
                    </td>


                    <td>
                        
                        <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                        <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'];?>">
                        <input type="submit" class="edit-btn" name="edit_quantity" value="edit">

                        </form>
                        <!-- <a href="#" class="edit-btn">Edit</a> -->
                    </td>

                    <td>
                        <span>BDT </span>
                        <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price'];?></span>
                    </td>
                </tr>
                <?php }   ?> 
            </table>
              
            <div class="cart-total">
                <table>
                    <tr>
                        <td>Sub Total</td>
                        <td>BDT <?php echo $_SESSION['total']; ?></td>
                    </tr>
                    <!-- <tr>
                        <td>Total</td>
                        <td>BDT 1110</td>
                    </tr> -->
                </table>
            </div>
            
            <div>

                  <form method="POST" action="checkout.php">
                    <input type="submit" name="checkout" class="btn checkout-btn" value="Checkout">
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