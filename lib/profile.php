<?php

class Profile
{
    
    protected $id;
    protected $name;
    protected $surname;
    protected $sex;
    protected $groupnum;
    protected $email;
    protected $points;
    protected $year;
    protected $place;
    protected $code;
    
    public function setFields($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = trim($value);
        }
        
        $this->name     = $data['name'];
        $this->surname  = $data['surname'];
        $this->sex      = $data['sex'];
        $this->groupnum = $data['groupnum'];
        $this->email    = $data['email'];
        $this->points   = $data['points'];
        $this->year     = $data['year'];
        $this->place    = $data['place'];
    }
    
    public function checkFields()
    {
        $regExp     = "/^[а-яa-zё-]+$/ui";
        $numregExp  = "/^[0-9]+$/";
        $mailregExp = "/.+@.+\..+/i";
        
        if (!preg_match($regExp, $this->name))
            return "name";
        
        if (!preg_match($regExp, $this->surname))
            return "surname";
        
        if (!isset($this->sex))
            return "sex";
        
        if (!preg_match($numregExp, $this->groupnum) || $this->groupnum <= 999 || $this->groupnum > 100000)
            return "groupnum";
        
        if (!preg_match($mailregExp, $this->email))
            return "emailwrong";
        
        if (!preg_match($numregExp, $this->points) || $this->points <= 0 || $this->points > 400)
            return "points";
        
        if (!preg_match($numregExp, $this->year) || $this->year <= 1901 || $this->year > 2015)
            return "year";
        
        if (!isset($this->place))
            return "place";
    }
    
    public function generateCode()
    {
        $string = "abcdefghijklmnopqrstuvwxyz1234567890";
        $length = 36;
        for ($i = 0; $i <= 31; $i++) {
            $newcode .= $string[mt_rand(0, 35)];
        }
        
        $this->code = $newcode;
    }
    
    public function getID()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getSurname()
    {
        return $this->surname;
    }
    
    public function getSex()
    {
        return $this->sex;
    }
    
    public function getGroupnum()
    {
        return $this->groupnum;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getPoints()
    {
        return $this->points;
    }
    
    public function getYear()
    {
        return $this->year;
    }
    
    public function getPlace()
    {
        return $this->place;
    }
    
    public function getCode()
    {
        return $this->code;
    }
    
}

?>