<?php
require_once 'functions.php';

$arOptions = [
    CURLOPT_URL => "https://fakestoreapi.herokuapp.com/products",
    CURLOPT_RETURNTRANSFER => true,
];


$cartData = unserialize($_COOKIE['cart']);
if (intval($_GET['del']))
    delFromCart($cartData, $_GET['del']);
if (intval($_GET['add']))
    addToCart($cartData, $_GET['add']);
$cartCount = getCartCount($cartData);
$cartCost = getCartCost($cartData);

if (isset($_GET['cart'])) {
    $fullCartData = getFullCartData($cartData);
    $mainTemplate = './templates/cart.php';
} else {
    $arCatalogData = getCatalogData($arOptions);
    $mainTemplate = './templates/main.php';
}


