<?php
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case 'edit':
                require_once(PATH."/modules/profile/edit.php");
                break;
            case 'password':
                require_once(PATH."/modules/profile/password.php");
                break;
            default:
                header("Location: ".URL."/?mod=404");
                break;
        }
    }else {
        header("Location: ".URL."/?mod=main");
    }
?>
