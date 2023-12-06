<?php

class Database
{
    private function connect() //create connection with databases
    {
        $str = DBDRIVER . ":host=" . DBHOST . ";dbname=" . DBNAME;
    
        return new PDO($str,DBUSER,DBPASS);
    }

    public function query($query, $data = [], $type = 'object')     //create queries
    {
        $con = $this->connect(); 

        $stm = $con -> prepare($query);
         
        if($stm){
            $check = $stm->execute($data);
            if($check){
                 $type = PDO::FETCH_OBJ;
                 if($type == 'object'){
                    $type = PDO::FETCH_ASSOC;
                 }else{
                    $type = PDO::FETCH_OBJ;

                 }
                 
                 $result = $stm ->fetchAll($type);

                 if(is_array($result)&& count($result)> 0){
                    return $result;

                 }
            }
        }

        // Return false if any step fails
        return false;
    }
    public function create_tables(){
        $query = "
        CREATE TABLE IF NOT EXISTS `users` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `email` varchar(100) NOT NULL,
            `password` varchar(255) NOT NULL,
            `date` date NOT NULL,
            `FirstName` varchar(30) NOT NULL,
            `LastName` varchar(30) NOT NULL,
            `role` varchar(20) NOT NULL,
            PRIMARY KEY (`ID`),
            KEY `email` (`email`),
            KEY `FirstName` (`FirstName`),
            KEY `LastName` (`LastName`),
            KEY `date` (`date`)
        )
        ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        
        
        ";
        $this->query($query);
    }
}

?>
