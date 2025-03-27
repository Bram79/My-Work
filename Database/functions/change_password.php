<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['id'])) {
        die("User not logged in.");
    }

    $user_id = $_SESSION['id'];
    $old_password = $_POST['op'];
    $new_password = $_POST['np'];

    $stmt = $conn->prepare("SELECT password FROM login WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    $stmt->close();

    if (!password_verify($old_password, $hashed_password)) {
        echo "<div class='error'>Old password is incorrect.</div>";
        return;
    }

    $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE login SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $new_hashed_password, $user_id);
    if ($stmt->execute()) {
       header("location: ?action=account");
    } else {
        echo "<div class='error'> Failed to update password </div>";
    }
}




$content = '
<div class="container">
    <form method="post">
        <h1>Change password</h1>
        <div class="form-group">
            <label for="op">Old password</label>
            <input type="password" name="op" id="op" class="form-control">
        </div>

        <div class="form-group">
            <label for="np">New password</label>
            <input type="password" name="np" id="np" class="form-control">
        </div>

        
        <input type="submit" name="submit" class="btn" value="Change">
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

// <div class="form-group">
//   <label for="c_np">Confirm new password</label>
//   <input type="password" name="c_np" id="c_np" class="form-control">
// </div>


///haal uit de database het record op van de infelogde gebruiker (select)

// hash old_password en vergelijk die met wactwoord uit de query

// update van het record. hash new_password




?>