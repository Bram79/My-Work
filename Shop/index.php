<?php
// session_start();
// if(!isset($_SESSION['is_ingelogd'])) {
//     header('location: formulier.php');
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>B.M shops</title>
</head>

<body>
<?php include '../Shop/nav/nav.php'; ?>
   
    <section class="content">
        <h1>Convenient Online Store</h1>
        <p>Welcome to your one-stop online shop! We offer a wide range of top-rated and budget-friendly products at
            unbeatable prices. Enjoy the convenience of collecting your online orders from our pickup points or have
            them delivered straight to your doorstep.</p>
        <button>Order Now</button>
    </section>

    <center>
        <div class="category_text">
            <h1>Multi Categories</h1>
            <p>Explore a variety of choices</p>
        </div>
        <section class="category">
            <div class="category_item">
                <a class="category_image" href="https://www.bol.com/nl/nl/">
                    <img src="../image/1.jpg" alt="food">
                    <div class="category_pea">Food & Drinks</div>
                </a>
            </div>
            <div class="category_item">
                <a class="category_image" href="https://www.bol.com/nl/nl/">
                    <img src="../image/2.jpg" alt="Electronics">
                    <div class="category_pea">Electronics</div>
                </a>
            </div>
            <div class="category_item">
                <a class="category_image" href="https://www.bol.com/nl/nl/">
                    <img src="../image/3.jpg" alt="Home living">
                    <div class="category_pea">Home living</div>
                </a>
            </div>
            <div class="category_item">
                <a class="category_image" href="https://www.bol.com/nl/nl/">
                    <img src="../image/4.jpg" alt="Global">
                    <div class="category_pea">Global</div>
                </a>
            </div>
        </section>
        <div class="icon_header">
            <h1>Shopping Made Simple</h1>
        </div>
        <div class="icon">

            <div class="free_shipping">
                <i class="fa fa-truck f20"></i>
                <div class="shipping">Free Shipping</div>
                <p> Enjoy free shipping on orders above €49 to the Netherlands, Germany, France, Belgium, and
                    Luxembourg.</p>
            </div>

            <div class="free_pickup">
                <i class="	fas fa-shopping-basket f20"></i>
                <div class="pickup">Free Pickup</div>
                <p>Order by 9:59 AM for the earliest same-day pickup.</p>
            </div>

            <div class="payment">
                <i class="fas fa-money-check-alt f20"></i>
                <div class="Payment">Multi-Payment Options</div>
                <p>Enjoy secure and diverse payment options to meet global payment needs.</p>
            </div>
        </div>
        <div class="Order_now"><button>Order now</button></div>
        
        
        <div class="footer">
            <div class="footer_text">credits to: Bram</div>
        </div>
    </center>
</body>

</html>