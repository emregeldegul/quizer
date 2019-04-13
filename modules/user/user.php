<?php
    if ($_SESSION["user"]["status"] != 3) {
        header("Location: ".URL."/?mod=404");
    }
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Profil Düzenle</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <form role="form" action="" method="post">
                <div class="col-lg-12">
                    <?php
                        $userID = get("id");

                        if (isset($_POST["update"])) {
                            if (!empty($_POST["password"])) {
                                $password = md5(post("password"));
                                $passwd = ", user_password = '$password'";
                            }else {
                                $passwd = "";
                            }
                            $name = post("name");
                            $surname = post("surname");
                            $mail = post("mail");
                            $schoolNo = post("schoolNo");
                            $note = post("note");
                            $statu = post("statu");

                            $updateSQL = "UPDATE quizer_users
                            SET user_name = '$name', user_surname = '$surname', user_mail = '$mail', user_schoolNo = '$schoolNo', user_note = '$note', user_status = '$statu' $passwd
                            WHERE user_id = $userID";
                            if (mysqli_query($connect, $updateSQL)) {
                                    alert("Güncelleme İşlemi Başarılı");
                            }else {
                                alert("Güncelleme İşlemi Başarısız: ".mysqli_error($connect), $type="danger");
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
                        <input class="form-control" type="password" name="password">
                    </div>
                    <div class="form-group">
                        <label>Öğrenci Statu</label> Bu Alana Dikkat! <?php // TODO: DB den gelen veriye göre ayarlanacak. ?>
                        <select class="form-control" name="statu">
                            <option value="3">Yönetici</option>
                            <option value="2">Üye</option>
                            <option value="1" selected>Onaysız</option>
                            <option value="0">Silinmiş</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Öğrenci Notu</label>
                        <textarea class="form-control" name="note" rows="3"><?php echo $user["user_note"]; ?></textarea>
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
