<?php
    if(isset($_GET['lang']))
    {
        $lang = $_GET['lang'];
    }
    else
    {
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