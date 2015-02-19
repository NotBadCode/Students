<?php
	require_once "/lib/pdo.php";
	$mapper = new DataMapper($DBH);

	if(!isset($_COOKIE['studentscookie']['id'])){
		header("Location: index.php");
	}


	if(isset($_POST['submitsearch'])){
		$students=$mapper->searchStudents($_POST['search'],$_POST['sort'],$_POST['order']);
	}
	else
	{
		$students=$mapper->showAllStudents();
	}

	$numstudents=count($students);
	$numpages=ceil($numstudents/50);
	$_GET['num']=1;
   

	include "templates/list.html";
?>