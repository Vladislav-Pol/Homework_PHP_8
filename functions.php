<?php
function getCatalogData($arOptions){
    $ch = curl_init();
    curl_setopt_array($ch, $arOptions);
    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
}

function fixUrlInData(&$arData){
    foreach ($arData as &$item)
        $item['image'] = str_replace("fakestoreapi.com", "fakestoreapi.herokuapp.com", $item['image'])
            ?: "https://via.placeholder.com/200";

}

function addToBasket($addItem){
    $count = $_COOKIE["inBasket_$addItem"] ?? 0;
    setcookie("inBasket_$addItem", ++$count);
}

function getBasketCount(){
    $sum = 0;
    foreach ($_COOKIE as $name => $count){
        if(strpos($name, "inBasket_") !== false)
            $sum += $count;
    }
    return $sum;
}

function getBasketCost(){
    $sum = 0;
    foreach ($_COOKIE as $name => $count) {
        $id = str_replace("inBasket_", "", $name);
        $sum += getPriceById($id) * $count;
    }
    return $sum;
}

function getPriceById($id){
    $arOptionsLoc = [
        CURLOPT_URL => "https://fakestoreapi.herokuapp.com/products/$id",
        CURLOPT_RETURNTRANSFER => true,
    ];
    return getCatalogData($arOptionsLoc)['price'];
}