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

  function __construct  (){
    $this->friendList=array ("iqbal","Zeeshan","Shameer"); 

    echo " \n\n\n";
  }


  function Login($uname,$paswd){


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

  function addFriend(){

    $name=readline("Enter friend Name :");
    $this->friendList[]=$name;
  }

  function FriendList(){
    echo "Friend List \n";
    echo "*********************************\n\n"; 
    for($x=0;$x< count($this->friendList);$x++){

      print $this->friendList[$x]. "\n";

    }
    echo "*********************************\n\n";
  }

  function viewProfile(){

    echo "Profile \n";
    echo "*******************************\n\n";
    echo "Name : ". $this->fullName ."\n";
    echo "Cover Photo: ".$this->coverPhoto ."\n";
    echo "Gender: ". $this->gender ."\n";
    echo "Email Id : ".$this->email ."\n";
    echo "Address : " .$this->address ."\n";
    echo "About Me: ".$this->about ."\n";
    echo "Date Of Birth : ".$this->DOB ."\n\n";
    echo "********************************\n\n";
  }

  function changeInfo(){
    echo "\t\tEnter Updated Info\n";
    echo "*********************************\n";
    $this->fullName=readline("Enter fullname:");
    $this->coverPhoto=readline("Update Cover Photo: ");
    $this->email=readline("Email Address: ");
    $this->address=readline("Enter Address");
    $this->about=readline("About ME: ");

    echo "Info Has been updated\n\n";

  }



}

?>
