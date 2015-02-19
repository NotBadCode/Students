<?php

	require_once "/lib/login.php";
	require_once "/lib/Profile.php";

	$DBH=new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	class DataMapper
	{
	    public $DBH;

	    public function __construct(PDO $DBH)
	    {
	        $this->DBH=$DBH;
	    }
		
		public function searchStudents($request, $sort, $order)
	    {	        

	        $STH=$this->DBH->prepare("SELECT name, surname, groupnum, points FROM students WHERE name LIKE :request OR surname LIKE :request OR groupnum LIKE :request 
	        	ORDER BY $sort $order");
	        $STH->bindparam(":request", $request);

	        $request="%".$requests."%";

	        $STH->execute();
	        
	        $result = $STH->fetchAll(PDO::FETCH_CLASS, "profile");
	        return $result;
	        	        
	    }


	    public function emailUsed($email)
	    {
	        $STH=$this->DBH->prepare("SELECT * FROM students WHERE email=:email");
	        $STH->bindparam(":email", $email);
	        $STH->execute();
	        $STH->setFetchMode(PDO::FETCH_CLASS, 'profile');
	        return $STH->fetch();
	    }

	    public function showStudentsbyID($id)
	    {
	        $STH = $this->DBH->prepare("SELECT * FROM students WHERE id=:id");
	        $STH->bindparam(":id", $id);
	        $STH->execute();
	        $STH->setFetchMode(PDO::FETCH_CLASS, 'profile');
        	return $STH->fetch();
	    }

	    public function showAllStudents()
	    {

		    $STH=$this->DBH->prepare("SELECT * FROM students");
	        $STH->execute();
	        $result=$STH->fetchAll(PDO::FETCH_CLASS, "profile");
	        return $result;
	    }

	    public function addStudent(Profile $profile)
	    {
	    	

	        $STH = $this->DBH->prepare("INSERT INTO students (name, surname, sex, groupnum, email, points, year, place) 
	        	VALUES (:name, :surname, :sex, :groupnum, :email, :points, :year, :place)");

	        $STH->bindparam(":name", $name);
	        $STH->bindparam(":surname", $surname);
	        $STH->bindparam(":sex", $sex);
	        $STH->bindparam(":groupnum", $groupnum);
	        $STH->bindparam(":email", $email);
	        $STH->bindparam(":points", $points);
	        $STH->bindparam(":year", $year);
	        $STH->bindparam(":place", $place);

	        $name=$profile->showName();
	        $surname=$profile->showSurname();
	        $sex=$profile->showSex();
	        $groupnum=$profile->showGroupnum();
	        $email=$profile->showEmail();
	        $points=$profile->showPoints();
	        $year=$profile->showYear();
	        $place=$profile->showPlace();

	        

	        $STH->execute();
	    }

	    public function editProfile(Profile $profile)
	    {
	        $STH=$this->DBH->prepare("UPDATE students SET name=:name, surname=:surname, sex=:sex, groupnum=:groupnum, email=:email, points=:points, year=:year, place=:place WHERE id=:id");
	        $STH->bindparam(":name", $name);
	        $STH->bindparam(":surname", $surname);
	        $STH->bindparam(":sex", $sex);
	        $STH->bindparam(":groupnum", $groupnum);
	        $STH->bindparam(":email", $email);
	        $STH->bindparam(":points", $points);
	        $STH->bindparam(":year", $year);
	        $STH->bindparam(":place", $place);
	        $STH->bindparam(":id", $id);

	        $name=$profile->showName();
	        $surname=$profile->showSurname();
	        $sex=$profile->showSex();
	        $groupnum=$profile->showGroupnum();
	        $email=$profile->showEmail();
	        $points=$profile->showPoints();
	        $year=$profile->showYear();
	        $place=$profile->showPlace();
	        $id=$profile->showID();
	        $STH->execute();
	    }

	    public function getLastID()
	    {
	        
	        $STH=$this->DBH->query("SELECT COUNT(*) FROM students");
	        $result=$STH->fetchColumn();
	        $id=$result;
	        return $id;
	    }



	    

	}
?>