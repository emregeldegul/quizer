<?php
    if (!isset($_GET["id"]) or empty($_GET["id"])) {
        header("Location: ".URL."/?mod=exam&op=list");
    }else {
        $examID = get("id");
        $examSQL = "SELECT * FROM quizer_exams WHERE exam_id = $examID and exam_status = 1 LIMIT 1";
        $examQuery = mysqli_query($connect, $examSQL);

        if (!mysqli_num_rows($examQuery)) {
            header("Location: ".URL."/?mod=exam&op=list");
        }

        $exam = mysqli_fetch_array($examQuery);
        $time = date('d.m.Y H:i:s');

        $statu = true;
        $today = date('Y-m-d');

    }
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sınav (<?php echo $exam["exam_name"]; ?>)</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sınav Kayıt Formu
                    </div>
                    <div class="panel-body">
                        <form class="" action="" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php
                                        $eid = get("id");
                                        $uid = $_SESSION["user"]["id"];

                                        if (isset($_POST["save"])) {
                                            $code = postCode("code", $slahs=true);
                                            $date = date("Y-m-d H:i:s");
                                            $saveSQL = "INSERT INTO quizer_answers (answer_uid, answer_eid, answer_content, answer_date)
                                                        VALUES ($uid, $eid, '$code', '$date')";

                                            if (mysqli_query($connect, $saveSQL)) {
                                                alert("Sınav Kaydı Başarılı");
                                            }else {
                                                alert("Sınav Kaydı Başarısız: ".mysqli_error($connect), $type="danger");
                                            }
                                        }

                                        $checkSQL = "SELECT * FROM quizer_answers WHERE answer_uid = $uid and answer_eid = $eid";
                                        $checkQuery = mysqli_query($connect, $checkSQL);

                                        if (mysqli_num_rows($checkQuery)) {
                                            alert("Siz Bu Sınava Daha Önce Girmişsiniz", $type="warning");
                                            $statu = false;
                                        }

                                        $finish = (((strtotime($exam["exam_finishDate"]) - strtotime($today))/60)/60)/24;
                                        $start = (((strtotime($exam["exam_startDate"]) - strtotime($today))/60)/60)/24;

                                        if ($start <= 0) {
                                            if ($finish < 0) {
                                                alert("Bu Sınav Bitmiş", $type="warning");
                                                $statu = false;
                                            }
                                        }else {
                                            alert("Bu Sınav Henüz Başlamamış", $type="warning");
                                            $statu = false;
                                        }
                                    ?>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="disabledSelect">Öğrenci İsim & Soyisim</label>
                                        <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_SESSION["user"]["name"].' '.$_SESSION["user"]["surname"]; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledSelect">Sınav Saati</label>
                                        <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $time; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledSelect">Sınav Dili</label>
                                        <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $exam["exam_lang"]; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledSelect">Sınav Açıklaması</label>
                                        <p class="help-block"><?php echo $exam["exam_brifing"]; ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Kaynak Kodlar</label>
                                        <textarea class="form-control" rows="10" name="code"></textarea>
                                    </div>
                                    <div style="float:right;">
                                        <p class="text-danger">Kaydedilen sınavlar güncellenemez <?php if ($statu) { echo '<button type="submit" name="save" class="btn btn-default">Sınavı Kaydet</button>';} ?></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
