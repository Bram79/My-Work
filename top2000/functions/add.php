<?php
if (isset($_POST["submit"])) {
    $naam = $_POST["naam"];
    $land = $_POST["land"];
    $duplicate = mysqli_query($conn, "SELECT * FROM artist WHERE name = '$naam'");
    $query = "INSERT INTO artist (name, country) VALUES (?, ?)";
    if (mysqli_num_rows($duplicate) > 0) {
        echo "naam is al in gebruik";
    } else {
        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param("ss", $naam, $land);
            if ($stmt->execute()) {
                header("Location: ?action=info");
            }
        }
    }
}



?>

<?php $content = '

<form method="post">
    <h1>Nieuwe artiest invoeren</h1>
    <label for="naam">Naam: </label>
    <input type="text" name="naam" placeholder="naam">

    <label for="naam">Land: </label>
    <input type="text" name="land" placeholder="land">

    <input type="submit" name="submit" value="Verzenden">
</form>

';
?>