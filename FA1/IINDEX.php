<?php
   class Person{
      private $name;
      private $lname;
      private $mname;
      public function setName($name){
         $this->name = $name;
      }
      public function setLname($lname){
         $this->lname = $lname;
      }
      public function setMname($mname){
         $this->mname = $mname;
      }
      public function getName(){
         return '2609'. $this->name;
      }
      public function getLname(){
         return '2609'. $this->lname;
      }
      public function getMname(){
         return '2609'. $this->mname;
      }
   }
   $person = new Person();
   $person->setName('Rafael');
    $person->setLname('Fernandez');
     $person->setMname('Sta Maria');
   $name = $person->getName();
   $lname = $person->getLname();
    $mname = $person->getMname();
   
   echo $name;
 
   echo $lname;

   echo $mname;
?>