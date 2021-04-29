<?php

function fixUrlInData(&$arData)
{
    if (key_exists('image', $arData))
        $arData['image'] = str_replace("fakestoreapi.com", "fakestoreapi.herokuapp.com", $arData['image'])
            ?: "https://via.placeholder.com/200";
    else
        foreach ($arData as &$item)
            $item['image'] = str_replace("fakestoreapi.com", "fakestoreapi.herokuapp.com", $item['image'])
                ?: "https://via.placeholder.com/200";
}

function addToCart(&$cartData, $addItem)
{
    if (($product = DB::getInstance()->getLocalCatalogData($addItem)) != false) {
        ++$cartData[$addItem];
        setcookie('cart', serialize($cartData), 0, '/');
    }
    header('Location: /catalog');
}

function delFromCart(&$cartData, $delItem)
{
    if ($cartData) {
        unset($cartData[$delItem]);
    }
    setcookie('cart', serialize($cartData), 0, '/');
    header('Location: /cart');
}

function getCartCount($cartData)
{
    $count = 0;
    if (is_array($cartData))
        $count = count($cartData);
    return $count;
}

function getCartCost($cartData)
{
    $sum = 0;
    if (is_array($cartData))
        foreach ($cartData as $id => $count)
            $sum += DB::getInstance()->getLocalCatalogData($id)['price'] * $count; //todo
    return $sum;
}

function getFullCartData($cartData)
{
    if (!is_array($cartData))
        return false;
    $fullCartData = [];
    foreach ($cartData as $id => $count) {
        $cartItem = DB::getInstance()->getLocalCatalogData($id);
        $cartItem['count'] = $count;
        $cartItem['cost'] = $cartItem['price'] * $count;
        $fullCartData[] = $cartItem;
    }
    return $fullCartData;
}

function createXML()
{
    $fileName = $_SERVER['DOCUMENT_ROOT'] . "/bd/products.xml";

    $xd = xmlwriter_open_uri($fileName);
    xmlwriter_set_indent($xd, true);
    xmlwriter_set_indent_string($xd, "    ");
    xmlwriter_start_document($xd, "1.0", "UTF-8");
    xmlwriter_start_element($xd, "products");
    xmlwriter_text($xd, "содержимое тега");
    xmlwriter_end_element($xd);
    xmlwriter_end_document($xd);
}

function addProductToXML()//todo
{
    $fileName = $_SERVER['DOCUMENT_ROOT'] . "/bd/products.xml";
    $xd = xmlwriter_open_uri($fileName);
}

function addLinkDetail(&$arCatalogData)
{
    foreach ($arCatalogData as &$product){
        $title = trim($product['title']);
        $title = mb_strtolower($title);
        $linkDetail = preg_replace('/\W/', '_', $title) . "_" . $product['id'];
        $product['linkDetail'] = $linkDetail;
    }
}

//function sendOrder()
//{
//    mail("rakuvka@gmail.com", "Загаловок", "Текст письма \n 1-ая строчка \n 2-ая строчка \n 3-ая строчка");
//}

function checkAuth(){
    if(!$_COOKIE['auth']){
        return false;
    }
    session_id($_COOKIE['auth']);
    session_start();
    return $_SESSION['user']['auth'];
}
function logout()
{
    session_start();
    unset($_COOKIE['auth'], $_SESSION['user']);
    header('Location: ./');
}