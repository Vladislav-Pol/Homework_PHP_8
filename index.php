<?php

require_once './data.php';

updateLocalBase($arOptions);
$arCatalogData = getLocalCatalogData();
addLinkDetail($arCatalogData);
//$arCatalogData = getCatalogData($arOptions);
$title = "Главная страница";

require_once './templates/header.php';
require_once './templates/main.php';
require_once './templates/footer.php';