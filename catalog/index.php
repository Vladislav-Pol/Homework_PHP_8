<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/data.php';

DB::getInstance()->updateLocalBase($arOptions);


if (($prodId = $_GET['prodId']) != false) {
    $productData = DB::getInstance()->getLocalCatalogData($prodId)[0];
    $title = $productData['title'];
    $template = 'catalogDetailTemplate.php';
}
else {
    $arCatalogData = DB::getInstance()->get('Products', $_GET['select'], $_GET['filter'], $_GET['order'], ['offset' => $_GET['offset']?: 0, 'limit' => $_GET['limit']]);


//    $arCatalogData = DB::getInstance()->getLocalCatalogData();
    addLinkDetail($arCatalogData);

    $title = "Каталог";
    $template = 'catalogTemplate.php';
}


require_once DOCUMENT_ROOT . '/templates/header.php';
require_once $template;
require_once DOCUMENT_ROOT . '/templates/footer.php';