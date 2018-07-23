<?php
/**
 * Created by PhpStorm.
 * User: topalek
 * Date: 19.02.2018
 * Time: 11:26
 */

function clear($array){
    if (!is_array($array)){
        return false;
    }
    foreach ($array as $i=>$item) {
        if ($item =="#NULL!"){
            $array[$i] = '';
        }
    }
    return $array;
}