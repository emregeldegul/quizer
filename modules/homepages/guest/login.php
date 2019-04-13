<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo NAME; ?> | Giriş</h3>
            </div>
            <div class="panel-body">
                <?php
                    if (isset($_POST["login"])) {
                        $email = post("email", $slash = True);
                        $password = md5(post("password", $slash = True));

                        $loginSQL = "SELECT *
                                     FROM quizer_users
                                     WHERE user_mail = '$email' and user_password = '$password' and user_status != 0
                                     LIMIT 1";
                        $loginQuery = mysqli_query($connect, $loginSQL);

                        if (!mysqli_num_rows($loginQuery)) {
                            alert("Kullanıcı Adı ve Şifre Yanlış!", $type = "danger");
                        }else {
                            $login = mysqli_fetch_array($loginQuery);
                            if ($login["user_status"] == 1) {
                                alert("Üyelik Onaysız", $type = "warning");
                            }else {
                                $_SESSION["user"] = array('id' => $login["user_id"],
                                                          'status' => $login["user_status"],
                                                          'name' => $login["user_name"],
                                                          'surname' => $login["user_surname"]);
                                header("Location: ".URL."/?mod=main");
                            }
                        }
                    }
                ?>
                <form action="<?php echo URL."/?mod=login"; ?>" method="POST">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-Posta" name="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Şifre" name="password" type="password" value="">
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <input type="submit" name="login" value="Giriş Yap" class="btn btn-lg btn-success btn-block">
                        <br>
                        <center><a href="<?php echo URL."?mod=assent"; ?>">Üye Ol</a></center>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
