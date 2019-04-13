<body>
    <div class="container">
        <?php
            if ($_GET) {
                if (isset($_GET["mod"])) {
                    if ($_GET["mod"] == "login") {
                        require_once(PATH."/modules/homepages/guest/login.php");
                    }elseif ($_GET["mod"] == "assent") {
                        require_once(PATH."/modules/homepages/guest/assent.php");
                    }elseif ($_GET["mod"] == "signup") {
                        require_once(PATH."/modules/homepages/guest/signup.php");
                    }elseif ($_GET["mod"] == "notSign") {
                        require_once(PATH."/modules/homepages/guest/notSign.php");
                    }else {
                        header("Location: ".URL."?mod=login");
                    }
                }else {
                    header("Location: ".URL."?mod=login");
                }
            }else {
                header("Location: ".URL."?mod=login");
            }
        ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <center>
                    <img src="https://emregeldegul.net/wp-content/uploads/2018/01/CoderLabLogo-300x113.png" alt="" width="300" height="100"><br>
                    <a href="https://emregeldegul.net">CODERLAB Bilişim Hizmetleri</a><br>
                    <a href="https://emregeldegul.net">Yunus Emre Geldegül</a>
                </center>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>
