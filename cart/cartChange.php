<?php
if (isset($_COOKIE['cart'])) {
    $cartData = unserialize($_COOKIE['cart']);

    foreach ($_POST as $key => $count) {
        if (key_exists($key, $cartData)) {
            $count = intval($count);
            if($count == 0){
                unset($cartData[$key]);
            }
            else{
                $cartData[$key] = $count;
            }
        }
    }
    setcookie('cart', serialize($cartData), 0, '/');
}
header('Location: /cart');