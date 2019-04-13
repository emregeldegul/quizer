<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Şifre Değiştir</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-6">
                <?php
                    $userID = $_SESSION["user"]["id"];

                    if (isset($_POST["update"])){
                        $oldPassword = md5(post("oldpassword"));
                        $newPassword = md5(post("newpassword"));
                        $reNewPassword = md5(post("renewpassword"));

                        if ($newPassword != $reNewPassword) {
                            alert("Girdiğiniz Şifreleriniz Uyumuşmuyor", $type = "danger");
                        }else {
                            $passCheck = mysqli_query($connect, "SELECT user_password FROM quizer_users WHERE user_id = $userID LIMIT 1");
                            $passCheck = mysqli_fetch_array($passCheck);
                            if ($oldPassword != $passCheck["user_password"]) {
                                alert("Mevcut Şifrenizi Yanlış Girdiniz", $type="danger");
                            }else {
                                if (mysqli_query($connect, "UPDATE quizer_users SET user_password = '$newPassword' WHERE user_id = $userID")) {
                                    alert("Şifreniz Güncellendi");
                                }else {
                                    alert("Şifreniz Güncellenemdi: ".mysqli_error($connect));
                                }
                            }
                        }
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <form role="form" action="<?php echo URL."/?mod=profile&op=password"; ?>" method="post">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Mavcut Şifreniz</label>
                        <input class="form-control" type="password" name="oldpassword" required>
                    </div>
                    <div class="form-group">
                        <label>Yeni Şifreniz</label>
                        <input class="form-control" type="password" name="newpassword" required>
                    </div>
                    <div class="form-group">
                        <label>Yeni Şifre Tekrar</label>
                        <input class="form-control" type="password" name="renewpassword" required>
                    </div>
                    <div class="form-group" style="margin-top: 10px; float:right;">
                        <button type="submit" name="update" class="btn btn-default">Şifreyi Yenile</button>
                        <button type="reset" class="btn btn-default">Formu Temizle</button>
                    </div>
                </div>
            </form>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
