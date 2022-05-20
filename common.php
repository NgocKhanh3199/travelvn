<?php
    if(isset($_SESSION['lang']))
    {
        $lang = $_SESSION['lang'];
    }
    else
    {
        $_SESSION['lang'] = 'vie';
        $lang = 'vie';
    }

    switch($lang)
    {
        case 'eng':
            $lang_file = 'eng.php';
            break;
        case 'vie':
            $lang_file = 'vie.php';
            break;
        default:
            $lang_file = 'vie.php';
    }

    include_once "./public/language/" . $lang_file;
?>