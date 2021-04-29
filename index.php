<?php

require_once './data.php';

DB::getInstance()->updateLocalBase($arOptions);
$arCatalogData = DB::getInstance()->getLocalCatalogData();
addLinkDetail($arCatalogData);
//$arCatalogData = getCatalogData($arOptions);
$title = "Главная страница";

require_once './templates/header.php';
require_once './templates/main.php';
require_once './templates/footer.php';