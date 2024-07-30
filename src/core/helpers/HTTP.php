<?php
namespace core\helpers;

class HTTP
{
    static function redirect($path, $query = "")
    {
        $url = "http://" . $_SERVER['HTTP_HOST'] . $path;
        if ($query)
            $url .= "?$query";

        header("Location: $url");
        exit();
    }
}