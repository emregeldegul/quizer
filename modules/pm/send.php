<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mesaj Gönder</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                    if (isset($_POST["send"])) {
                        $title = post("title");
                        $content = post("content");

                        $date = date("Y-m-d H:i:s");
                        $id = $_SESSION["user"]["id"];

                        $saveSQL = "INSERT INTO quizer_pm (pm_sender, pm_title, pm_content, pm_date)
                        VALUES ($id, '$title', '$content', '$date')";

                        if (mysqli_query($connect, $saveSQL)) {
                            alert("Mesaj Gönderildi");
                        }else {
                            alert("Mesaj Gönderilemedi: ".mysqli_error($connect), $type="danger");
                        }
                    }
                ?>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Yönetici İletişim Formu
                    </div>
                    <div class="panel-body">
                        <form class="" action="" method="post">
                            <div class="form-group">
                                <label>Mesaj Başlığı</label>
                                <input class="form-control" name="title" value="">
                            </div>
                            <div class="form-group">
                                <label>Mesaj İçeriği</label>
                                <textarea class="form-control" name="content" rows="5"></textarea>
                            </div>
                            <div class="form-group" style="float: right;">
                                <button type="submit" class="btn btn-default" name="send">Mesajı Gönder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Diğer İletişim Kanalları
                    </div>
                    <div class="panel-body">
                        <a href="https://emregeldegul.net">Yunus Emre Geldegül</a><br>
                        <a href="http://coderlab.me">CODERLAB Bilişim</a>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!--
