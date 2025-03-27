<?php
$conn = mysqli_connect("localhost", "root", "", "voetbal");
session_start();

if (!$conn) {
    die("Connect error: " . mysqli_connect_error());
}

$sql = "SELECT * FROM voetballers";
$result = mysqli_query($conn, $sql);

$tableRows = '';

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $volledigeNaam = $row['voornaam'];
        if (!empty($row['tussenvoegsel'])) {
            $volledigeNaam .= "_" . $row['tussenvoegsel'];
        }
        $volledigeNaam .= "_" . $row['achternaam'];

        $foto = "afbeeldingen/" . str_replace(' ', '_', $volledigeNaam) . ".jpg";
        $fotoHtml = file_exists($foto) ? "<img src='" . htmlspecialchars($foto) . "' alt='Foto van " . htmlspecialchars($row['voornaam']) . "' style='width:50px; height:50px; object-fit:cover;'>" : "Geen afbeelding";

        $tableRows .= "
            <tr>
                <td>$fotoHtml</td>
                <td>" . htmlspecialchars($row["voornaam"]) . "</td>
                <td>" . htmlspecialchars($row["achternaam"]) . "</td>
                <td>" . htmlspecialchars($row["geboortedatum"]) . "</td>
                <td><a href='aanpassen.php?id=" . urlencode($row['id']) . "'>Aanpassen</a></td>
                <td><a href='delete.php?id=" . urlencode($row['id']) . "'>Delete</a></td>
            </tr>
        ";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="voetbal.css">
    <title>Voetbal</title>
</head>

<body>
    <div class="wrapper">
        <div class="nav">
            <a href="index.php">Home</a>
            <a href="toevoegen.php">Toevoegen</a>
            <a href="herstellen.php">Herstellen</a>
        </div>

        <div class="info">
            <table class="table_info">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Geboortedatum</th>
                        <th>Aanpassen</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $tableRows ?: "<tr><td colspan='6'>Geen gegevens gevonden</td></tr>"; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const activePage = window.location.search;
        document.querySelectorAll('.nav a').forEach(link => {
            if (link.href.includes(activePage)) {
                link.classList.add('active');
            }
        });
    </script>
</body>

</html>
