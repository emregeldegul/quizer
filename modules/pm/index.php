<?php
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case 'send':
                require_once(PATH."/modules/pm/send.php");
                break;
            case 'list':
                require_once(PATH."/modules/pm/list.php");
                break;
            case 'read':
                require_once(PATH."/modules/pm/read.php");
                break;
            default:
                header("Location: ".URL."/?mod=404");
                break;
        }
    }else {
        header("Location: ".URL."/?mod=main");
    }
?>
