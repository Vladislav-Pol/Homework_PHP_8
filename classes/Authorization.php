<?php


final class Authorization
{
    //записывает нового пользователя в базу и возвращает объект пользователя
    public static function registration($data)
    {
        $jsonUsers = file_get_contents(DOCUMENT_ROOT . '/bd/data.json') ?: '';
        $arUsers = json_decode($jsonUsers)?: [];

        $preg = '/"login";s:\d+:"' . $data['login'] . '"/';
        foreach($arUsers as $obj){
            if(preg_match($preg, $obj)){
                return false;
            }
        }
        $user = new Users($data);
        $serializeUser = serialize($user);
        $arUsers[] = $serializeUser;
        $newJsonUsers = json_encode($arUsers);
        file_put_contents(DOCUMENT_ROOT . '/bd/data.json', $newJsonUsers);
        return true;
    }

    public static function login($login, $password)
    {
        $jsonUsers = file_get_contents(DOCUMENT_ROOT . '/bd/data.json') ?: '';
        $arUsers = json_decode($jsonUsers)?: [];

        foreach ($arUsers as $obj){
            $user = unserialize($obj);
            $arData = $user->get($user->id);
            if($arData['login'] == $login && password_verify($password, $arData['password'])){
                session_start();
                $_SESSION['auth'] = true;
                return true;
            }
        }
        return false;
    }

    public static function logout()
    {
        session_start();
        unset($_SESSION['auth']);
        return setcookie('PHPSESSID', "", time() - 3600);

    }

    public static function get($email = '')
    {

    }
}