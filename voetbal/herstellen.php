<?php
$conn = mysqli_connect("localhost", "root", "", "voetbal");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$mysql = "DELETE FROM voetballers";
 
if ($conn->query($mysql) === TRUE) {
    echo "Alle voetballers zijn verwijderd.\n";
} else {
    echo "Fout bij het verwijderen van voetballers: " . $conn->error;
}
 
$sql = "-- Voeg de voetballers van het Nederlands Elftal 1974 toe\n"
    . "INSERT INTO voetballers (voornaam, achternaam, geboortedatum, foto_url) VALUES\n"
    . "    ('Jan', 'Jongbloed', '1940-11-25', 'Jan_Jongbloed.jpg'),\n"
    . "    ('Wim', 'Suurbier', '1945-01-16', 'Wim_Suurbier.jpg'),\n"
    . "    ('Ruud', 'Krol', '1949-03-24', 'Ruud_Krol.jpg'),\n"
    . "    ('Wim', 'Rijsbergen', '1952-01-18', 'Wim_Rijsbergen.jpg'),\n"
    . "    ('Arie', 'Haan', '1948-11-16', 'Arie_Haan.jpg'),\n"
    . "    ('Theo', 'de Jong', '1947-08-11', 'Theo_de_Jong.jpg'),\n"
    . "    ('Johan', 'Neeskens', '1951-09-15', 'Johan_Neeskens.jpg'),\n"
    . "    ('Wim', 'van Hanegem', '1944-02-20', 'Wim_van_Hanegem.jpg'),\n"
    . "    ('Johan', 'Cruijff', '1947-04-25', 'Johan_Cruijff.jpg'),\n"
    . "    ('Johnny', 'Rep', '1951-11-25', 'Johnny_Rep.jpg'),\n"
    . "    ('Rob', 'Rensenbrink', '1947-07-03', 'Rob_Rensenbrink.jpg');";
 
if ($conn->query($sql) === TRUE) {
    header("Location: ./index.php");
} else {
    echo "Fout bij het toevoegen van voetballers: " . $conn->error;
}

?>