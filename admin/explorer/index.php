<?php
require_once '../../data.php';

if(!in_array('admin', $userGroups)){
    header('Location: /');
}

require_once './adminData.php';


require_once '../templates/header.php';

if($create || $edit)
    require_once './templates/create_edit.php';
elseif(isset($_REQUEST['upload']))
    require_once './templates/uploadFile.php';
else
    require_once './templates/templates.php';

require_once '../templates/footer.php';
