<?php
    if ($_SESSION["user"]["status"] != 3) {
        header("Location: ".URL."/?mod=404");
    }
    if (!isset($_GET["id"]) or empty($_GET["id"])) {
        header("Location: ".URL."/?mod=exam&op=exams");
    }else {
        $id = get("id");
        $examSQL = "SELECT * FROM quizer_exams WHERE exam_id = $id LIMIT 1";
        $examQuery = mysqli_query($connect, $examSQL);
        if (mysqli_num_rows($examQuery)) {
            $exam = mysqli_fetch_array($examQuery);
        }else {
            header("Location: ".URL."/?mod=exam&op=exams");
        }
    }
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cevaplar (<?php echo $exam["exam_name"]; ?>)</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Cevap Listesi
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-answers">
                            <thead>
                                <tr>
                                    <th width="30%">Öğrenci İsmi</th>
                                    <th width="20%">Öğrenci Numarası</th>
                                    <th width="30%">Sınav Tarihi</th>
                                    <th width="20%">Sınav Kağıdı</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $answersSQL = "SELECT * FROM quizer_answers INNER JOIN quizer_users ON quizer_answers.answer_uid = quizer_users.user_id WHERE quizer_answers.answer_eid = $id";
                                    $answersQuery = mysqli_query($connect, $answersSQL);
                                    while ($answer = mysqli_fetch_array($answersQuery)) {
                                        echo '<tr class="odd gradeX">
                                            <td>'.$answer["user_name"].' '.$answer["user_surname"].'</td>
                                            <td>'.$answer["user_schoolNo"].'</td>
                                            <td>'.$answer["answer_date"].'</td>
                                            <td><a href="'.URL."/?mod=exam&op=answer&id=".$answer["answer_id"].'">Sınav Kağıdı</a></td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
