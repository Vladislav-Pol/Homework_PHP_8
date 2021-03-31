<?php
//Путь от корня диска до корня сайта
$rootPath = $_SERVER['DOCUMENT_ROOT'];
//Рабочий каталог от корня сайта
$path = $_REQUEST['path']?? "";
$fullPath = $rootPath . $path . "/";

//Список возможных типов файлов для создания и редактирования
define('FILE_TYPE', [
    'folder' => 'Папка',
    '.txt' => 'Файл .txt',
    '.html' => 'Файл .html',
    '.css' => 'Файл .css',
    '.js' => 'Файл .js'
]);

//Подготовка данных для редактирования элемента
if(isset($_REQUEST['edit'])){
    $edit = $_REQUEST['edit'];
    $fullFileName = $fullPath . $edit;
    if(is_file($fullFileName)) {
        $fileType = '.' . pathinfo($edit, PATHINFO_EXTENSION);
        $edit = pathinfo($edit, PATHINFO_FILENAME);
        $fileContent = file_get_contents($fullFileName);
    }
}
else
    $edit = false;

//Элемент для создания
$create = isset($_REQUEST['create']) ? true : false;


require_once './functions/main.php';

require_once './functions/crud.php';

//Изменение элемента
if (isset($_REQUEST['saveElement'])) {
    if ($_REQUEST['extension'] == 'folder')
        renameFolder($fullPath . $_REQUEST['oldName'], $fullPath . $_REQUEST['fileName']);
    else
        editFile($fullPath, $_REQUEST['oldName'] . $_REQUEST['oldFileExtension'], $_REQUEST['fileName'] . $_REQUEST['extension'], $_REQUEST['fileContent'] ?? "");
}
//Создание элемента
elseif (isset($_REQUEST['saveNewElement'])) {
    if ($_REQUEST['extension'] == 'folder')
        createNewFolder($fullPath, $_REQUEST['fileName']);
    else
        createNewFile($fullPath, $_REQUEST['fileName'], $_REQUEST['extension'], $_REQUEST['fileContent'] ?? "");
}
//Удаление папки или файла
elseif (isset($_REQUEST['del'])) {
    deleteElement($fullPath . $_REQUEST['del']);
}
//Запись загруженного файла
elseif (isset($_REQUEST['isUpload'])) {
    require_once './functions/upload.php';
    saveUploadFile($fullPath);
}

//Получение содержимого каталога
$dirContent = (scandir(realpath($fullPath)));


