<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
$T=(int)fgets($_fp);
while($T>=1 && $T<=100){
    
    $std=split(' ',fgets($_fp));
    $n=(int)$std[0];
    $k=(int)$std[1];
    if($n>=1 && $n<=1000 && $k>=1 && $k<=$n){
    $arr=split(' ',fgets($_fp));
    $c=0;
    for($i=0;$i<$n;$i++){
        if($arr[$i]>=-100 && $arr[$i]<=100){
        if($arr[$i]<0)
            $c++;
        }
        else
            break;
    }
    if(($n-$c)<$k)
        print("YES\n");
    else
        print("NO\n");
    $T--;
    }
}

?>
