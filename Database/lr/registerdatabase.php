<?php
$name = null;
$born = null;
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $born = $_POST["born"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $duplicate = mysqli_query($conn, "SELECT * FROM login WHERE email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<div id='error'> E-mail has already ussed </div>";
    } else {
        if ($password == $confirm_password) {
            $query = "INSERT INTO login (name, born, email, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            if ($stmt) {
                $stmt->bind_param("ssss", $name, $born, $email, $hashed_password);
                if ($stmt->execute()) {
                    echo "<div id='message'> successful registration </div>";
                }
            } else {
                echo "<div id='error'> Password does not match </div>";
            }
        }
    }
}


?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_register.css">
    <title>register</title>
</head>

<body> -->
<?php
$action = $_GET['action'] ?? '';
if ($action === 'register') {
    $content = '
    <div class="container">
        <form method="post" autocomplete="off">
            <h1>register page</h1>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="born">Born</label>
                <input type="date" name="born" id="born" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control"  required>
            </div>
            <b>Already got an account <a href="index.php?action=login">Login</a></b>
            <input type="submit" name="submit" class="btn" value="register">
        </form>
    </div>


    <script>
    window.onload = function () {
            const errorDiv = document.getElementById("error" && "message");
            if (errorDiv) {
                setTimeout(() => {
                    errorDiv.style.display = "none";
                }, 2000);
            }
        };
</script>
    ';
}
?>