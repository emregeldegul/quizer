<?php
    if (!isset($_GET["id"]) or empty($_GET["id"])) {
        header("Location: ".URL."/?mod=exam&op=exams");
    }else {
        $id = get("id");
        $pmSQL = "SELECT * FROM quizer_pm
        INNER JOIN quizer_users ON quizer_pm.pm_sender = quizer_users.user_id
        WHERE quizer_pm.pm_id = $id";
        $pmQuery = mysqli_query($connect, $pmSQL);
        if (mysqli_num_rows($pmQuery)) {
            $pm = mysqli_fetch_array($pmQuery);
            if ($_SESSION["user"]["status"] != 3) {
                header("Location: ".URL."/?mod=404");
            }
            $update = "UPDATE quizer_pm SET pm_status = 2 WHERE pm_id = $id";
            mysqli_query($connect, $update);
        }else {
            header("Location: ".URL."/?mod=pm");
        }
    }
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Gönderilen Mesaj</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                    if (isset($_GET["case"])) {
                        if (get("case") == "notRead") {
                            $update = "UPDATE quizer_pm SET pm_status = 1 WHERE pm_id = $id";
                            mysqli_query($connect, $update);
                        }elseif (get("case") == "del") {
                            $update = "UPDATE quizer_pm SET pm_status = 0 WHERE pm_id = $id";
                            mysqli_query($connect, $update);
                            header("Location: ".URL."/?mod=pm&op=list");
                        }
                    }
                ?>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo $pm["pm_title"]; ?>
                            </div>
                            <div class="panel-body">
                                <?php echo $pm["pm_content"]; ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Gönderici Detayları
                            </div>
                            <div class="panel-body">
                                <label>Öğrenci İsmi</label>
                                <br><?php echo $pm["user_name"]." ".$pm["user_surname"]; ?>
                                <br>
                                <br>
                                <label>Öğrenci Numarası</label>
                                <br><?php echo $pm["user_schoolNo"]; ?>
                                <br>
                                <br>
                                <label>Öğrenci Notu</label>
                                <br><?php echo $pm["user_note"]; ?>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Mesaj Detayları
                            </div>
                            <div class="panel-body">
                                <label>Gönderim Tarihi</label>
                                <br><?php echo $pm["pm_date"]; ?>
                                <br>
                                <br>
                                <label>Okunma Durumu</label>
                                <br><a href="<?php echo URL."/?mod=pm&op=read&id=$id&case=notRead"; ?>">Okunmadı Olarak İşaretle</a>
                                <br>
                                <br>
                                <label>Silme Durumu</label>
                                <br><a href="<?php echo URL."/?mod=pm&op=read&id=$id&case=del"; ?>">Mesajı Sil</a>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
        </div>
    </div>
    <!--
