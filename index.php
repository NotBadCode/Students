<?php

	require_once "/lib/pdo.php";

	$mapper = new DataMapper($DBH);
	
		if(isset($_COOKIE['studentscookie']['id'])){
			$id=$_COOKIE['studentscookie']['id'];
			$head="Ваши данные:";
			$showlist=1;
			$student=$mapper->showStudentsbyID($id);

			if(isset($_POST['submit'])){
				$error=$student->setFields($_POST);
				if($mapper->emailUsed($_POST['email']))
					$error="emailused";
        		if(!$error){
					$mapper->editProfile($student);
				}
			}
		}
		else{
			$showlist=0;
			$head="Зарегистрируйтесь";
			$student=new Profile;

			if(isset($_POST['submit'])){
				
				
				if($mapper->emailUsed($_POST['email']))
					$error="emailused";
				else
					$error=$student->setFields($_POST);
        		if(!$error){
        			$mapper->addStudent($student);
					setcookie("studentscookie[id]", $mapper->getLastID(), time()+(7*24*60*60*42), "/");
					header("Location: index.php");
        		}
				
			}
		}

		

	include "templates/profile.html";

?>

