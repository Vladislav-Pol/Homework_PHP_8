<?php
require_once 'functions.php';

$arOptions = [
    CURLOPT_URL => "https://fakestoreapi.herokuapp.com/products",
    CURLOPT_RETURNTRANSFER => true,
];

$arCatalogData = getCatalogData($arOptions);
fixUrlInData($arCatalogData);

$basketCount = getBasketCount();
$basketCost = getBasketCost();
if(isset($_REQUEST['add'])){
    addToBasket($_REQUEST['add']);
    $basketCount++;
    $basketCost += getPriceById($_REQUEST['add']);
}


$mainTemplate = './templates/main.php';
if(isset($_REQUEST['cart']))
    $mainTemplate = './templates/basket.php';