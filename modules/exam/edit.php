<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sınav Düzenle</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sınav Düzenleme Formu
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    if (isset($_POST["edit"])) {
                                        $name = post("exName");
                                        $lang = post("exLang");
                                        $start = post("exStartDate");
                                        $finish = post("exFinishDate");
                                        $brifing = post("exBrifing");

                                        $id = get("id");
                                        $updateSQL = "UPDATE quizer_exams SET exam_name = '$name', exam_lang = '$lang', exam_startDate = '$start', exam_finishDate = '$finish', exam_brifing = '$brifing' WHERE exam_id = $id";

                                        if (mysqli_query($connect, $updateSQL)) {
                                            alert("Güncelleme Başarılı");
                                        }else {
                                            alert("Güncelleme Başarısız: ".mysqli_error($connect), $type="danger");
                                        }

                                        if ($_SESSION["user"]["status"] != 3) {
                                            header("Location: ".URL."/?mod=404");
                                        }else {
                                            if (isset($_GET["id"])) {
                                                $id = get("id");
                                                $examQuery = mysqli_query($connect, "SELECT * FROM quizer_exams WHERE exam_id = $id");
                                                if (mysqli_num_rows($examQuery)) {
                                                    $exam = mysqli_fetch_array($examQuery);
                                                }else {
                                                    header("Location: ".URL."/?mod=exam&op=list");
                                                }
                                            }else {
                                                header("Location: ".URL."/?mod=exam&op=list");
                                            }
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
                                        <input class="form-control" name="exName" value="<?php echo $exam["exam_name"]; ?>">
                                    </div>
                                    <div class="form-group">
                                           <label>Sınav Dili</label>
                                           <?php // TODO: kullanıcıdan gelen veriye göre değişecek. ?>
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
                                            <input class="form-control" id="date" name="exStartDate" type="text" value="<?php echo $exam["exam_startDate"]; ?>">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar" id="date"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sınav Bitiş Tarihi</label>
                                        <div class='input-group date'>
                                            <input class="form-control" id="date" name="exFinishDate" type="text" value="<?php echo $exam["exam_finishDate"]; ?>">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Brifingi</label>
                                        <textarea class="form-control" name="exBrifing" rows="5"><?php echo $exam["exam_brifing"]; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default" name="edit">Sınavı Kaydet</button>
                                        <button type="reset" class="btn btn-default">Formu Resetle</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <label><font color="red">Uyarı!</font></label><br>
                                "Sınav Dilini" değiştirmeyi unutmayın. Varsayılan olarak gelmektedir.<br><br>
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
