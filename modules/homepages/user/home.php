<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ana Panel</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <?php if ($_SESSION["user"]["status"] == "2"): ?>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sınav Takvimi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sınav İsmi</th>
                                            <th>Sınav Başlangıç</th>
                                            <th>Sınav Bitiş</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $exams = mysqli_query($connect, "SELECT * FROM quizer_exams WHERE exam_status = 1 ORDER BY exam_id DESC LIMIT 5");
                                            while ($exam = mysqli_fetch_array($exams)) {
                                                echo '<tr>
                                                    <td><a href="'.URL.'/?mod=exam&op=quiz&id='.$exam["exam_id"].'">'.$exam["exam_name"].'</a></td>
                                                    <td>'.$exam["exam_startDate"].'</td>
                                                    <td>'.$exam["exam_finishDate"].'</td>
                                                </tr>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Duyurular
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <p><?php echo NOTF; ?></p> <p class="text-right">Evrim Ersin Kangal</p>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-thumb-tack fa-fw"></i> Gerekli Linkler
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <a href="https://emregeldegul.net">Yunus Emre Geldegül Blog</a><br>
                            <a href="http://oktaykarakaya.com.tr">Oktay Karakaya Blog</a><br>
                             <a href="http://coderlab.me">CODERLAB Bilişim</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <?php
                            $usersQuery = mysqli_query($connect, "SELECT * FROM quizer_users WHERE user_status = 1");
                        ?>
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo mysqli_num_rows($usersQuery); ?></div>
                                    <div>Onaysız Üyelik</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo URL."/?mod=user&op=deActiveUsers"; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Üye Sayfası</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <?php
                        $pmQuery = mysqli_query($connect, "SELECT * FROM quizer_pm WHERE pm_status = 1");
                    ?>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo mysqli_num_rows($pmQuery); ?></div>
                                    <div>Okunmamış Mesaj</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo URL."/?mod=pm&op=list"; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Mesaj Sayfası</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <?php
                        $answerQuery = mysqli_query($connect, "SELECT * FROM quizer_answers WHERE answer_read = 0");
                    ?>
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pencil fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo mysqli_num_rows($answerQuery); ?></div>
                                    <div>Okunmamış Sınav</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo URL."/?mod=exam&op=exams"; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Sınav Sayfası</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cogs fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>API İstek</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">API Sayfası</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sınav Takvimi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sınav İsmi</th>
                                            <th>Sınav Başlangıç</th>
                                            <th>Sınav Bitiş</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $exams = mysqli_query($connect, "SELECT * FROM quizer_exams WHERE exam_status = 1 ORDER BY exam_id DESC LIMIT 5");
                                            while ($exam = mysqli_fetch_array($exams)) {
                                                echo '<tr>
                                                    <td><a href="'.URL.'/?mod=exam&op=quiz&id='.$exam["exam_id"].'">'.$exam["exam_name"].'</a></td>
                                                    <td>'.$exam["exam_startDate"].'</td>
                                                    <td>'.$exam["exam_finishDate"].'</td>
                                                </tr>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sistem Özeti
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <?php
                                        if (STATUS) {
                                            $sstatus = "Aktif";
                                        }else {
                                            $sstatus = "Pasif";
                                        }

                                        if (MEMB) {
                                            $ustatus = "Aktif";
                                        }else {
                                            $ustatus = "Pasif";
                                        }

                                        $totalExam = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM quizer_exams WHERE exam_status = 1 "));
                                        $totalAns = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM quizer_answers"));
                                    ?>
                                    <tr>
                                        <td width="25%">Site Statu:</td>
                                        <td width="25%"><b><?php echo $sstatus; ?></b></td>
                                        <td width="25%">Toplam Sınav:</td>
                                        <td width="25%"><b><?php echo $totalExam; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Üyelik İzin:</td>
                                        <td><b><?php echo $ustatus; ?></b></td>
                                        <td>Toplam Cevap:</td>
                                        <td><b><?php echo $totalAns; ?></b></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                <hr>
                <center>
                    <img src="https://emregeldegul.net/wp-content/uploads/2018/01/CoderLabLogo-300x113.png" alt="" width="250" height="75"><br>
                    <a href="https://emregeldegul.net">© 2019 CODERLAB Bilişim Hizmetleri</a><br>
                    <a href="https://emregeldegul.net">Yunus Emre Geldegül</a>
                </center>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
