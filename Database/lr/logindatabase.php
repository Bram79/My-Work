<?php
$email = null;
$password = null;
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM login WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $hash = $row["password"];
        if (password_verify($password, $hash)) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["born"] = $row["born"];
            $_SESSION["isadmin"] = $row["admin"];
            header("Location: index.php?action=info");
        } else {
            echo "<div id='error'> Wrong Password </div>";
        }
    } else {
        echo "<div id='error'> Ur not registered </div>";
    }
}


$_SESSION["password"] = $password;




?>
<!-- <!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='https://cdn.jsDeliver.net/npm/water.css@/out/water.min.css' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>////     <title>Login</title>
// </head> -->



<?php

$action = $_GET['action'] ?? '';
if ($action === 'login') {
    $content = "
<!-- 
    <link rel='stylesheet' href='css/login_register.css'>
-->


    <div class='container'>
        <form method='post'>
            <h1>Login page</h1>
            <div class='form-group'>
                <label for=''>E-mail</label>
                <input type='text' name='email' class='form-control' required>
            </div>
            <div class='form-group'>
                <label for=''>Password</label>
                <input type='password' name='password' class='form-control' required>
            </div>
            <b>Dont have a account <a href='index.php?action=register'>register</a></b>
            <input type='submit' name='submit' class='btn' value='login'>
        </form>

    </div>


<script>
    window.onload = function () {
            const errorDiv = document.getElementById('error' && 'message');
            if (errorDiv) {
                setTimeout(() => {
                    errorDiv.style.display = 'none';
                }, 2000);
            }
        };
</script>

";
}