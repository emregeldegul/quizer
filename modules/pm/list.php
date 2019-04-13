<?php
    if ($_SESSION["user"]["status"] != 3) {
        header("Location: ".URL."/?mod=404");
    }
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mesajlar</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tüm Mesajlar
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="40%">Mesaj Başlığı</th>
                                    <th width="30">Gönderen</th>
                                    <th width="20%">Gönderim Tarihi</th>
                                    <th width="20%">Durumu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $pmSQL = "SELECT * FROM quizer_pm INNER JOIN quizer_users ON quizer_pm.pm_sender = quizer_users.user_id WHERE pm_status != 0 ORDER BY pm_date DESC";
                                    $pmQuery = mysqli_query($connect, $pmSQL);
                                    while ($pm = mysqli_fetch_array($pmQuery)) {
                                        if ($pm["pm_status"] == 1) {
                                            $status = '<p class="text-muted">Okunmadı</p>';
                                        }else {
                                            $status = '<p class="text-success">Okundu</p>';
                                        }
                                        echo '<tr class="odd gradeX">
                                            <td><a href="'.URL."/?mod=pm&op=read&id=".$pm["pm_id"].'">'.$pm["pm_title"].'</a></td>
                                            <td>'.$pm["user_name"].' '.$pm["user_surname"].'</td>
                                            <td>'.$pm["pm_date"].'</td>
                                            <td>'.$status.'</td>
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
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
