<?php
namespace core\helpers;

class HTTP
{
    // Redirect function to send the user to a different page
    static function redirect($path, $query = "")
    {
        // Build the base URL
        $url = "http://" . $_SERVER['HTTP_HOST'] . $path;

        // Append the query string if provided, and escape it for security
        if (!empty($query)) {
            $url .= "?" . htmlspecialchars($query);
        }

        // Perform the redirection and terminate the script
        header("Location: $url");
        exit();
    }
}