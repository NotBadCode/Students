<?php
require_once "/lib/Profile.php";
require_once "/lib/pdo.php";
require_once "/lib/Datamapper.php";

$mapper = new DataMapper($DBH);

if (isset($_GET['submitsearch'])) {
    $students = $mapper->searchStudents($_GET['search'], $_GET['sort'], $_GET['order']);
} else {
    $students = $mapper->getAllStudents();
}

$numstudents = count($students);
$numpages    = ceil($numstudents / 50);
$_GET['num'] = 1;

include "templates/header.html";
include "templates/list.html";
include "templates/footer.html";
?>