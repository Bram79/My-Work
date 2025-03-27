<?php
if (isset($_POST['naam'])) {
    $naam = $_POST['naam'];
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

if (isset($_POST['ja-nee'])) {
    $ja_nee = $_POST['ja-nee'];
}


if (isset($_POST['Groentes'])) {
    $groentes = $_POST['Groentes'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        body {
            background-color: darkgreen;
        }

        .header {
            width: 100%;
            height: 100px;
            background-color: yellowgreen;
            display: flex;
            align-items: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .image_1 {
            width: 25%;
            height: 75px;
            background-color: yellow;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 40px;
        }

        .image_1 img {
            height: 60px;
        }

        .text_1 {
            font-size: 18px;
            
        }

        video {
            width: 90%;
            height: auto;
            display: flex;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 30px;
        }
    </style>


</head>

<body>
    <header class="header">
        <div class="image_1">
            <img src="../diatest_2/images/kerstboom.png" alt="kerstboom">
        </div>

        <div class="text_1">Leuk <b><?php echo $naam; ?></b>, dat jij je aangemeld hebt voor de kerstborrel! <br>We
            houden er rekening mee dat jij <b><?php echo $ja_nee; ?></b> vegetarier bent en dat jij erg houd van:
            <b><?php echo $groentes; ?></b> <br> Binnekort ontvang je op: <?php echo $email; ?> een
            bevesteging van deze aanmelding.
        </div>

    </header>
    <div class="video1">
        <video width="1000px" height="500px" controls autoplay>
            <source
                src="../diatest_2/Mariah Carey - All I Want for Christmas Is You (Make My Wish Come True Edition).mp4"
                </video>
    </div>
</body>

</html>