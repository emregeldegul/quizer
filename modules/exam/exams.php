<?php
    if ($_SESSION["user"]["status"] != 3) {
        header("Location: ".URL."/?mod=404");
    }
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cevaplar</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sınav Listesi
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="45%">Sınav İsmi</th>
                                    <th width="15%">Başlangıç Tarihi</th>
                                    <th width="15%">Bitiş Tarihi</th>
                                    <th width="20%">Sınav Durumu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $today = date('Y-m-d');
                                    $examSQL = "SELECT * FROM quizer_exams WHERE exam_status = 1 ORDER BY exam_id DESC";
                                    $examQuery = mysqli_query($connect, $examSQL);
                                    while ($exam = mysqli_fetch_array($examQuery)) {
                                        $finish = (((strtotime($exam["exam_finishDate"]) - strtotime($today))/60)/60)/24;
                                        $start = (((strtotime($exam["exam_startDate"]) - strtotime($today))/60)/60)/24;

                                        if ($start <= 0) {
                                            if ($finish < 0) {
                                                $statu = '<p class="text-muted">Sınav Bitti</p>';
                                            }else {
                                                $statu = '<p class="text-success">Sınav Sürüyor</p>';
                                            }
                                        }else {
                                            $statu = '<p class="text-info">Sınav Henüz Başlamadı</p>';
                                        }

                                        echo '<tr class="odd gradeX">
                                            <td>'.$exam["exam_id"].'</td>
                                            <td><a href="'.URL."/?mod=exam&op=answers&id=".$exam["exam_id"].'">'.$exam["exam_name"].'</a></td>
                                            <td>'.$exam["exam_startDate"].'</td>
                                            <td>'.$exam["exam_finishDate"].'</td>
                                            <td>'.$statu.'</td>
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
