<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 8/21/2019
 * Time: 1:01 PM
 */
/**
 * f(n)
 * n=0 =>f(0)=0
 * n=1 =>f(1)=1
 * n>1 =>f(n)=f(n-1)+ f(n-2)
 *
 * 10 số fibonacci đầu tiên
 * f(0) => 0
 * f(1) => 1
 * f(2) => 1
 * f(3) => 2
 * f(4) => 3
 * f(5) => 5
 * f(6) => 8
 * f(7) => 13
 * f(8) => 21
 * f(9) => 34
 * f(10) => 55

 */

function f($n){
    if ($n==0){
        return 0;
    }elseif ($n==1){
        return 1;
    }else{
        return f($n-1) + f($n-2);

    }

}
$p = array();
for ($i=0;$i<=15;$i++){
    $f = f($i);
    $p[]=$f;
    echo "<br> tính f($i) : ". f($i);
}
echo '<br>Dãy số fibo:'.implode(',',$p);