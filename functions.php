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
    if (($product = getLocalCatalogData($addItem)) != false) {
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
            $sum += getLocalCatalogData($id)['price'] * $count;
    return $sum;
}

function getProductDataById($id)
{
    updateLocalBase($GLOBALS['arOptions']);
    return getLocalCatalogData($id);
}

function getFullCartData($cartData)
{
    if (!is_array($cartData))
        return false;
    $fullCartData = [];
    foreach ($cartData as $id => $count) {
        $cartItem = getProductDataById($id);
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

function updateLocalBase($arOptions)
{
    $db = new DB();
    return $db->updateLocalBase('Products', $arOptions);


}

function updateLocalImagesBase($data)
{
    foreach ($data as &$product){
//        if(file_exists($product['image'])){
            $image = file_get_contents($product['image']);
            $fileData = pathinfo($product['image']);
            $fileName = $fileData['basename'];
            $newFilePath = DOCUMENT_ROOT . '/image/' . $fileName;
            file_put_contents($newFilePath, $image);
            $product['image'] = '/image/' . $fileName;
//        }
    }
    return $data;
}

function getLocalCatalogData($id = false)
{
    $jsonData = file_get_contents(BD_PATH);
    $data = json_decode($jsonData, true);
    if($id === false){
        return $data;
    }
    foreach ($data as $item) {
        if($item['id'] == $id){
            return $item;
        }
    }
    return false;
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