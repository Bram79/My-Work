<?php

include 'C:\xampp\htdocs\website\Database\functions\database.php';

// if (!isset($_SESSION["login"]) || $_SESSION["isadmin"] != 1) {
//     header("Location: logindatabase.php");
//     exit();
// }
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM login WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location:  http://localhost/website/Database/index.php?action=info");
        exit();
    } else {
        echo "Error deleting record.";
        return;
    }
}




