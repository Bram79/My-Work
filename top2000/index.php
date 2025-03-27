<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "top2000");
$content = null;

if (!$conn) {
    die("Connect error" . mysqli_connect_error());
}

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'home':
        $content = "<h1>Home</h1> <br> <p>Site met artiesten en uit welk land ze komen.</p>";
        break;
    case 'add':
        include 'functions\add.php';
        break;
    case 'info':
        include 'functions\info.php';
        break;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Top2000</title>
</head>

<body>
    <div class="wrapper">
            <header class="navbar">Artiesten</header>
            <div class="menu">
                <a href="?action=home">Home</a>
                <a href="?action=info">Info</a>
                <a href="?action=add">Add</a>
            </div>


            <div class="Showpage">
                <?php echo $content; ?>
            </div>


        <div class="footer">
            <p>credits to BM made in 2024</p>
        </div>
    </div>
</body>

</html>