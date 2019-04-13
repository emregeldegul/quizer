<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Profili Düzenle</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <form role="form" action="<?php echo URL."/?mod=profile&op=edit"; ?>" method="post">
                <div class="col-lg-12">
                    <?php
                        $userID = $_SESSION["user"]["id"];

                        if (isset($_POST["update"])) {
                            $name = post("name");
                            $surname = post("surname");
                            $password = md5(post("password"));
                            $mail = post("mail");
                            $schoolNo = post("schoolNo");

                            $passCheck = mysqli_query($connect, "SELECT user_password FROM quizer_users WHERE user_id = $userID LIMIT 1");
                            $passCheck = mysqli_fetch_array($passCheck);
                            if ($password == $passCheck["user_password"]) {
                                $userUpdateSQL = "UPDATE quizer_users
                                SET user_mail = '$mail', user_password = '$password', user_name = '$name', user_surname = '$surname', user_schoolNo = '$schoolNo'
                                WHERE user_id = $userID";

                                if (mysqli_query($connect, $userUpdateSQL)) {
                                    alert("Güncelleme İşlemi Başarılı");
                                }else {
                                    alert("Güncelleme İşlemi Başarısız: ".mysqli_error($connect), $type="danger");
                                }
                            }else {
                                alert("Şifreniz, sistemde ki şifreniz ile uyuşmuyor", $type="danger");
                            }
                        }

                        $userSQL = "SELECT * FROM quizer_users WHERE user_id = $userID LIMIT 1";
                        $userQuery = mysqli_query($connect, $userSQL);
                        $user = mysqli_fetch_array($userQuery);
                    ?>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>İsim</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $user['user_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Soyisim</label>
                        <input class="form-control" type="text" name="surname" value="<?php echo $user['user_surname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Şifre</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Mail</label>
                        <input class="form-control" type="mail" name="mail" value="<?php echo $user['user_mail']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Okul No</label>
                        <input class="form-control"  type="schoolNo" name="schoolNo" value="<?php echo $user['user_schoolNo']; ?>">
                        <p class="help-block">Okul numaranız <b>xx-xxx-xxx</b> formatında olmalıdır.</p>
                    </div>
                    <div class="form-group" style="margin-top: 10px; float:right;">
                        <button type="submit" class="btn btn-default" name="update">Bilgileri Güncelle</button>
                    </div>
                </div>
            </form>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
