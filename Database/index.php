<?php
$content = null;
include 'C:\xampp\htdocs\website\Database\functions\database.php';

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'login': {
        session_destroy();
        unset($_SESSION);
        session_start();
        $_SESSION['isadmin'] = 0;

        include 'C:\xampp\htdocs\website\Database\lr\logindatabase.php';
    }
        break;
    case 'register':
        include 'C:\xampp\htdocs\website\Database\lr\registerdatabase.php';
        break;
    case 'update':
        include 'C:\xampp\htdocs\website\Database\functions\update.php';
        break;
    case 'delete':
        include 'C:\xampp\htdocs\website\Database\functions\delete.php';
        break;
    case 'account':
        include 'C:\xampp\htdocs\website\Database\functions\account.php';
        break;
    case 'info':
        include 'C:\xampp\htdocs\website\Database\lr\info_page.php';
        break;
    case 'change_password':
        include 'C:\xampp\htdocs\website\Database\functions\change_password.php';
        break;
    case 'about':
        $content = '<h1>About Us</h1><p>This is the about page.</p>';
        break;
    case 'contact':
        $content = '<h1>Contact Us</h1><p>Send us a message!</p>';
        break;
    default:
        $content = '<h1>Home</h1><p>Welcome to the homepage.</p>';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/base.css">
    <title>Page</title>
</head>

<body>

    <div class="nav">
        <h1>My Crud</h1>
    </div>
    <form method="post">
        <div class="wrapper">
            <div class="content">
                <div class="menubar">
                    <nav>
                        <ul>
                            <li>
                                <a href="?action=home">Home</a>
                            </li>
                            <?php if (!isset($_SESSION["login"]))
                                $_SESSION["login"] = false; ?>
                            <?php if ($_SESSION["login"] === false): ?>
                                <li>
                                    <a href="?action=login">Login</a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="?action=info">Content</a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="?action=about">About</a>
                            </li>
                            <li>
                                <a href="?action=contact">Contact</a>
                            </li>
                            <?php if ($_SESSION["login"] === true): ?>
                                <li>
                                    <a href="?action=account">Account</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
    </form>

    <div class="Showpage">
        <?php echo $content; ?>
    </div>
    </div>


    <div class="footer">
        <p>credits to BM made in 2024</p>
    </div>
    </div>

    <script>
        const activePage = window.location.search;
        const navLinks = document.querySelectorAll('nav a').
            forEach(link => {
                if (link.href.includes(activePage)) {
                    link.classList.add('active');
                }
            });
    </script>
</body>

</html>