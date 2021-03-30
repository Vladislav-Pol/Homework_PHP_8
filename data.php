<?php
define ('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('BD_PATH', DOCUMENT_ROOT . '/bd/products.json');
define('USERS_PATH', DOCUMENT_ROOT . '/bd/users.json');
define('TIME_ACTUAL_DB', '120');
$arOptions = [
    CURLOPT_URL => "https://fakestoreapi.herokuapp.com/products",
    CURLOPT_RETURNTRANSFER => true,
];
$arMenu = [
    '/' => 'Главная',
    '/catalog/' => 'Каталог',
    '/cart/' => 'Корзина',
    '#' => 'Контакты',
    ];
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

//Если не авторизован - показывать кнопку войти
//Иначе приветствовать пользователя
// и если пользователь из группы администраторов показывать кнопку перехода в админку

if(isset($_COOKIE['cart'])){
    $cartData = unserialize($_COOKIE['cart']);
}
if (intval($_GET['del']))
    delFromCart($cartData, $_GET['del']);
if (intval($_GET['add']))
    addToCart($cartData, $_GET['add']);
$cartCount = getCartCount($cartData);
$cartCost = getCartCost($cartData);





