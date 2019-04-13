<?php
    if ($_SESSION["user"]["status"] != 3) {
        header("Location: ".URL."/?mod=404");
    }
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Üye Listesi</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tüm Üyelikler
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-user">
                            <thead>
                                <tr>
                                    <th width="10%">ID</th>
                                    <th width="30%">Öğrenci İsmi</th>
                                    <th width="20%">Öğrenci Numarası</th>
                                    <th width="20%">Öğrenci Statusu</th>
                                    <th width="20%">Öğrenci Sayfası</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $userSQL = "SELECT * FROM quizer_users WHERE user_status != 0";
                                    $userQuery = mysqli_query($connect, $userSQL);
                                    while ($user = mysqli_fetch_array($userQuery)) {
                                        if ($user["user_status"] == 1) {
                                            $status = '<p class="text-muted">Onaylanmamış</p>';
                                        }else {
                                            $status = '<p class="text-success">Onaylanmış</p>';
                                        }
                                        echo '<tr class="odd gradeX">
                                        <td>'.$user["user_id"].'</td>
                                        <td>'.$user["user_name"].' '.$user["user_surname"].'</td>
                                            <td>'.$user["user_schoolNo"].'</td>
                                            <td>'.$status.'</td>
                                            <td><a href="'.URL."/?mod=user&op=user&id=".$user["user_id"].'">Öğrenci Sayfası</a></td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
