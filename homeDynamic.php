<?php
ob_start();
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
<style>
#headbar
{
    background-image:url("langar9 (1).webp");
    background-position:center;
    background-repeat:no-repeat;
    background-size:cover;
    height:500px;
}
p
{
font-size:40px;
}
a:link
{
color:yellow;
text-decoration:none;
}
.restaurant-grid {
        display: grid;
        margin-left:20px;
        grid-template-columns: repeat(3, 1fr); /* Create 3 columns */
        grid-gap: 10px; /* Adjust the gap between grid items */
    }

     </style>
</head>
<body>
<!-- Navbar Starts -->
<section class="navbar" style="background-color: rgb(239, 111, 51);">
        <div class="container">
            <div class="logo">
                <a href="homeDynamic.php" ><h3 style="color: black;">DehlezzDrop</h3></a>
            </div>
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="homeDynamic.php">HOME</a>
                    </li>
                    <li>
                        <a href="contact.html">CONTACT</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- NavBar ends -->

<div style="background-color: white; border-width: 3px; height: 750px;">
    <center><h1 class="text-center ex">TOP <span class="role"></span></h1></center>
    <div class="restaurant-grid mt50">
        <?php
        include_once('db_connect.php');
        //db connected
        
        $restaurant= "SELECT `r_id`, `name`, `address`, `tagline`, `image`, `restaurant_page` FROM `restaurant` order by r_id ASC ";
        $queryfire = mysqli_query($con , $restaurant);
        
        $num = mysqli_num_rows($queryfire);
        // Your existing PHP code here
        if ($num > 0) {
            while ($restau = mysqli_fetch_array($queryfire)) {
               $rid= $restau['r_id'];
               $get_av_rate = "SELECT `rate_num`,`av_rate` FROM `rating` WHERE r_id='$rid'";
               $queryfire_get_av_rate = mysqli_query($con,$get_av_rate);
               $get_av_rate_array = mysqli_fetch_array($queryfire_get_av_rate);
               $av_rate = $get_av_rate_array['av_rate'];
               $num_reviews = $get_av_rate_array['rate_num'];
                // Your restaurant item HTML here
                ?>

<div class="restaurant-item" style="border-width: 2px;  margin: 10px; width: 45%;">

    <a href="resturant1.php?r_id=<?php echo $rid; ?>">
        <div style="text-align: center;">
            <img src="<?php echo $restau['image'] ?>" style="margin-top: 15px; width: 300px; border-radius: 20px; height: 180px;">
            <p class="highlight" style="color: black; "><?php echo $restau['name'] ?></p>
        <!-- Code for displaying rating -->
        <h2 style="color:green; font-size:15px;">★ <?php echo $av_rate ?> (<?php echo $num_reviews ?> reviews)</h2>
        <!-- Coding for rating ends -->
        <?php echo $restau['address'] ?>
    </a>
    </div>
</div>
                <?php
            }
        }
        ?>
    </div>
</div>

<!-- Footer Starts -->
<section class="footer" style="background-color: rgb(63, 46, 38);">
        <div class="container text-center">
            <p style="color: aqua;">Designed By <a style="color: aqua;" href="#">DSA</a></p>
        </div>
    </section>
<!-- footer Section Ends Here -->

            <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
              <script src="https://kit.fontawesome.com/58a810656e.js" crossorigin="anonymous"></script>
              <script>
                var typeData = new Typed(".role", {
                  strings: [
                    "Restaurants",
                    "Snacks",
                    "Desserts",
                    "Drinks",
                  ],
                  loop: true,
                  typeSpeed: 100,
                  backSpeed: 80,
                  backDelay: 1000,
                });
              </script>
        </body>
        </html>
