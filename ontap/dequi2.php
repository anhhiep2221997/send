<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 8/21/2019
 * Time: 1:53 PM
 */
function printstar($n){
    for ($i=$n;$i>0;$i--) {
        echo "<br>" . str_repeat('*', $i);
    }

}
//printstar(100);

function printstardequy($n,$i){
    echo "<br>".str_repeat('*',$i);

    if ($i>0) {
        $i--;
        printstardequy($n, $i);
    }

}
printstardequy(100,100);