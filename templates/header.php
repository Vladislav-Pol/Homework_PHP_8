<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/media.css">
    <title><?= isset($_GET["id"]) ? $arPages[$_GET["id"]]["name"]: "Treehouse"?></title>
</head>
<body>
<header class="content">
    <div class="logo">
        <a href="/"></a>
        <div class="logo_pic">
            <img src="/image/leaf.png" alt="Logo leaf">
        </div>
        <span>Treehouse</span>
    </div>
    <input type="checkbox" id="burgerCheck">
    <div class="burger_menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <ul class="nav">
        <?foreach($arMenu as $link => $name):?>
        <li><a href="<?=$link?>"><?=$name?></a></li>
        <?endforeach;?>
    </ul>
    <div class="auth">
        <? if(!$userAuth):?>
        <a href="/auth">Войти или зарегистрироваться</a>
        <? else:?>
        <p>Здравствуйте, <?=$_SESSION['user']['name']?></p>
        <a href="./?logout">Выйти</a>
        <? endif;?>
    </div>
    <div class="cart">
                <a href="/cart/"></a>
                <img src="/image/shopping-cart.png" alt="cart">
                <div class="count"><?=$cartCount?></div>
                <div class="cost"><?=$cartCost?> руб.</div>
            </div>
</header>
<main>
<?php

