<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Users.php';

$user = new User();
$user->logout();

header("Location: login.php");
exit;

?>