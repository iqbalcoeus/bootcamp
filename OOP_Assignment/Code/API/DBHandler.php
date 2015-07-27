<?php
include_once("User.php");

class DbHandler{

      var $arr1=array();
      var $arr2=array();

      function __construct(){ 
      //  $this->arr1['abc']="123";
       // $this->arr1['xyz']="786";
      
      
      }

      function DBIntializer($u1,$u2){

        $this->arr1[]= $u1;
        $this->arr1[]= $u2;

        var_dump($this->arr1);
      
      }

      function LoginValidation($id,$pswd){

        foreach($this->arr1 as $user){


          if($user->Uid==$id && $user->pasword==$pswd){
            return true;
        
        
          }
        }

        return false;
      
      }

      function checkUid($id){
     // $ids = array_map(create_function('$o', 'return $o->id;'), $this->arr1);
        foreach ($this->arr1 as $user){
        
          if($user->Uid==$id)
            return false;
        
        
        }
      
      return true;
      
      }
}
?>
