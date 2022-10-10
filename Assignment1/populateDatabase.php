<?php
require 'Connection.php';
require './data.php';

createTable($conn);
populateData($conn,$data);



function createTable($conn)
{
  $sql = "CREATE TABLE `countries` ( 
    `id` INT(10) NOT NULL AUTO_INCREMENT , 
  `name` VARCHAR(50) NOT NULL , 
  `continent` VARCHAR(20) NOT NULL , 
  `region` VARCHAR(20) NOT NULL , 
  `population` INT(50) NOT NULL , 
  `flagurl` VARCHAR(200) NOT NULL , 
  PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    
    try{
        $conn->query($sql);
        echo "Table MyGuests created successfully";
    } 
    catch(Exception $ex){
      echo "Error creating table: " . $ex->getMessage();
    }

}

function populateData($conn,$data){
    
    //$sql = "INSERT INTO countries (name,continent,region,population,flagurl)
   // VALUES ('{$data['name']}', '{$data['continent']}', '{$data['region']}',{data['population']},'{$data['flagUrl']})'";
    
    foreach($data as $key=>$value){
       $sql = "INSERT INTO countries (name,continent,region,population,flagurl)
        VALUES (\"{$value['name']}\", \"{$value['continent']}\", \"{$value['region']}\"
        ,{$value['population']}
        ,\"{$value['flagUrl']}\")";
        $conn->query($sql);
  
        }

}
