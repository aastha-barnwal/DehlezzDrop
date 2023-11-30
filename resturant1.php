<?php
ob_start();
session_start();

// connectinon of db
include_once('db_connect.php');
$rid = $_GET['r_id'];
$active="SELECT `Active` from restaurant where r_id='$rid'";
$active_queryfire=mysqli_query($con,$active);
$get_active = mysqli_fetch_array($active_queryfire);
$active= $get_active['Active'];
if($active==0){
    echo '<script>alert("Restaurant is not accepting order");</script>';
    echo "<script>window.open('homeDynamic.php','_self')</script>";
}
//db connected
?>

<!DOCTYPE html>
<html>
<head>
<title>Tast Food</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- navbar starts -->
 <section class="navbar" style=" background-color: #f0f0f0;">
        <div class="container">
            <div class="logo">
                <a href="index.html" ><h3 style="color: black;">DehlezzDrop</h3></a>
            </div>
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="homeDynamic.php">HOME</a>
                    </li>
                    <li>
                        <a href="my_orders.php">MY ORDERS</a>
                    </li>
                    <li>
                        <a href="cart.php">CART OF <?php  echo $_SESSION['username'] ?></a>
                    </li>
                    <li>
                        <a href="logout.php">LOG OUT</a>
                    </li>
                </ul>
            </div>
    </section>   
    <!-- NavBar ends -->


    <!-- Code for displaying rating -->
    <?php
   
    $get_restau_details="SELECT * FROM `restaurant` WHERE r_id='$rid'";
    $queryfire_get_res=mysqli_query($con,$get_restau_details);
    $get_restau_array = mysqli_fetch_array($queryfire_get_res);
    $restau_name=$get_restau_array['name'];
    $restau_tagline=$get_restau_array['tagline'];


    // query for rating
    $get_av_rate = "SELECT `rate_num`,`av_rate` FROM `rating` WHERE r_id='$rid'";
    $queryfire_get_av_rate = mysqli_query($con, $get_av_rate);
    $get_av_rate_array = mysqli_fetch_array($queryfire_get_av_rate);
    $av_rate = $get_av_rate_array['av_rate'];
    $num_reviews = $get_av_rate_array['rate_num'];
    ?>
    <div style="text-align: center;">
    <div style="text-align: left; margin-left: 100px;">
        <h1 style="font-size: 30px; color: #333; font-weight: 300; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
            <strong><?php echo $restau_name?></strong><br>
        </h1>
        <h2 style="font-size: 15px; color: #333; font-weight: 300; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
            <strong>IITG Campus</strong>
        </h2>
        <h4 style="font-size: 15px; color: #333; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
            <strong><?php echo $restau_tagline?></strong>
        </h4>
    </div>
    <div style="margin-left: 100px;">
        <div style="width: max-content; height: 40px; padding: 5px; border-radius: 10px;margin-right:10px; float: right;">
            <h2 style="color: green;">★ <?php echo $av_rate ?></h2>
            (<?php echo $num_reviews ?> reviews)
        </div>
    </div>
</div>


<?php
?>
    <!-- coding for rating ends -->
<br><br><br>
<center><h1>MENU</h1></center>

<!-- PHP coding starts here -->
<?php

$food = "SELECT `r_id`, `f_id`, `name`, `tagline`, `image`, `price` FROM `food` WHERE r_id = $rid ORDER BY f_id ASC";
$queryfire = mysqli_query($con, $food);

$num = mysqli_num_rows($queryfire);


if ($num > 0) {
    while ($fooditem = mysqli_fetch_array($queryfire)) {
        ?>
        <div class="food-item">
            <div class="food-description">
                <p class="food-name"><?php echo $fooditem['name'] ?></p>
                <p class="food-tagline"><?php echo $fooditem['tagline'] ?></p>
                <table>
                    <tr>
                        <td>
                            <p class="food-price">Rs <?php echo $fooditem['price'] ?>/-</p>
                        </td>
                    </tr>
                </table>
                <?php $fid = $fooditem['f_id']; 
                  $check = "SELECT `order_per_user` FROM `food` WHERE f_id='$fid' AND r_id='$rid'";
                  $query_check = mysqli_query($con, $check);
                  $result = mysqli_fetch_row($query_check);
                  $f = $result[0];
                mysqli_free_result($query_check); 
                ?>
                <form action="addcart1.php?f_id=<?php echo $fid ?>&r_id=<?php echo $rid ?>" method="post">
                    <input type="number" name="quantity" min="0" placeholder="Quantity" class="quantity-input" oninput="checkQuantity(this, <?php echo $f; ?>)">
                    <input type="submit" value="ADD TO CART" class="add-to-cart-button">
                </form>
            </div>
            <div ><img src="<?php echo $fooditem['image'] ?>" alt="Food Image" class="food-image"></div>
        </div>
        <?php
    }
}
?>

<!-- php coding ends here -->

</div>
    </div>
</div>
</body>
</html>

<script>
function checkQuantity(input, f) {
    // Parse the input value as a number
    var quantity = parseInt(input.value);

    // Check if the quantity exceeds the limit (f)
    if (quantity > f) {
        // Show an alert
        alert("Quantity cannot exceed " + f);

        // Set the input value to the maximum allowed value (f)
        input.value = f;

        // Add a CSS class to mark the input with red
        input.classList.add("error-mark");
    } else {
        // Remove the CSS class to clear the red mark
        input.classList.remove("error-mark");
    }
}
</script>