<?php
if (isset($_POST['submit'])) {
    header('location: ../diatest_2/diatest_next_page.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="diatest.css">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="image_1">
            <img src="../diatest_2/images/kerstboom.png" alt="kerstboom">
        </div>
        <div class="header_text">
            Kerstborrel
        </div>
        <div class="image_2">
            <img src="../diatest_2/images/sneeuw.png" alt="sneeuw">
        </div>
    </header>


    <div class="container">

        <div class="textbox_1">
            <div class="text_1">
                <p>Waneer</p> vr 20 december 2024 <br> 16:00 uur - 20:00 uur
                <p><br>waar</p> Deltion college <br> gebouw groen <br> lokaal 2.099 <br> Mozartlaan 15 <br> 8031 AA
                Zwolle
            </div>
        </div>

        <div class="textbox_2">
            <div class="text_2">
                <p class="head-text2">SD Kerstborrel</p> <br>
                SD Kerstborrel Bij deze bent u van harte uitgenodigd op de jaarlijkse kerstborrel
                van
                het ICT-Lyceum. Deze wordt zoals altijd gehouden in 1 van de lokalen van gebouw groen op de 2de
                verdieping.
                We hopen jou graag te zien voor een hapje en een drankje met alle medestudenten. meldt u zich hiernaar
                even
                aan?
                <p class="melding"><br> Ten slotte raden we u met slem af, om hiereen te komen omdat dit een
                    <b>fake-bericht</b> is!!
                </p>
            </div>
        </div>

        <div class="textbox_3">
            <div class="text_3">
                <p>aanmelden voor borrel</p>
                <br>
                <form action="../diatest_2/diatest_next_page.php" method="post">
                    naam: <strong><input type="text" name="naam" placeholder="voor en achternaam" required></strong>
                    <br>
                    email-adres: <input type="text" name="email" required>
                    <br>
                    vegetarisch: <input type="radio" name="ja-nee" value="wel">ja
                    <input type="radio" name="ja-nee" value="geen">nee
                    <br>
                    <hr>
                    Groentes:
                    <br>
                    <input type="checkbox" name="Groentes" value="Boontjes">Boontjes
                    <br>
                    <input type="checkbox" name="Groentes" value="Sla">Sla
                    <br>
                    <input type="checkbox" name="Groentes" value="Wortels">wortels
                    <br>
                    <input type="checkbox" name="Groentes" value="Bloemkool">Bloemkool
                    <br>
                    <input type="submit" name="submit" value="meld mij aan">
            </div>
        </div>
        </form>
    </div>


</body>

</html>