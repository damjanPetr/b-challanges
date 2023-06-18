<?php

require_once './Company/company.php';
require_once './Database/Connection.php';

use \Company\Company;

use \Database\Connection;

$post_array = $_POST;

var_dump($post_array);
$template = new Company(...$post_array);
$template->create();
$template->getLastId();


header('Location: ./page3.php?id=' . $template->getLastId());
