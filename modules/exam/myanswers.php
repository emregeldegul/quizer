<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cevaplarım</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Cevap Listesi
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sınav İsmi</th>
                                        <th>Sınav Tarihi</th>
                                        <th>Sınav Kağıdı</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $id = $_SESSION["user"]["id"];
                                        $myAnswersSQL = "SELECT * FROM quizer_answers
                                        INNER JOIN quizer_exams ON quizer_answers.answer_eid = quizer_exams.exam_id
                                        WHERE answer_uid = $id";
                                        $myAnswers = mysqli_query($connect, $myAnswersSQL);

                                        while ($myAnswer = mysqli_fetch_array($myAnswers)) {
                                            echo '<tr>
                                            <td>'.$myAnswer["exam_name"].'</td>
                                            <td>'.$myAnswer["answer_date"].'</td>
                                            <td><a href="'.URL.'/?mod=exam&op=answer&id='.$myAnswer["answer_id"].'">Sınav Kağıdı</td>
                                        </tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
