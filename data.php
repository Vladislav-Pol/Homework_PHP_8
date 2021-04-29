<?php
define ('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('BD_PATH', DOCUMENT_ROOT . '/bd/products.json');
define('USERS_PATH', DOCUMENT_ROOT . '/bd/users.json');
define('TIME_ACTUAL_DB', '1200');
$arOptions = [
    CURLOPT_URL => "https://fakestoreapi.com/products",
    CURLOPT_RETURNTRANSFER => true,
];
$arMenu = [
    '/' => 'Главная',
    '/catalog/' => 'Каталог',
    '/cart/' => 'Корзина',
    //'#' => 'Контакты',
    ];
require_once DOCUMENT_ROOT . '/classes/DB.php';
require_once 'functions.php';

if(isset($_REQUEST['logout']))
    logout();

$userAuth = checkAuth();
$userGroups = ($_SESSION['user']['groups']) ?? [];

if($userAuth){
    if (in_array('admin', $userGroups)){
        $arMenu['/admin'] = 'Админка';
    }
    $arMenu['./?logout'] = 'Выйти';
}
else{
    $arMenu['/auth'] = 'Авторизоваться';
}

if(isset($_COOKIE['cart'])){
    $cartData = unserialize($_COOKIE['cart']);
}
if (intval($_GET['del']))
    delFromCart($cartData, $_GET['del']);
if (intval($_GET['add']))
    addToCart($cartData, $_GET['add']);
$cartCount = getCartCount($cartData);
$cartCost = getCartCost($cartData);





