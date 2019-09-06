<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 8/21/2019
 * Time: 10:15 AM
 */



/**
 * 1--global
 */

$x=10;
echo '<br>biến x bên ngoài' .$x;

/**
 * 2--local
 */
function test(){
    $x=10;
    echo '<br> test bên trong hàm'.$x;
}
test();

/**
 * 3--static
 */
function tetst_static(){
    static $x=5;
    echo '<br>biến static'. $x;
    $x++;
}
tetst_static();
tetst_static();
tetst_static();
tetst_static();