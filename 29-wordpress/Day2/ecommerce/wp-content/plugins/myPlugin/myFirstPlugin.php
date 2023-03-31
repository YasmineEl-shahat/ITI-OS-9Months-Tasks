<?php 
/*
    Plugin Name: My First Plugin 
    Description: plugin for check words
    Author: ITI - OS track
*/ 

// capitalize the title of each post
add_action("the_title", "capitalized");

function capitalized($content){
    return $content=ucfirst($content);
}

//  make any numbers in the post to be alphabet  such as 1 --> one, 5 --> five
add_action("the_content", "checkNumbers");

function checkNumbers($content){
    $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    $arr2 = ["one", "second", "three", "four", "five", "six", "seven", "eight", "nine"];
    return str_replace($arr, $arr2, $content);
}