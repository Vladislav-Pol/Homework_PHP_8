<?php

require_once '../data.php';

//if(isset($_REQUEST['order'])){
//    sendOrder();
//}

$fullCartData = getFullCartData($cartData);
$title = "Корзина";

require_once '../templates/header.php';
require_once './cartTemplate.php';
require_once '../templates/footer.php';

