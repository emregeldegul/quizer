<?php
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case 'list':
                if ($_SESSION["user"]["status"] != 3) {
                    require_once(PATH."/modules/exam/olist.php");
                }else {
                    require_once(PATH."/modules/exam/list.php");
                }
                break;
            case 'quiz':
                require_once(PATH."/modules/exam/quiz.php");
                break;
            case 'exams':
                require_once(PATH."/modules/exam/exams.php");
                break;
            case 'edit':
                require_once(PATH."/modules/exam/edit.php");
                break;
            case 'answers':
                require_once(PATH."/modules/exam/answers.php");
                break;
            case 'answer':
                require_once(PATH."/modules/exam/answer.php");
                break;
            case 'create':
                require_once(PATH."/modules/exam/create.php");
                break;
            case 'myAnswers':
                require_once(PATH."/modules/exam/myanswers.php");
                break;
            default:
                header("Location: ".URL."/?mod=404");
                break;
        }
    }else {
        header("Location: ".URL."/?mod=main");
    }
?>
