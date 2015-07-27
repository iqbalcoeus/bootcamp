<?php
include_once("User.php");

class DbHandler{

      var $userArr=array();
      var $arr2=array();
      var $friend=array();

      function __construct(){ 
      //  $this->arr1['abc']="123";
       // $this->arr1['xyz']="786";
      
      
      }

      function DBIntializer($u1,$u2){

        $this->userArr[]= $u1;
        $this->userArr[]= $u2;
        $this->friend[]="iqbal";
        $this->friend[]="Hammad";
      
      }

      function LoginValidation($id,$pswd){

        foreach($this->userArr as $user){


          if($user->Uid==$id && $user->pasword==$pswd){
            return true;
        
          }
        }

        return false;
      
      }

      function checkUid($id){
        foreach ($this->userArr as $user){
        
          if($user->Uid==$id)
            return false;
        
        
        }
      
      return true;
      
      }

      function addUser($user){

        array_push($this->userArr, $user);

      }
      function addPhoto($photo){
                    
        array_push($this->arr2,$photo);
      }
      function addFriend($frind){
      
      return  array_push($this->friend,$frind);
      }
      function showFriends(){
      
      return $this->friend;
      }


}
?>
