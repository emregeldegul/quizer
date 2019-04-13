<?php
    if ($_SESSION["user"]["status"] != 3) {
        header("Location: ".URL."/?mod=404");
    }
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Üye Oluştur</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <form role="form" action="" method="post">
                <div class="col-lg-12">
                    <?php
                        if (isset($_POST["create"])) {
                            $name = post("name");
                            $passwd = md5(post("password"));
                            $surname = post("surname");
                            $mail = post("mail");
                            $schoolNo = post("schoolNo");
                            $note = post("note");
                            $statu = post("statu");

                            $createSQL = "INSERT INTO quizer_users (user_name, user_surname, user_mail, user_schoolNo, user_note, user_status, user_password)
                            VALUES ('$name', '$surname', '$mail', '$schoolNo', '$note', '$statu', '$passwd')";

                            if (mysqli_query($connect, $createSQL)) {
                                    alert("Üyelik Başarılı");
                            }else {
                                alert("Üyelik Başarısız: : ".mysqli_error($connect), $type="danger");
                            }
                        }
                    ?>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>İsim</label>
                        <input class="form-control" type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Soyisim</label>
                        <input class="form-control" type="text" name="surname" required>
                    </div>
                    <div class="form-group">
                        <label>Şifre</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <div class="form-group">
                        <label>Öğrenci Statu</label> Bu Alana Dikkat!
                        <select class="form-control" name="statu">
                            <option value="3">Yönetici</option>
                            <option value="2" selected>Üye</option>
                            <option value="1">Onaysız</option>
                            <option value="0">Silinmiş</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Öğrenci Notu</label>
                        <textarea class="form-control" name="note" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Mail</label>
                        <input class="form-control" type="mail" name="mail" required>
                    </div>
                    <div class="form-group">
                        <label>Okul No</label>
                        <input class="form-control"  type="schoolNo" name="schoolNo">
                        <p class="help-block">Okul numaranız <b>xx-xxx-xxx</b> formatında olmalıdır.</p>
                    </div>
                    <div class="form-group" style="margin-top: 10px; float:right;">
                        <button type="submit" class="btn btn-default" name="create">Bilgileri Güncelle</button>
                    </div>
                </div>
            </form>
            <!-- /.col-lg-12 -->
        </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
