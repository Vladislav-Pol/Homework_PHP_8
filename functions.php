<?php
function getCatalogData($arOptions)
{
    $ch = curl_init();
    curl_setopt_array($ch, $arOptions);
    $result = curl_exec($ch);
    curl_close($ch);
    if ($result == "null")
        return false;
    $arResult = json_decode($result, true);
    fixUrlInData($arResult);
    return $arResult;
}

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
    if (($product = getProductDataById($addItem)) != false) {
        ++$cartData[$addItem];
        setcookie('cart', serialize($cartData));
    }
}

function delFromCart(&$cartData, $delItem)
{
    if ($cartData) {
        unset($cartData[$delItem]);
    }
    setcookie('cart', serialize($cartData));
    header('Location: /cart');
}

function getCartCount($cartData)
{
    return count($cartData);
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
   $arOptionsLoc = [
        CURLOPT_URL => "https://fakestoreapi.herokuapp.com/products/$id",
        CURLOPT_RETURNTRANSFER => true,
    ];
    return getCatalogData($arOptionsLoc);
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
    if(file_exists(BD_PATH)
        && (time() - filemtime(BD_PATH)) < TIME_ACTUAL_DB){
        return 'Local base is actual';
    }
    if(($newData = getCatalogData($arOptions)) !== false){
        $jsonData = json_encode($newData);
        file_put_contents(BD_PATH, $jsonData);
        return 'Update success';
    }
    return "Base is not actual, update Error";
}

function getLocalCatalogData($id = false)
{
    $jsonData = file_get_contents(BD_PATH);
    $data = json_decode($jsonData, true);
    return $id === false ? $data : $data[$id];
}