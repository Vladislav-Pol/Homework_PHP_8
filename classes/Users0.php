<?php

class Users0
{
    public $name = '';
//    protected $lastName = '';
    protected $groups = [];
    public $login = '';
    protected $password = '';

    const DEFAULT_USER = 'test';
    const DEFAULT_GROUP = 'guest';

    public function __construct($id)
    {
        $users = self::getUsersData();
        $user = $users[$id];
        if(isset($user)){
            $this->name = $user['name'];
            $this->groups = $user['groups'];
            $this->login = $user['login'];
            $this->password = $user['password'];
        }
        else{
            throw new Exception('Пользователь не найден');
        }
    }

    private function getUsersData()
    {
        $usersJson = file_get_contents(USERS_PATH);
        $users = json_decode($usersJson, true);
        return $users;
    }

    public static function getAllUsers($props = ['name', 'login', 'groups'])
    {
        $users = self::getUsersData();

        foreach ($users as $user) {
            foreach ($user as $property => $value) {
                if (in_array($property, $props) && $property != 'password') {
                    $arUser[$property] = $value;
                }
            }
            if (!empty($arUser)) {
                $arUsers[] = $arUser;
            }
        }
        return $arUsers;
    }

    public static function create($login = self::DEFAULT_USER, $password = self::DEFAULT_USER, $groups = self::DEFAULT_GROUP)
    {
        $newUser = [];

    }
    protected static function setData($data = [])
    {
        $res = false;
        if(!empty($data)){
            $arUsers = self::getUsersData();
            $arUsers[] = $data;
            $jsonUsers = json_encode($arUsers);
            $res = file_put_contents(USERS_PATH, $jsonUsers);
        }
        return $res;
    }
}
