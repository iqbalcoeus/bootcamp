<?php
$_fp = fopen("input.txt", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
$hour=array();
$mins=array();
$mins=array("", "one", "two", "three", "four", "five", "six","seven", "eight", "nine","ten",
        "eleven","twelve","thirteen","fourteen","fifteen","sixteen","seventeen","eighteen","nineteen",
        "twenty","twenty one", "twenty two", "twenty three", "twenty four", "twenty five",
        "twenty six","twenty seven","twenty eight", "twenty nine");

$hour=array("", "one", "two", "three", "four", "five", "six","seven", "eight", "nine","ten",
        "eleven","twelve");

$h=(int)fgets($_fp);
$m=(int)fgets($_fp);
$hr=$hour[$h];
$min=$mins[$m%30 +1];
$opt="";
if($m==0)
    $opt=$hr ." o' clock";
else if($m==15)
    $opt="quarter past ". $hr;
else if ($m==30)
    $opt="half past " . $hr;
else if($m==45)
    $opt="quarter to " . $hour[$h+1];
else if ($m>30){
    $opt=$mins[60-$m] . " minutes to " . $hour[($h+1)%12] ; 
    if($m==59)
        $opt=$mins[60-$m] . " minute to " . $hour[($h+1)%12];
    
}
else if($m<30){
    $opt=$mins[$m] . " minutes past " . $hour[$h];
    if($m==1)
        $opt=$mins[$m] . " minute past " . $hour[$h];
}
print $opt;


?>
