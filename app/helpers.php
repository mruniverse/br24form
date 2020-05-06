<?php


/** * Retorna o diretório das views */
function viewsPath() {
    return BASE_PATH . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
}

/**
 * Get all values from specific key in a multidimensional array
 *
 * @param $key string
 * @param $arr array
 * @return null|string|array
 */
function array_value_recursive($key, array $arr){
    $val = array();
    array_walk_recursive($arr, function($v, $k) use($key, &$val){
        if($k == $key) array_push($val, $v);
    });
    return count($val) > 1 ? $val : array_pop($val);
}
