<?php
require_once './data.php';
require_once DOCUMENT_ROOT . '/classes/Users.php';
require_once DOCUMENT_ROOT . '/classes/Authorization.php';

function prent($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

//$user = new Users();
//$user->edit(['login' => 'logi-gin'], 13);
Authorization::login('user_7', 'user');
//prent();
Authorization::logout();

//$user->get();

//$user->add();

//$user->get($user->id);

//$user = Authorization::registration($data = ['name' => 'User', 'login' => 'user_7', 'email' => 'example@example.com', 'phone' => '+375 29 123 12 12', 'password' => 'user', 'groups' => 'guest']);