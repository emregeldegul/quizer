<?php
    require_once("config.php");

    function post($param, $slash = false){
        if($slash == false){
            $result = strip_tags(trim($_POST[$param]));
        }elseif( $slash == true){
            $result = strip_tags(trim(addslashes($_POST[$param])));
        }
        return $result;
    }

    function postCode($param, $slash = false){
        if($slash == false){
            $result = strip_tags(trim($_POST[$param]));
        }elseif( $slash == true){
            $result = trim(addslashes($_POST[$param]));
        }
        return $result;
    }

    function get($param, $slash = false){
        if($slash == false){
            $result = trim(strip_tags($_GET[$param]));
        }elseif( $slash == true){
            $result = addslashes(trim(strip_tags($_GET[$param])));
        }
        return $result;
    }

    function alert($message, $type = "success"){
        echo '<div class="alert alert-'.$type.' alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> '.$message.'
                </div>';
    }
?>
