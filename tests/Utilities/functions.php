<?php

if(!function_exists('create')){
    function create($class, $data = [], $count = null){
        return factory($class, $count)->create($data);
    }
}

if(!function_exists('make')){
    function make($class, $data = [], $count = null){
        return factory($class, $count)->make($data);
    }
}