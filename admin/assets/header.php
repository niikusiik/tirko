<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tirko";

    $mysql = new mysqli($servername, $username, $password, $database);

    if ($mysql->connect_error) {
        die("Connection failed: " . $mysql->connect_error);
    }

    if(isset($_GET['action']) && $_GET['action'] == "logout") {
        unset($_SESSION);
        header('Location: ../login/index.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>