<?php
include_once("Post.php");
include_once ("User.php");
include_once("DBHandler.php");

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
      echo "your Photo has been shared\n\n";
                  
     } 
  }

?>
