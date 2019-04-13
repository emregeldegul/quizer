<?php
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case 'edit':
                require_once(PATH."/modules/admin/edit.php");
                break;
            default:
                header("Location: ".URL."/?mod=404");
                break;
        }
    }else {
        header("Location: ".URL."/?mod=main");
    }
?>
