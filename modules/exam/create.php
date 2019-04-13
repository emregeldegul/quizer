<?php
    if ($_SESSION["user"]["status"] != 3) {
        header("Location: ".URL."/?mod=404");
    }
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sınav Oluştur</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sınav Oluşturma Formu
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    if (isset($_POST["save"])) {
                                        $name = post("exName");
                                        $lang = post("exLang");
                                        $start = date(post("exStartDate"));
                                        $finish = date(post("exFinishDate"));
                                        $brifing = post("exBrifing");

                                        $createSQL = "INSERT INTO quizer_exams (exam_name, exam_lang, exam_startDate, exam_finishDate, exam_brifing)
                                        VALUES ('$name', '$lang', '$start', '$finish', '$brifing')";

                                        if (mysqli_query($connect, $createSQL)) {
                                            alert("Sınav Kaydı Eklendi");
                                        }else {
                                            alert("Sınav Kaydı Eklenemedi: ".mysqli_error($connect), $type="danger");
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <form class="" action="" method="post">
                                    <div class="form-group">
                                        <label>Sınav İsmi</label>
                                        <input class="form-control" name="exName" value="">
                                    </div>
                                    <div class="form-group">
                                           <label>Sınav Dili</label>
                                           <select class="form-control" name="exLang">
                                               <option value="mathematica">Matematik Yazılımları</option>
                                               <option value="cpp">C++</option>
                                               <option value="cs">C#</option>
                                               <option value="python">Python</option>
                                               <option value="matlab">Matlab</option>
                                           </select>
                                       </div>
                                    <div class="form-group">
                                        <label>Sınav Başlangıç Tarihi</label>
                                        <div class='input-group date'>
                                            <input class="form-control" id="date" name="exStartDate" type="text"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar" id="date"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sınav Bitiş Tarihi</label>
                                        <div class='input-group date'>
                                            <input class="form-control" id="date" name="exFinishDate" type="text"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Brifingi</label>
                                        <textarea class="form-control" name="exBrifing" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default" name="save">Sınavı Kaydet</button>
                                        <button type="reset" class="btn btn-default">Formu Resetle</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <label>Son Eklenen 10 Sınav</label>
                                <br>
                                <?php
                                    $examListSQL = "SELECT * FROM quizer_exams ORDER BY exam_id DESC LIMIT 10";
                                    $examListQuery = mysqli_query($connect, $examListSQL);
                                    while ($exam = mysqli_fetch_array($examListQuery)) {
                                        echo $exam["exam_name"]." (".$exam["exam_lang"].")<br>∟".$exam["exam_startDate"]." / ".$exam["exam_finishDate"]."<br><br>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
