<?php


class DB
{
    protected $mySqlI;

    /**Функция чтения должна принимать параметры (arSelect[список возвращаемых полей], arFilter[массив для фильтрации вида поле->значение], arOrder[массив для сортировки вида поле->asc|desc], arLimit[ограничение выборки параметры offset->, limit->])
     * @param null $arSelect - список возвращаемых полей
     * @param null $arFilter - массив для фильтрации вида поле->значение
     * @param null $arOrder - массив для сортировки вида поле->asc|desc
     * @param null[] $arLimit - ограничение выборки параметры offset->, limit->
     */
    public function get($arSelect = null, $arFilter = null, $arOrder = null, $arLimit = ['offset' => null, 'limit' => null])
    {

    }

    /** метод обновляет данные в БД
     * @param $table
     * @param $arData
     * @return string
     */
    public function updateLocalBase($table, $arData)
    {
        if (file_exists(BD_PATH)
            && (time() - filemtime(BD_PATH)) < TIME_ACTUAL_DB) {
            return 'Local base is actual';
        }
        if (($newData = $this->getCatalogData($arData)) !== false) {
            $newData = updateLocalImagesBase($newData);

            foreach ($newData as $product) {
                $arProps = array_intersect_key($product, array_flip(['id', 'title', 'price', 'description', 'image']));
                $arProps['api_id'] = $arProps['id'];
                unset($arProps['id']);
                $this->put($table, $arProps);
            }
            $jsonData = json_encode($newData);
            file_put_contents(BD_PATH, $jsonData);
            return 'Update success';
        }
        return "Base is not actual, update Error";
    }

    /** метод забирает данные с API и возвращает в виде массива
     * @param $arOptions
     * @return false|mixed
     */
    protected function getCatalogData($arOptions)
    {
        $ch = curl_init();
        curl_setopt_array($ch, $arOptions);
        $result = curl_exec($ch);
        curl_close($ch);
        if ($result == "null")
            return false;
        $arResult = json_decode($result, true);
        //fixUrlInData($arResult);
        return $arResult;
    }


    /**
     * проверка на существование записи с таким api_id в базе, если есть, тогда обновляется запись, иначе создается новая
     * @param null $tableName - имя таблицы
     * @param null $arFields - массив значений ИмяПоля => значение
     */
    public function put($tableName = null, $arFields = null)
    {
        $query = "SELECT id FROM $tableName WHERE api_id = {$arFields['api_id']}";
        if ($this->mySqlI->query($query)->fetch_assoc()) {
            $this->update($tableName, $arFields);
        } else {
            $this->insert($tableName, $arFields);
        }
    }

    protected function update($tableName, $arFields)
    {
        $query = "UPDATE $tableName  SET ";
        foreach ($arFields as $prop => $value) {
            $value = $this->mySqlI->real_escape_string($value);
            $query .= "$prop = '$value', ";
        }
        $query = preg_replace('/, $/', '', $query);
        $query .= "WHERE $tableName.api_id = {$arFields['api_id']};";

        $this->mySqlI->query($query);
    }

    protected function insert($tableName, $arFields)
    {
        $query = "INSERT INTO $tableName (";
        foreach ($arFields as $prop => $value) {
            $query .= $prop . ', ';
        }
        $query = preg_replace('/, $/', '', $query);
        $query .= ") VALUES (";
        foreach ($arFields as $prop => $value) {
            $query .= "'" . $this->mySqlI->real_escape_string($value) . "', ";
        }
        $query = preg_replace('/, $/', '', $query);
        $query .= ")";

        $this->mySqlI->query($query);
    }

    public function __construct()
    {
        $config = require_once $_SERVER['DOCUMENT_ROOT'] . '/db_mysql/db_config.php';
        $this->mySqlI = new mysqli($config['hostname'], $config['username'], $config['password'], $config['database'], $config['port']);
    }

    public function __destruct()
    {
        $this->mySqlI->close();
    }
}
