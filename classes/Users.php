<?php
require_once DOCUMENT_ROOT . '/classes/UsersExt.php';

class Users extends UsersExt
{
    protected $data = [];
    public $id;

    //создает нового пользователя, записывает его в базу пользователей и
    public function add($data = ['name' => 'User', 'login' => 'user', 'email' => 'example@example.com', 'phone' => '+375 29 123 12 12', 'password' => 'user', 'groups' => 'guest'])
    {
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        $arUsers = $this->getArData();
        $this->id = max(array_keys($arUsers)) + 1;
        if ($data['name'] == 'User') {
            $data['name'] .= "_$this->id";
            $data['login'] .= "_$this->id";
        }
        $arUsers[$this->id] = $this->data = $data;

        return $this->putArData($arUsers);
    }

    //обновняет данные переданного пользователя
    public function edit($newData, $id)
    {
        $arUsers = $this->getArData();
        if ($arUsers[$id]) {
            $editUser = &$arUsers[$id];
            foreach ($newData as $prop => $value) {
                if (array_key_exists($prop, $editUser) && $value != '') {
                    if ($prop == 'password') {
                        $editUser[$prop] = password_hash($value, PASSWORD_BCRYPT);
                    } else {
                        $editUser[$prop] = $value;
                    }
                }
            }
            return $this->putArData($arUsers);
        } else {
            throw new Exception("Пользователь с ID $id не найден");
        }
    }

    //печатает данные пользователя по переданному id, иначе всех пользователей
    public function get($id = null)
    {
//        echo '<pre>';
        $data = $id == null ? $this::getArData() : $this::getArData()[$id];
//        print_r($data ?: 'Пользователь не найден');
//        echo '</pre>';
        return $data ?: 'Пользователь не найден';
    }

    //если передан ID пользователя, то заполняет свойства объекта данными этого пользователя
    public function __construct($data = null)
    {
        if ($data == null) {
            $this->add();
        } elseif (is_array($data)) {
            $this->add($data);
        } elseif (($this->data = $this->getArData()[$data])) {
            $this->id = $data;
        } else {
            throw new Exception("Пользователь с ID $data не найден");
        }
    }

    //возвращает массив данных пользователей из файла
    protected function getArData()
    {
        $users = file_get_contents(USERS_PATH);
        return json_decode($users, true);
    }

    //записывает массив данных пользователей в файл
    protected function putArData($arUsers)
    {
        $users = json_encode($arUsers);
        return file_put_contents(USERS_PATH, $users);
    }


}