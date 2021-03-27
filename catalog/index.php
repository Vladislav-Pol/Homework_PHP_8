<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/data.php';

updateLocalBase($arOptions);


if (($prodId = $_GET['prodId']) != false) {
    $productData = getLocalCatalogData($prodId);
    $title = $productData['title'];
    $template = 'catalogDetailTemplate.php';
}
else {
    $arCatalogData = getLocalCatalogData();
    addLinkDetail($arCatalogData);

    $title = "Каталог";
    $template = 'catalogTemplate.php';
}


require_once DOCUMENT_ROOT . '/templates/header.php';
require_once $template;
require_once DOCUMENT_ROOT . '/templates/footer.php';