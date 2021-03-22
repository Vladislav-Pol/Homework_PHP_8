<?php
echo "404 Запрашиваемая страница (\"" . $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "\") не существует";