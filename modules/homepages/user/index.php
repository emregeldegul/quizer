<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo URL."/?mod=main"; ?>"><?php echo NAME; ?> (<?php echo $_SESSION["user"]["name"]; ?>)</a>
        </div>
        <!-- /.navbar-header -->
        <?php require_once(PATH."/modules/homepages/user/asset/navbar.php"); ?>

        <?php require_once(PATH."/modules/homepages/user/asset/sidebar.php"); ?>
    </nav>
    <!-- Page Content -->
    <?php
        if (!isset($_GET["mod"])) {
            header("Location: ".URL."/?mod=main");
        }elseif (STATUS == 0 and $_SESSION["user"]["status"] != 3) {
            if ($_GET["mod"] == "logout") {
                session_destroy();
                header("Location: ".URL."/?mod=login");
            }
            require_once(PATH."/modules/homepages/user/close.php");
        }else {
            switch ($_GET["mod"]) {
                case 'logout':
                    session_destroy();
                    header("Location: ".URL."/?mod=login");
                    break;
                case 'main':
                    require_once(PATH."/modules/homepages/user/home.php");
                    break;
                case '404':
                    require_once(PATH."/modules/homepages/user/404.php");
                    break;
                case 'profile':
                    require_once(PATH."/modules/profile/index.php");
                    break;
                case 'exam':
                    require_once(PATH."/modules/exam/index.php");
                    break;
                case 'pm':
                    require_once(PATH."/modules/pm/index.php");
                    break;
                case 'user':
                    require_once(PATH."/modules/user/index.php");
                    break;
                case 'admin':
                    require_once(PATH."/modules/admin/index.php");
                    break;
                default:
                    header("Location: ".URL."/?mod=404");
                    break;
            }
        }
    ?>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
