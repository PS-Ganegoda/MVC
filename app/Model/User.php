<?php

class User{
   public $error =[];
    protected $tables="users";

    public function validate($data){
        $this->errors =[];

        if (empty( $data['firstName'])){
            $this->errors['FirstName'] ="a first name is required"; 
        }
        if (empty( $data['email'])){
            $this->errors['email'] ="a email is required"; 
        }

        if (empty( $data['yourUsername'])){
            $this->errors['yourUsername'] =" your Username is required"; 
        }

        if (empty( $data['password'])!= $data['re-password']){
            $this->errors['password'] =" correct password  is required"; 
        }
        if (empty( $this->errors))
        {
           return true;
        }
        return false;
    }

   
}