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
            $sum += getProductDataById($id)['price'] * $count;
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