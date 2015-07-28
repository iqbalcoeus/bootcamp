<?php
include_once("User.php");

class DbHandler{

  var $userArr=array();
  var $arr2=array();
  var $friend=array();

  function __construct(){ 



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
  function profileInfo($id){

    foreach($this->userArr as $user){

      if($user->Uid == $id){

        $arr=array("fullName"=> $user->fullName,

          "coverPhoto"=> $user->coverPhoto,

          "gender" => $user->gender,
          "email"=> $user->email,
          "address"=>$user->address,
          "about" =>$user->about,
          "DOB"=>$user->DOB);
        return $arr;
      }

    }
    return false;
  }


  function saveProfile($user,$id){


    foreach($this->userArr as $arr){
    
      if($arr->Uid==$id){
      
      
        $arr->fullName=$user['fullName'];
        $arr->coverPhoto=$user['coverPhoto'];
        $arr->gender=$user['gender'];
        $arr->email=$user['email'];
        $arr->address=$user['address'];
        $arr->about=$user['about'];
        $arr->DOB=$user['DOB'];
        return true;
      
      }
    
    }
  return false;
  }

}
?>
