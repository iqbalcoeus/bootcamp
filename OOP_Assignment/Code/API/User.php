<?php

include_once("Assignment.php");
include_once("Post.php");
include_once("Photo.php");
include_once("DBHandler.php");
class User{
  var $Uid;
  var $pasword;
  var $about;
  var $address;
  var $DOB;
  var $gender;
  var $email;
  var $fullName;
  var $coverPhoto;
  var $friendList=array();



  function Login($uname,$paswd){

    $GLOBALS['id']=$uname;
    $f =$GLOBALS['DB']->LoginValidation($uname,$paswd);
    return $f;

  }

  function Signup($Uid,$password,$DOB,$gender,$fullName,$email){

    $this->Uid=$Uid;
    $this->pasword=$password;
    $this->DOB=$DOB;
    $this->gender=$gender;
    $this->fullName=$fullName;
    $this->email=$email;

    if( $GLOBALS['DB']->checkUid($Uid)){
      $GLOBALS['DB']->addUser($this);
      echo "\n"; 
      return true;
    }
    else
      return false;

  }

  function addFriend($friend){

   return  $GLOBALS['DB']->addFriend($friend);
  }

  function ListOfFriends(){
 
    return $GLOBALS['DB']->showFriends();
 
  }
  function viewProfile(){

      return $GLOBALS['DB']->profileInfo($GLOBALS['id']);
 }

  function changeInfo($user){
    
    

    return $GLOBALS['DB']->saveProfile($user,$GLOBALS['id']);
   
  }

}

?>
