<?php

if (isset($_GET['operation'])) {
    $x = $_GET['num1'];
    $y = $_GET['num2'];
    $op = $_GET['operation'];


    if (is_numeric($x) && is_numeric($y)) {
        switch ($op) {
            case 'plus':
                $resultaat = $x + $y;
                break;
            case 'min':
                $resultaat = $x - $y;
                break;
            case 'keer':
                $resultaat = $x * $y;
                break;
            case 'delen':
                $resultaat = $x / $y;
                break;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekenmachine</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <h1 style="color:red">Rekenmachine</h1>


        <style>
            body {
                background-color: black;
            }
        </style>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">

            <!--nummer 1-->
            <div>
                <label style="color: white" ; for="num1">nummer 1</label>
                <input type="number" name="num1" id="num1" value="<?= $x ?>" required>
            </div>
            <!--nummer 2-->
            <div>
                <label style="color: white" ; for="num2">nummer 2</label>
                <input type="number" name="num2" id="num2" value="<?= $y ?>" required>
            </div>
            <!--resultaat-->
            <div>
                <label style="color: white" ; for="result">resultaat </label>
                <input type="number" id="result" value="<?= $resultaat ?>" disabled>
            </div>
            <!--Operation-->
            <div>
                <input type="submit" value="plus" name="operation">
                <input type="submit" value="min" name="operation">
                <input type="submit" value="keer" name="operation">
                <input type="submit" value="delen" name="operation">
            </div>
            <!--reset-->
            <div>
                <input type="reset" value="Reset" style="background-color: red; color: white" />
            </div>

        </form>
        <br>
        <a href="https://www.youtube.com/watch?v=G9Xpa6iKOoM">
            <img src="../image/rekenmachine.jpg" alt="rekenmachine" width="200" height="200">
        </a>
        <br>
        <audio loop >
            <source src="../audio\talking_man.mp3">
        </audio>
       
        <br>
        <audio loop autoplay>
        <source src="../audio/piece_africa.mp3">
        </audio>
      


        </b>
    </center>

</html>