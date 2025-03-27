<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "usser");


if (!$conn) {
    die("Connect error" . mysqli_connect_error());
}