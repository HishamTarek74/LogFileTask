<?php

/**
 *
 * Basic authentication function to check user and password
 * from config array
 *
 * @return void
 *
 */
function basicAuth()
{
    $config = include_once('config/app.php');
    $AUTH_USER = $config['user_name'];
    $AUTH_PASS = $config['password'];

    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
    $is_not_authenticated = (
        !$has_supplied_credentials ||
        $_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
        $_SERVER['PHP_AUTH_PW'] != $AUTH_PASS
    );
    if ($is_not_authenticated) {
        header('HTTP/1.1 401 Authorization Required');
        header('WWW-Authenticate: Basic realm="Access denied"');
        exit;
    }
}