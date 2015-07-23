<?php

$GLOBALS['DB']=new DbHandler();
class User{
  var $Uid="abc";
  var $password="123";
  var $about="Default user info";
  var $address="coues solutions gmbh pvt ltd";
  var $DOB="01/01/1994";
  var $gender="male";
  var $email="abc@coeus-solutions.de";
  var $fullName="ABC_Coues";
  var $coverPhoto="/pictures/cv.png";
  var $friendList=array();

  function __construct  (){
    $this->friendList=array ("iqbal","Zeeshan","Shameer"); 
    echo " \n\n\n";
 }

  function Login($uname,$paswd){
  
    if($uname==$this->Uid && $paswd==$this->password){
      
      echo "successfully Login ! Wellcome\n\n";
    }
    else
    {
      echo "Incorrect Info Try Again!\n";
      exit(0);
    }
  
  }

  function Signup(){
  
    $this->Uid=readline("choose user id:");
    $this->password=readline("choose Password");
    $this->DOB=readline("Your Date Of Birth:");
    $this->gender=readline("Gender:");
    $this->fullName=readline("Enter your Full name:");
    $this->email=readline("Email address:");
    //$this->address = readline("Enter your Address: ");
    //$this->about=readline("About Me: ");
    //$this->coverPhoto=readline("choose your cover photo:");
    
    $GLOBALS['DB']->addUser($this);
    echo "\n"; 
    echo "Signup successfully !\n\n";
  
  }

  function addFriend(){
  
    $name=readline("Enter friend Name :");
    $this->friendList[]=$name;

    echo $name . "  Added to Your Friend List\n\n";
  
  
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

class DbHandler{

      var $arr1=array();
      var $arr2=array();
      
      function addUser($user){
        
        $this->arr1[]=$user;
      
      }

      function addPhoto($photo){
      
        $this->arr2[]=$photo;
      }

}

class Post{

  var $pid=0;
  var $title="My Post";
  var $description="nice Post";
  var $privacy="public";

  function __construct(){
  
    
  }
  function Share(){
   
    $this->title=readline("Enter title For photo");
    $this->description=readline("Enter Description Of Photo: ");
    $privacy=readline("Privacy for Photo : ");
   // echo "Post has been shared\n\n";

  }

  function Show (){
  
   // echo "This is your Requested Post\n\n";
    echo "Title :".$this->title . "\n";
    echo "Description : " .$this->description ."\n";
    echo "Privacy : ". $this->privacy . "\n";
  }

  function Likes(){
  
  
  }

  function Comments(){
  
  
  
  }

}

class Links extends Post{

  var $url="default url";

  function __construct(){
  
  }

  function Share(){
    
    echo "Url :". $this->url ."\n";
    echo "Your Link Has been shared \n\n";
  }
  function Show(){

    echo "Url :" .$this->url ."\n";
    echo "Link is being show!\n\n";
  
  }

}

class Photo extends Post{

  var $size=0;
  var $format=".png";

  function __construct(){
  
  
  }

  function addToAlbum (){
    $album =readline("enter name of album: ");
    echo "added to ". $album ."\n\n";
  }
  function Show(){
  
    echo "\n Here is your Requested Photo!\n\n";
    parent :: Show();
    echo "size: " .$this->size ."\n";
    echo "Format : " .$this->format . "\n";
  
  }

  function Share(){


    parent::Share(); 
    $this->size=readline("Size of photo : ");
    $this->format=readline("Image Format :");
    //$title=readline("Enter title For photo");
    //$des=readline("Enter Description Of Photo: ");
  //  $privacy=readline("Privacy for Photo : 
     echo "your Photo has been shared\n\n";

    // echo "size: " .$this->size ."\n";
    // echo "Format : " .$this->format . "\n\n";

  }


}

class Video extends Post {

  var $length=10;

  function __construct (){
  
  }
  
  function Show(){
    echo "Playing Your video!\n\n";
    echo "Video Length : " .$this->length ."\n";
  
  }

  function Share(){

    echo "Video Length : ".$this->length ."\n";

    echo "\n\n*******Your Video has been shared************\n\n";
  }


}

class Comment{

  var $Id=0;
  var $count=0;
  var $content;


  function __construct(){
  
    $content=new Post();
  }
  
  function showComment(){
  
  echo "comment:". $this->content;

  }
  
  function getCount(){

    return $this->count;
  }

}

class Like {

  var $id=0;
  var $count=0;

  function __construct (){
  
  }
  
  function getCount(){
    
    return $this->count;
  }

}

function SharePost($obj){

 while(true) {
      echo "\n\t Share Post Menu\n";
      echo "**************************\n";
      echo "1.Share Photo\n";
       echo "2.share Video\n";
      echo "3.share Link \n";
      echo "any key for Exit\n";
      $input=readline("enter your choice:  ");

      switch ($input){
    
      case 1:
       // $obj=new Photo();
        $obj->Share();
        break;
      case 2:
        $obj=new Video();
        $obj->Share();
        break;
      case 3:
        $obj=new Links();
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
       echo "2.Show Video\n";
      echo "3.Show Link \n";
      echo "any key for Exit\n";
      $input=readline("enter your choice:  ");

      switch ($input){
    
      case 1:
       // $obj=new Photo();
        $obj->Show();
        break;
      case 2:
        $obj=new Video();
        $obj->Show();
        break;
      case 3:
        $obj=new Links();
        $obj->Show();
        break;
      default:
        return; 

     }

  }
}


$myPhoto=new Photo();
echo "**********Main Menu**********\n";
echo "1.Login \n";
echo "2.Signup \n";
echo "any other key for Exit\n";
$input=readline("Enter your choice:");

$obj  = new User();

switch ($input){

  case 1:
    $uname=readline("Enter user name:  ");
    $paswd=readline("Enter Password :  ");
    $obj->Login($uname,$paswd);
    break;
  case 2:

    $obj->Signup();
    break;
  default :
          exit(0);    


}



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
