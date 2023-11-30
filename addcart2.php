<?php
ob_start();
session_start();
// connectinon of db
include_once('db_connect.php');

       $user = $_SESSION['username'];
       // echo $user;
       $quantity=$_POST['quantity'];
       if($quantity==0)
       {$quantity=1;}
       $fid=$_GET['f_id'];
       $other_res_food = "SELECT `username`, `f_id`, `r_id`, `quantity` FROM `cart` WHERE username='$user' && r_id != '2' "; 
       $queryfire1_other_res_food = mysqli_query($con,$other_res_food); 
       $num_other_res_food = mysqli_num_rows($queryfire1_other_res_food);
       // if in the cart no other restaurant's food exists
       if($num_other_res_food==0)
       {
       $query1 = "SELECT `username`, `f_id`, `r_id`, `quantity` FROM `cart` WHERE username='$user' && f_id ='$fid' ";
       $queryfire1 = mysqli_query($con,$query1);
       $num = mysqli_num_rows($queryfire1);
       $cart_detail = mysqli_fetch_array($queryfire1); 
       $quan = $cart_detail['quantity'];
       if($num==0)      //there is no row for this f_id in table cart
       {
              $query="INSERT INTO `cart` (`username`, `f_id`, `r_id`, `quantity`) VALUES ('$user','$fid','2', '$quantity')";
              if($result= mysqli_query($con,$query)){
                     echo "<script>alert('product added to cart')</script>";
                     echo "<script>window.open('resturant2.php','_self')</script>";
                     
              }   
       }
       else            //there is some row for this f_id in table cart so updating the quantity only.
       {
              $check = "SELECT `order_per_user`,`total_orders` FROM `food` WHERE f_id='$fid' AND r_id='2'";
              $query_check = mysqli_query($con, $check);
              $result = mysqli_fetch_row($query_check);
              $f = $result[0];
              $p = $result[1];
              if($f>$p){
                     $f=$p;
                     $updation="UPDATE `food` SET order_per_user='$p' WHERE f_id='$fid' AND r_id='2'";} 
                     mysqli_free_result($query_check);   
                     if($quantity==0)
                            $quantity=1;    
                            $quantity=(int)$quan + (int)$quantity;
                            if($quantity>$f){
                                   echo "<script>alert('Quantity cannot exceed ' . $f);</script>";
                                   // alert("Quantity cannot exceed " + f);
                                   $quantity=$f;
                            }  
                            $query2 = "UPDATE `cart` SET `quantity`='$quantity' WHERE username='$user' && f_id ='$fid' ";
                            $queryfire2 = mysqli_query($con,$query2);

                     echo "<script>alert('product added to cart')</script>";
                     echo "<script>window.open('resturant2.php','_self')</script>";
              }
    }
    else 
    {
       echo '<script>alert("you can order only from one restaurant in one order")</script>';
       echo "<script> window.open('resturant2.php','_self')</script>";
    }

//adding of quantity end
?>
       
       
      
       
    
   

