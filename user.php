<?php
      class User {
            public $id;
            public $firstname;
            public $lastname;
            public $gender;
            public $birth_date;
            public $residence;
            public $street;
            public $house_number;
            public $addition;
            public $postal_code;
            public $phone_number;
            public $email;     
            
            public function update_phone_number($phone_number){
                  return $phone_number;
            }
      }
?>