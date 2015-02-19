<?php 

	class Profile{
		
        protected $id;
    	protected $name;
    	protected $surname;
    	protected $sex;
    	protected $groupnum;
    	protected $email;
    	protected $points;
    	protected $year;
    	protected $place;
        
        public function setFields($data)
        {
            foreach ($data as $key => $value) {
                $data[$key]=trim($value);
            }
            if($id!="") $this->id=$data['id'];

            $regExp="/^[а-яa-zё-]+$/ui";
            if(!preg_match($regExp, $data['name']))
                return "name";

            if(!preg_match($regExp, $data['surname']))
                return "surname";

            if(!isset($data['sex']))
                return "sex";

            $regExp="/^[0-9]+$/";
            if(!preg_match($regExp, $data['groupnum']) || $data['groupnum']<=999 || $data['groupnum']>100000)
                return "groupnum";

            $regExp="/^[a-zA-Z0-9_+.-]+@[a-z0-9.-]+(\.)[a-z]{2,}$/ui";
                if(!preg_match($regExp, $data['email']))
                    return "emailwrong";

            $regExp="/^[0-9]+$/";

            if(!preg_match($regExp, $data['points']) || $data['points']<=0 || $data['points']>400)
                return "points";

            if(!preg_match($regExp, $data['year']) || $data['year']<1990 || $data['year']>2015)
                return "year";

            if(!isset($data['place']))
                return "place";
            
           
            $this->name = $data['name'];
            $this->surname = $data['surname'];
            $this->sex = $data['sex'];
            $this->groupnum = $data['groupnum'];
            $this->email = $data['email'];
            $this->points = $data['points'];
            $this->year = $data['year'];
            $this->place = $data['place'];
        }

        public function showID()
        {
            return $this->id;
        }

        public function showName()
        {
            return $this->name;
        }
        
        public function showSurname()
        {
            return $this->surname;
        }
        
        public function showSex()
        {
            return $this->sex;
        }

        public function showGroupnum()
        {
            return $this->groupnum;
        }
        
        public function showEmail()
        {
            return $this->email;
        }
        
        public function showPoints()
        {
            return $this->points;
        }
        
        public function showYear()
        {
            return $this->year;
        }
        
        public function showPlace()
        {
            return $this->place;
        }
    
	}
?>