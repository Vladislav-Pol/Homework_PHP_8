<?php
function getCatalogData($arOptions)
{
    $ch = curl_init();
    curl_setopt_array($ch, $arOptions);
    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
}

function fixUrlInData(&$arData)
{
    foreach ($arData as &$item)
        $item['image'] = str_replace("fakestoreapi.com", "fakestoreapi.herokuapp.com", $item['image'])
            ?: "https://via.placeholder.com/200";

}

function addToBasket($addItem)
{
    if ($_COOKIE['basket']) {
        $basketData = unserialize($_COOKIE['basket']);
        $basketData[$addItem] = ++$basketData[$addItem] ?? 1;
        setcookie('basket', serialize($basketData));
    } else
        setcookie('basket', serialize([$addItem => 1]));
}

function getBasketCount()
{
    $sum = 0;
    $basketData = unserialize($_COOKIE['basket']);
    foreach ($basketData as $count)
        $sum += $count;
    return $sum;
}

function getBasketCost()
{
    $sum = 0;
    $basketData = unserialize($_COOKIE['basket']);
    foreach ($basketData as $id => $count)
        $sum += getPriceById($id) * $count;
    return $sum;
}

function getPriceById($id)
{
    $arOptionsLoc = [
        CURLOPT_URL => "https://fakestoreapi.herokuapp.com/products/$id",
        CURLOPT_RETURNTRANSFER => true,
    ];
    return getCatalogData($arOptionsLoc)['price'];
}