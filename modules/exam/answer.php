<?php
    if (!isset($_GET["id"]) or empty($_GET["id"])) {
        header("Location: ".URL."/?mod=exam&op=exams");
    }else {
        $id = get("id");

        if (isset($_GET["role"])) {
            mysqli_query($connect, "DELETE FROM quizer_answers WHERE answer_id = $id;");
            header("Location: ".URL."/?mod=exam&op=exams");
        }

        $answerSQL = "SELECT * FROM quizer_answers
        INNER JOIN quizer_exams ON quizer_answers.answer_eid = quizer_exams.exam_id
        INNER JOIN quizer_users ON quizer_answers.answer_uid = quizer_users.user_id
        WHERE quizer_answers.answer_id = $id  and quizer_exams.exam_status = 1";
        $answerQuery = mysqli_query($connect, $answerSQL);
        if (mysqli_num_rows($answerQuery)) {
            $answer = mysqli_fetch_array($answerQuery);
            if ($_SESSION["user"]["id"] != $answer["answer_uid"]) {
                if ($_SESSION["user"]["status"] != 3) {
                    header("Location: ".URL."/?mod=404");
                }else {
                    mysqli_query($connect, "UPDATE quizer_answers SET answer_read = 1 WHERE answer_id = $id");
                }
            }
        }else {
            header("Location: ".URL."/?mod=exam&op=exams");
        }
    }
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cevap (<?php echo $answer["exam_name"]; ?>)</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sınav Kağıdı
                    </div>
                    <div class="panel-body">
                        <form class="" action="" method="post">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="disabledSelect">Öğrenci İsim & Soyisim</label>
                                        <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $answer['user_name'].' '.$answer['user_surname'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledSelect">Sınav Saati</label>
                                        <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $answer["answer_date"]; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledSelect">Sınav Dili</label>
                                        <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $answer["exam_lang"]; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledSelect">Sınav Açıklaması</label>
                                        <p class="help-block"><?php echo $answer["exam_brifing"]; ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Kaynak Kodlar</label>
                                        <pre style="border: 1px solid black; background: white;">
                                            <code class="<?php echo $answer["exam_lang"]; ?>" style="margin-top: -20px;"><?php echo htmlspecialchars($answer["answer_content"]); ?></code>
                                        </pre>
                                    </div>
                                    <div style="float:right;">
                                        <p class="text-danger"><a href="#">Çıktı Al</a> /
                                        <a href="<?php echo URL."/poster.php?id=".$answer["answer_id"]; ?>" target="_blank">Tam Ekran Görüntüle</a> /
                                        <a href="<?php echo URL."/?mod=exam&op=answer&role=del&id=".$answer["answer_id"]; ?>">Kodu Sil</a></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
