<?php

class StudentsMapper
{
    private $DBH;
    
    public function __construct(PDO $DBH)
    {
        $this->DBH = $DBH;
    }
    
    public function countStudents()
    {
        $STH = $this->DBH->prepare("SELECT COUNT(*) FROM students"); 
        return $STH->fetchColumn();
    }

    public function searchStudents($request, $sort, $order, $offset)
    {
        
        $sortRegExp  = "/^(name|surname|points|groupnum)$/ui";
        $orderRegExp = "/^(ASC|DESC)$/ui";
        if (!preg_match($sortRegExp, $sort) || !preg_match($orderRegExp, $order)) {
            return "error request";
        }
        
        $STH = $this->DBH->prepare("SELECT name, surname, groupnum, points FROM students WHERE name LIKE :request OR surname LIKE :request OR groupnum LIKE :request 
            ORDER BY $sort $order LIMIT $offset, 50");
        $STH->bindparam(":request", $request);
        
        $request = "%" . $request . "%";
        
        $STH->execute();
        
        $result = $STH->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "profile");
        return $result;
        
    }
    
    public function isemailUsed($email, $code)
    {
        $STH = $this->DBH->prepare("SELECT * FROM students WHERE email=:email and code!=:code");
        $STH->bindValue(":email", $email);
        $STH->bindValue(":code", $code);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_CLASS, 'profile');
        return $STH->fetch();
    }
    
    public function iscodeUsed($code)
    {
        $STH = $this->DBH->prepare("SELECT * FROM students WHERE code=:code");
        $STH->bindValue(":code", $code);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_CLASS, 'profile');
        return $STH->fetch();
    }
    
    public function getStudentsbyCode($code)
    {
        $STH = $this->DBH->prepare("SELECT * FROM students WHERE code=:code");
        $STH->bindValue(":code", $code);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_CLASS, 'profile');
        return $STH->fetch();
    }
    
    public function getAllStudents()
    {
        $STH = $this->DBH->prepare("SELECT * FROM students");
        $STH->execute();
        $result = $STH->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "profile");
        return $result;
    }
    
    public function addStudent(Profile $profile)
    {
        $STH = $this->DBH->prepare("INSERT INTO students (name, surname, sex, groupnum, email, points, year, place, code) 
            VALUES (:name, :surname, :sex, :groupnum, :email, :points, :year, :place, :code)");
        
        $STH->bindValue(":name", $profile->getName());
        $STH->bindValue(":surname", $profile->getSurname());
        $STH->bindValue(":sex", $profile->getSex());
        $STH->bindValue(":groupnum", $profile->getGroupnum());
        $STH->bindValue(":email", $profile->getEmail());
        $STH->bindValue(":points", $profile->getPoints());
        $STH->bindValue(":year", $profile->getYear());
        $STH->bindValue(":place", $profile->getPlace());
        $STH->bindValue(":code", $profile->getCode());
        
        $STH->execute();
        $profile->setID($this->DBH->lastInsertId());
    }
    
    public function editProfile(Profile $profile)
    {
        $STH = $this->DBH->prepare("UPDATE students SET name=:name, surname=:surname, sex=:sex, groupnum=:groupnum, email=:email, points=:points, year=:year, place=:place 
            WHERE id=:id");
        $STH->bindValue(":name", $profile->getName());
        $STH->bindValue(":surname", $profile->getSurname());
        $STH->bindValue(":sex", $profile->getSex());
        $STH->bindValue(":groupnum", $profile->getGroupnum());
        $STH->bindValue(":email", $profile->getEmail());
        $STH->bindValue(":points", $profile->getPoints());
        $STH->bindValue(":year", $profile->getYear());
        $STH->bindValue(":place", $profile->getPlace());
        $STH->bindValue(":id", $profile->getID());
        
        $STH->execute();
    }
    
}