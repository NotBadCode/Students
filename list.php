<?php

require_once "/lib/Profile.php";
require_once "/lib/PDO.php";
require_once "/lib/StudentsMapper.php";
$_GET['num'] = 0;
$mapper = new StudentsMapper($DBH);

if (isset($_GET['submitsearch'])) {
    $students = $mapper->searchStudents($_GET['search'], $_GET['sort'], $_GET['order'], $_GET['num']*50);
} else {
    $students = $mapper->searchStudents("", "", "", $_GET['num']*50);
}

$numstudents = count($students);
$numpages    = ceil($numstudents / 50);


include "templates/list.html";