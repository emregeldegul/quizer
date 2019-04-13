<?php
    session_start();
    ob_start();
    date_default_timezone_set('Europe/Istanbul');

    // MySQL's Info
    $pbserver = "localhost";
    $username = "root";
    $password = "";
    $database = "yeg_quizer";

    // Connect To MySQL
    $connect = mysqli_connect($pbserver, $username, $password, $database);

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    mysqli_query($connect, "SET NAMES utf8");
    mysqli_query($connect, "SET CHARACTER SET utf8");
    mysqli_query($connect, "SET COLLATION_CONNECTION='utf8_general_ci'");

    // Get Site's Info
    $settingQuery = mysqli_query($connect, "SELECT * FROM quizer_site LIMIT 1");
    $setting = mysqli_fetch_array($settingQuery);

    // Pin Valuess
    define("URL", $setting["site_url"]);
    define("NAME", $setting["site_name"]);
    define("DESC", $setting["site_desc"]);
    define("STATUS", $setting["site_status"]);
    define("MEMB", $setting["site_memb"]);
    define("NOTF", $setting["site_notf"]);
    define("PATH", getcwd());
?>
