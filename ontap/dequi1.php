<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 8/21/2019
 * Time: 1:53 PM
 */
function printstar($n){
    for ($i=1;$i<=$n;$i++) {
        echo "<br>dòng $i:" . str_repeat('*', $i);
    }

}
//printstar(100);

function printstardequy($n,$i){
    echo "<br>Dòng $i :".str_repeat('*',$i);

    if ($i<=($n-1)) {
        $i++;
        printstardequy($n, $i);
    }

}
printstardequy(100,1);