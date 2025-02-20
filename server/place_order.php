<?php  
session_start();
include('connection.php');

if(isset($_POST['place_order']))
{

    // get user info
    $uid = 0;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total'];
    $order_status = "Processing";
    $user_id= $_SESSION['user_id'];
    $order_date= date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date)     
    VALUES (?,?,?,?,?,?,?); ");

    $stmt->bind_param('isiisss',$order_cost,$order_status,$user_id,$phone,$city,$address,$order_date);
    $stmt->execute();

    $order_id = $stmt->insert_id;
    // echo $order_id;

    // get products from cart
   foreach ( $_SESSION['cart'] as $key => $value) 
   {
    $product =  $_SESSION['cart'][$key];
    $product_id = $product['product_id'];
    $product_name = $product['product_name'];
    $product_image = $product['product_image'];
    $product_price = $product['product_price'];
    $product_quantity = $product['product_quantity'];
    $stmt1 = $conn->prepare("INSERT INTO order_items (order_id,product_id,product_name,product_image,user_id,order_date,product_price,product_quantity)     
    VALUES (?,?,?,?,?,?,?,?); ");


    $stmt1->bind_param('iissisii',$order_id,$product_id,$product_name,$product_image,$user_id,$order_date,$product_price,$product_quantity);
    $stmt1->execute();

   }


//    empty cart
//    unset($_SESSION['cart']);

// payment
header('location: ../payment.php?order_status=Order Placed Successfully');



}


?>