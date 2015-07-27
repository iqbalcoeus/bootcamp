<?php
include_once("User.php");
include_once("DBHandler.php");

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
}
 function Show (){
       echo "Title :".$this->title . "\n";
       echo "Description : " .$this->description ."\n";
       echo "Privacy : ". $this->privacy . "\n";
    }
     
}

?>
