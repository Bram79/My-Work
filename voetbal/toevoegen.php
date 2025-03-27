<?php
$conn = mysqli_connect("localhost", "root", "", "voetbal");

if (isset($_POST["submit"])) {
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $geboortedatum = $_POST["geboortedatum"];
    $duplicate = mysqli_query($conn, "SELECT * FROM voetballers WHERE voornaam = '$voornaam'");
    $query = "INSERT INTO voetballers (voornaam, achternaam, geboortedatum) VALUES (?, ?, ?)";
    if (mysqli_num_rows($duplicate) > 0) {
        echo "naam is al in gebruik";
    } else {
        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param("sss", $voornaam, $achternaam, $geboortedatum);
            if ($stmt->execute()) {
                header("Location: index.php");
            }
        }
    }
}

?>


<link rel="stylesheet" href="voetbal.css">
<div class="wrapper">
    <div class="nav">
        <a href="index.php">Home</a>
        <a href="toevoegen.php">Toevoegen</a>
    </div>
    <form method="post">
        <center>
        <h1>Nieuwe voetballer toevoegen</h1>

            <div class="form-group">
                <label for="voornaam">voornaam </label>
                <input type="text" class="form-control"  name="voornaam">
            </div>

            <div class="form-group">
                <label for="achternaam">achternaam </label>
                <input type="text" class="form-control"  name="achternaam">
            </div>

            <div class="form-group">
                <label for="gebooredatu">geboortedatum</label>
                <input type="date" class="form-control" name="geboortedatum">
            </div>

            <input type="submit" class="btn" name="submit" value="voeg toe">
    </form>
    </center>

</div>