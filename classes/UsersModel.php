<?php


class UsersModel
{
    public static function addUser($name, $login, $password)
    {
        $users = file_get_contents(USERS_PATH);
        $arUsers = json_decode($users, true);

        $newUser['name'] = $name;
        $newUser['login'] = $login;
        $newUser['password'] = password_hash($password, PASSWORD_BCRYPT);
        $newUser['groups'] = ['user',];
        $newUserId = is_array($arUsers) ? max(array_keys($arUsers)) + 1 : 1;

        $arUsers[$newUserId] = $newUser;
        $users = json_encode($arUsers);
        file_put_contents(USERS_PATH, $users);

        self::auth($login, $password);
    }
    public static function auth($login, $password):bool
    {
        $result = false;
        $users = file_get_contents(USERS_PATH);
        $arUsers = json_decode($users, true);
        if(!is_array($arUsers)){
            return $result;
        }
        foreach ($arUsers as $key => $user) {
            if ($user['login'] == $login && password_verify($password, $user['password'])) {
                session_start();
                $sessionId = session_id();
                $_SESSION['user'] = ['id' => $key, 'name' => $user['name'], 'auth' => true, 'groups' => $user['groups']];
                setcookie('auth', $sessionId, time() + 60 * 60 * 24, '/');
                header('Location: /');
                $result = true;
                return $result;
            }
        }
        return $result;
    }

}