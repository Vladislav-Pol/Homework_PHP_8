<?php
require_once 'functions.php';

define('BD_PATH', $_SERVER['DOCUMENT_ROOT'] . '/bd/products.json');
define('TIME_ACTUAL_DB', '120');
$arOptions = [
    CURLOPT_URL => "https://fakestoreapi.herokuapp.com/products",
    CURLOPT_RETURNTRANSFER => true,
];

if(isset($_COOKIE['cart'])){
    $cartData = unserialize($_COOKIE['cart']);
}
if (intval($_GET['del']))
    delFromCart($cartData, $_GET['del']);
if (intval($_GET['add']))
    addToCart($cartData, $_GET['add']);
$cartCount = getCartCount($cartData);
$cartCost = getCartCost($cartData);





