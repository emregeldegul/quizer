<?php
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case 'list':
                require_once(PATH."/modules/user/list.php");
                break;
            case 'user':
                require_once(PATH."/modules/user/user.php");
                break;
            case 'deActiveUsers':
                require_once(PATH."/modules/user/deActiveUsers.php");
                break;
            case 'create':
                require_once(PATH."/modules/user/create.php");
                break;
            default:
                header("Location: ".URL."/?mod=404");
                break;
        }
    }else {
        header("Location: ".URL."/?mod=main");
    }
?>
