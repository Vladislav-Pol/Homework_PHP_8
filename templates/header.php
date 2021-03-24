<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title><?=$title?></title>
</head>
<body>
<div class="header content">
    <div class="logo">
        <a href="/">
            <img src="/img/free.png" alt="logo">
            <span>Мир товаров</span>
        </a>
    </div>
    <div class="nav">
        <a href="/">Главная</a>
        <a href="/cart/">Корзина</a>
        <a href="#">Контакты</a>
    </div>
    <div class="cart">
        <a href="/cart/"></a>
        <img src="/img/cart.jpg" alt="cart">
        <div class="count"><?=$cartCount?></div>
        <div class="cost"><?=$cartCost?> руб.</div>
    </div>
</div>
<?php
