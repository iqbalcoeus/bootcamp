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

function addFriend(){

  $friend=readline("Enter the Name of Friend: ");
  if( $GLOBALS['user']->addFriend($friend)){
    echo "\n" . $friend ." Added to your Friend List!";

  }
  else{
    echo "\nSorry! ". $friend ."  can not be added to yuor friend list!";

  }

}

function ViewUser(){

  $user=$GLOBALS['user']->viewProfile();

  echo "\nProfile Info\n";
  echo "*****************\n";
   echo "Name : ". $user["fullName"] ."\n";
    echo "Cover Photo: ".$user["coverPhoto"] ."\n";
    echo "Gender: ". $user["gender"] ."\n";
    echo "Email Id : ".$user["email"] ."\n";
    echo "Address : " .$user["address"] ."\n";
    echo "About Me: ".$user["about"] ."\n";
    echo "Date Of Birth : ".$user["DOB"] ."\n\n";
    echo "****************\n\n";


}


function changeInfo(){


      echo "\t\tEnter Updated Info\n";
       echo "*********************************\n";
       $fullName=readline("Enter fullname:");
       $coverPhoto=readline("Update Cover Photo: ");
        $email=readline("Email Address: ");
       $address=readline("Enter Address");
       $about=readline("About ME: ");
        $gender=readline("Gender: ");
       $DOB=readline("Date OF Birth : ");
        $arr=array("fullName"=>$fullName,
        
                  "coverPhoto"=>$coverPhoto,
                "email"=>$email,
                "address"=>$address,
                "about"=>$about,
                "gender" =>$gender,
             "DOB" =>$DOB );
        if(  $GLOBALS['user']->changeInfo($arr)){

          echo "Info Has been updated\n\n";
        }
        else
          echo "Could not be saved !";


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

 function MyFriendList(){

    $frind=$GLOBALS['user']->ListOfFriends();

    for($i=0;$i< count($frind); $i++){

      echo $frind[$i] ."\n";
    }

  }


$myPhoto=new Photo();
do{
  echo "**********Main Menu**********\n";
  echo "1.Login \n";
  echo "2.Signup \n";
  echo "any other key for Exit\n";
  $input=readline("Enter your choice:");

  $obj= $GLOBALS['user']  = new User();
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
    MyFriendList();
    break;
  case 2:
    ViewUser();
    break;
  case 3:
    changeInfo();
    break;
  case 4:
    SharePost($myPhoto);
    break;
  case 5:
    ShowPost($myPhoto);
    break;
  case 6:
    addFriend();
    break;
  default:
    exit(0);   

  } 

}
?>
