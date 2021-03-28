<?php
require_once '../data.php';
require_once  'authFunctions.php';

if(isset($_REQUEST['doLogin'])
    && !empty($_REQUEST['login'])
    && !empty($_REQUEST['password'])){
    $userIsAuth = auth($_REQUEST['login'], $_REQUEST['password']);
}

if(isset($_REQUEST['authorisation'])
    && !empty($_REQUEST['name'])
    && !empty($_REQUEST['login'])
    && !empty($_REQUEST['password'])){
    addUser($_REQUEST['name'], $_REQUEST['login'], $_REQUEST['password']);

}



require_once DOCUMENT_ROOT . '/templates/header.php';
require_once 'templates/authTemplate.php';
require_once DOCUMENT_ROOT . '/templates/footer.php';