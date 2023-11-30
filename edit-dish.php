<?php
ob_start();
session_start();
$rid = $_SESSION['r_id'];

include_once('db_connect.php');

// Check if a food item has been selected
if (isset($_POST['selected_food'])) {
    $selectedFoodID = $_POST['selected_food'];
    // echo $selectedFoodID;

    // Retrieve the food details based on the selected food ID
    $sql = "SELECT `name`, `price`, `order_per_user`, `total_orders`, `tagline` FROM `food` WHERE `f_id`='$selectedFoodID' AND `r_id`='$rid'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $foodDetails = mysqli_fetch_assoc($result);
    } else {
        // echo "food not found";
        // Food not found or error in query
        $foodDetails = array('name' => 'Food Name ', 'price' => 'Price', 'order_per_user' => 'Order Per User', 'total_orders' => 'Total Orders per Day', 'tagline' => 'Tagline');
    }
} else {
    // echo "food not selected";
    $foodDetails = array('name' => 'Food Name', 'price' => 'Price', 'order_per_user' => 'Order Per User', 'total_orders' => 'Total Orders per Day', 'tagline' => 'Tagline');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Form</title>
</head>

<body style="padding-bottom:50px;background-image: url('https://wallpaperplay.com/walls/full/1/6/2/93324.jpg')">
    <center><form id="form" name="form" method="post">
        <h1>Select Food Item:</h1><br>
        <select name="selected_food">
            <option value="">--- Select ---</option>
            <?php
            $fetch_food = "SELECT `f_id`, `name` FROM `food` WHERE r_id='$rid'";
            $query_fetch_food = mysqli_query($con, $fetch_food);

            while ($food = mysqli_fetch_assoc($query_fetch_food)) {
                $foodID = $food['f_id'];
                $foodName = $food['name'];
                $selected = ($selectedFoodID == $foodID) ? 'selected' : '';

                echo "<option value=\"$foodID\" $selected>$foodName</option>";
            }
            ?>
        </select>
        <input type="submit" name="Submit" value="Select">
    </form></center>
    
    <center><form action="update_dish.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="food_id" value="<?php echo $selectedFoodID; ?>">
        <p><input style="padding: 5px; border: 1px solid rgb(126, 8, 126);border-radius: 5px; margin-top: 50px; width:400px;" type="text" name="rid" placeholder="Enter Your Restaurant ID" required></p>
        <p><input style="padding: 5px; border: 1px solid rgb(126, 8, 126);border-radius: 5px; margin-top: 10px;width:400px;" type="text" name="name" placeholder="Enter Food Name" value="<?php echo $foodDetails['name']; ?>" required></p>
        <p><input style="padding: 5px; border: 1px solid rgb(126, 8, 126);border-radius: 5px; margin-top: 10px;width:400px;" type="number" name="price" placeholder="Price"value="<?php echo $foodDetails['price']; ?>" required></p>
        <p><input style="padding: 5px; border: 1px solid rgb(126, 8, 126);border-radius: 5px; margin-top: 10px;width:400px;" type="number" name="order_per_user" placeholder="Order Per Customer" value="<?php echo $foodDetails['order_per_user']; ?>" required></p>
        <p><input style="padding: 5px; border: 1px solid rgb(126, 8, 126);border-radius: 5px; margin-top: 10px;width:400px;" type="number" name="total_orders" placeholder="Total Orders in A Day"value="<?php echo $foodDetails['total_orders']; ?>" required></p>
        <p><input style="padding: 5px; border: 1px solid rgb(126, 8, 126);border-radius: 5px; margin-top: 10px;width:400px;" type="text" name="tagline" placeholder="Tagline" value="<?php echo $foodDetails['tagline']; ?>" required></p>
        <br><br><br>
        <!-- <h5 style="padding:2px;background-color: skyblue; width:100px;">Upload Image</h5>
        <p><input type="file" accept="image/*" name="image" placeholder="upload image" style="background-color: teal; padding: 0px;border: 1px solid black;cursor: pointer;" required></p> -->
        <p><input style="margin-top: 50px; padding-left: 20%; padding-right: 20%; border: 0px solid rgb(8, 1, 8);border-radius: 5px; height: 30px; background-color: mediumspringgreen; width:50px;" type="submit"></p>
    </form></center>
</body>
</html>