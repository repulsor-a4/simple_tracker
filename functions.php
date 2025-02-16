<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function cookify($value)
{
    $string = str_replace(".", "_", $value);
    return $string;
}

function getTrackedPageOnly($value)
{
    $string = explode("?page=", $value);
    return $string[1] ??= 'index.php';
}