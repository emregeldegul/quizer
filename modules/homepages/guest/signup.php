<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo NAME; ?> | Üyelik Paneli</h3>
            </div>
            <div class="panel-body">
                <?php
                    if (MEMB) {
                        if ($_POST) {
                            if (!isset($_POST["assent"])) {
                                if (isset($_POST["signup"])) {
                                    $name = post("name", $slash=True);
                                    $surname = post("surname", $slash=True);
                                    $schoolNo = post("schoolNo", $slash=True);
                                    $email = post("email", $slash=True);
                                    $password = md5(post("password", $slash=True));

                                    $userAdd = "INSERT INTO quizer_users (user_mail, user_password, user_name, user_surname, user_schoolNo) VALUES ('$email', '$password', '$name', '$surname', '$schoolNo')";

                                    if (mysqli_query($connect, $userAdd)) {
                                        alert("Üyelik Başarılı, Onay Bekleniyor");
                                    }else {
                                        alert("Mail yada Okul Numarası Zaten Kayıtlı" , $type="danger"); #.mysqli_error($connect)
                                    }
                                }else {
                                    header("Location: ".URL."/?mod=login");
                                }
                            }
                        }else {
                            header("Location: ".URL."/?mod=login");
                        }
                    }else {
                        header("Location: ".URL."/?mod=notSign");
                    }
                ?>
                <form action="<?php echo URL."/?mod=signup"; ?>" method="POST">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Öğrenci İsim" name="name" type="text" autofocus required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Öğrenci Soyisim" name="surname" type="text" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Öğrenci Okul No" name="schoolNo" type="text" required>
                            <p class="help-block">xx-xxx-xxx formatına olmasına dikkat ediniz.</p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Öğrenci Mail" name="email" type="email" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Öğrenci Şifre" name="password" type="password" required>
                        </div>
                        <input type="submit" name="signup" value="Üye Ol" class="btn btn-lg btn-success btn-block">
                        <br>
                        <center><a href="<?php echo URL."?mod=login"; ?>">Giriş Yap</a></center>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
