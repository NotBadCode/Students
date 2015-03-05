<?php

require_once "/lib/Profile.php";
require_once "/lib/PDO.php";
require_once "/lib/StudentsMapper.php";

$mapper = new StudentsMapper($DBH);
if (isset($_COOKIE['studentscookie']['code'])) {
    $code    = $_COOKIE['studentscookie']['code'];
    $head    = "Ваши данные:";
    $student = $mapper->getStudentsbyCode($code);
    $new     = 0;
    $message = "вы можете их изменить";
} else {
    $head    = "Зарегистрируйтесь";
    $student = new Profile;
    $new     = 1;
    $message = '';
}

if (isset($_POST['submit'])) {
    
    $student->setFields($_POST);
    
    if ($mapper->isemailUsed($_POST['email'], $code)) {
        $error   = "emailused";
        $message = "Такой email уже зарегистрирован!";
    } else {
        $error = $student->checkFields();
    }
    
    if (!$error) {
        if ($new) {
            $student->generateCode();
            while ($mapper->iscodeUsed($student->getCode())) {
                $student->generateCode();
            }
            $mapper->addStudent($student);
            $code = $student->getCode();
            setcookie("studentscookie[code]", $code, time() + (7 * 24 * 60 * 60 * 42), "/");
            header("Location: index.php");
            die();
        } else {
            $mapper->editProfile($student);
            $message = "Данные успешно изменены!";
        }
    }
}


include "templates/profile.html";