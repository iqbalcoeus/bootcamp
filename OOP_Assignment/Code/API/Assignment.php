<?php
include_once("User.php");
include_once("Post.php");
include_once("Photo.php");
include_once("DBHandler.php");

$GLOBALS['DB']=new DbHandler();



function SharePost($obj){

  while(true) {
    echo "\n\t Share Post Menu\n";
    echo "**************************\n";
    echo "1.Share Photo\n";
    echo "any key for Exit\n";
    $input=readline("enter your choice:  ");

    switch ($input){

    case 1:
      $obj->Share();
      break;
    default:
      return; 

    }

  }
}

function ShowPost($obj){

  while(true) {
    echo "\n\t Show Post Menu\n";
    echo "**************************\n";
    echo "1.Show Photo\n";
    echo "any key for Exit\n";
    $input=readline("enter your choice:  ");

    switch ($input){

    case 1:
      // $obj=new Photo();
      $obj->Show();
      break;
    default:
      return; 

    }

  }
}


function MyLogin(){

  $login=new User();

  $name=readline("Enter UserName : ");
  $paswd=readline("Enter Password:  ");

  return  $login->Login($name,$paswd);

}

function MySignup(){

  $signup=new User();
  $Uid=readline("choose user id:");
  $password=readline("choose Password");
  $DOB=readline("Your Date Of Birth:");
  $gender=readline("Gender:");
  $fullName=readline("Enter your Full name:");
  $email=readline("Email address:");
  if( $signup->Signup($Uid,$password,$DOB,$gender,$fullName,$email)){

    echo "\nCongratulations ! signed up  successfully \n\n";

  }
  else
    echo "\nUser name Already exit choose an other and try again!\n\n";


}

$u1=new User();
$u1->Uid="abc";
$u1->pasword="123";
$u1->fullName="iqbal";
$u2=new User();
$u2->Uid="xyz";
$u2->pasword="789";
$u2->fullName="zeeshan";

$GLOBALS['DB']->DBIntializer($u1,$u2);


$myPhoto=new Photo();
do{
  echo "**********Main Menu**********\n";
  echo "1.Login \n";
  echo "2.Signup \n";
  echo "any other key for Exit\n";
  $input=readline("Enter your choice:");

  $obj  = new User();
  $f=0;


  switch ($input){

  case 1:
    if(MyLogin()){

      echo "Wellcome ! Successfully Login !\n\n ";

      $f=1;
    }
    else{
      $f=0;

      echo "Incorrect Info ! Please Try again !\n\n";
    }
    break;
  case 2:

    MySignup();
    break;
  default :
    exit(0);    

  }
}while($f==0);

while(true){

  $input=0;
  echo "\n\n\n\n\n\n**********Choose From below menu **********\n\n";
  echo "1. View Friends \n";
  echo "2. View Profile \n";
  echo "3. Set Profile Info \n";
  echo "4.To Share Post\n";
  echo "5.To Show Post\n";
  echo "6. To Add Friend\n";
  echo "any other key.Exit\n\n";
  echo "*******************************************\n\n";
  $input=readline("Enter your choice :");


  switch ($input){
  case 1:
    $obj->FriendList();
    break;
  case 2:
    $obj->viewProfile();
    break;
  case 3:
    $obj->changeInfo();
    break;
  case 4:
    SharePost($myPhoto);
    break;
  case 5:
    ShowPost($myPhoto);
    break;
  case 6:
    $obj->addFriend();
    break;
  default:
    exit(0);   

  } 

}
?>
