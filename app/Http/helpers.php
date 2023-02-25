<?php


function calculate_cgpa($cgpa)
{
    if ($cgpa<=10) {
        return "you are fail";
    } else {
        return "you are passed but not with goof marks";
    }
}