<?php

    date_default_timezone_set("Europe/Bratislava");

    if(trim($_POST['odpoved']) == $_POST['spravnaOdpoved']) {

        $suborPrispevky = fopen("prispevky.csv","a");

        $novyPrispevok[] = $_GET['pocet'] + 1;
        $novyPrispevok[] = $_POST['meno'];
        $novyPrispevok[] = $_POST['sprava'];
        $novyPrispevok[] = date('Y-m-d H:i:s', time());

        fputcsv($suborPrispevky, $novyPrispevok, ';');
        fclose($suborPrispevky);
    } else
    {
        echo "Nesprávna odpoveď.";
    }

    header('Location: index.php');

?>