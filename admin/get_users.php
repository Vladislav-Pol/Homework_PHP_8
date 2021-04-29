<?php
require_once '../data.php';
require_once DOCUMENT_ROOT . '/classes/Users0.php';
?>
<pre>
<!--    --><?//= print_r(Users::getAllUsers());?>
<!--    <hr>-->
<!--    --><?//= print_r(Users::getAllUsers(['name', 'password']));?>

    <?= print_r(new Users(6));?>
    <?= var_dump(new Users(1));?>
</pre>