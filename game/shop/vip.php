<?php
require_once("../../res/connect.php");

session_start();

if ((!isset($_SESSION['zalogowany'])) || (!isset($_SESSION['id']))) {
    header('Location: ../../index.html');
    exit();
}
$sesid = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKAGO | VIP </title>
    <link rel="stylesheet" href="../../res/css/vip.css" />
    <link rel="icon" type="image/png" href="../../res/photo/logo.png">
    <script src="https://kit.fontawesome.com/0ed3b8ed5d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<h2 id="stan" hidden><?php

$nick = $_SESSION['user'];

$checkBalance = $polaczenie->query("SELECT balance FROM uzytkownicy WHERE user = '$nick'");
if ($checkBalance->num_rows > 0) {

    $tmp = $checkBalance->fetch_assoc();
    $balance = $tmp['balance'];
    echo $balance;
}

?></h2>
<section class="section-plans" id="section-plans">
    <div class="u-center-text u-margin-bottom-big">
        <h2 class="heading-secondary">
            VIP
        </h2>
    </div>

    <div class="row">
        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-1">
                    <div class="card__title card__title--1">
                        <i class="fas fa-paper-plane"></i>
                        <h4 class="card__heading">Miesiąc</h4>
                    </div>

                    <div class="card__details">
                        <ul>
                            <li>1 Miesiąc premium</li>
                            <li>2 tokelony co tydzień</li>
                            <li>10 tokelonów na start</li>
                            <li>Specjalny skin</li>
                            <li>Specjalne wyróżnienie w rankingu</li>
                            <li>Specjalne eventy</li>
                        </ul>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-1">
                    <div class="card__cta">
                        <div class="card__price-box">
                            <p class="card__price-only">Tylko</p>
                            <p class="card__price-value">20 coins</p>
                        </div>
                        <a class="btn btn--white" onclick="vip_m()">Kup</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-1-of-3">
            <div class="card">
                <div class="card__side card__side--front-3">
                    <div class="card__title card__title--3">
                        <i class="fas fa-rocket"></i>
                        <h4 class="card__heading">Rok</h4>
                    </div>

                    <div class="card__details">
                        <ul>
                            <li>1 Rok premium</li>
                            <li>4 tokelonów co tydzień</li>
                            <li>20 tokelonów na start</li>
                            <li>Specjalny skin</li>
                            <li>Specjalne wyróżnienie w rankingu</li>
                            <li>Specjalne eventy</li>
                        </ul>
                    </div>
                </div>
                <div class="card__side card__side--back card__side--back-3">
                    <div class="card__cta">
                        <div class="card__price-box">
                            <p class="card__price-only">Tylko</p>
                            <p class="card__price-value">200 coins</p>
                        </div>
                        <a class="btn btn--white" onclick="vip_r()">Kup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="u-center-text u-margin-top-huge">
        <a href="shop.php" class="btn btn--green">Wróć</a>
    </div>
</section>
<script src="../../res/js/sklep.js" type="text/javascript"></script>
<script>//document.addEventListener('contextmenu', event => event.preventDefault());</script>
</body>
</html>
