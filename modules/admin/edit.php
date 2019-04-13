<?php
    if ($_SESSION["user"]["status"] != 3) {
        header("Location: ".URL."/?mod=404");
    }
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Genel Yönetim Paneli</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <form role="form" action="<?php echo URL."/?mod=admin&op=edit"; ?>" method="post">
                <div class="col-lg-12">
                    <?php
                        if (isset($_POST["update"])) {
                            $name = post("name");
                            $url = post("url");
                            $desc = post("desc");
                            $sstatu = post("sstatu");
                            $ustatu = post("ustatu");
                            $notf = post("notf");

                            $siteSQL = "UPDATE quizer_site SET site_url = '$url', site_name = '$name', site_desc = '$desc', site_status = '$sstatu', site_memb = '$ustatu', site_notf = '$notf'";
                            if (mysqli_query($connect, $siteSQL)) {
                                alert("Güncelleme İşlemi Başarılı");
                            }else {
                                alert("Güncelleme İşlemi Başarısız: ".mysqli_error($connect), $type="danger");
                            }
                        }

                        $siteSQL = "SELECT * FROM quizer_site LIMIT 1";
                        $siteQuery = mysqli_query($connect, $siteSQL);
                        $site = mysqli_fetch_array($siteQuery);
                    ?>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Site İsmi</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $site['site_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Site URL</label>
                        <input class="form-control" type="text" name="url" value="<?php echo $site['site_url']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Site Açıklaması</label>
                        <input class="form-control" type="text" name="desc" value="<?php echo $site['site_desc']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Site Statu</label> Bu Alana Dikkat!
                        <select class="form-control" name="sstatu">
                            <?php
                                if ($site["site_status"] == 1) {
                                    $sstatus = '<option value="1" selected>Aktif</option><option value="0">Pasif</option>';
                                }else {
                                    $sstatus = '<option value="1">Aktif</option><option value="0" selected>Pasif</option>';
                                }
                                echo $sstatus;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Öğrenci Statu</label> Bu Alana Dikkat!
                        <select class="form-control" name="ustatu">
                            <?php
                                if ($site["site_memb"] == 1) {
                                    $ustatus = '<option value="1" selected>Aktif</option><option value="0">Pasif</option>';
                                }else {
                                    $ustatus = '<option value="1">Aktif</option><option value="0" selected>Pasif</option>';
                                }
                                echo $ustatus;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Site Duyuru</label>
                        <textarea class="form-control" name="notf" rows="3"><?php echo $site["site_notf"]; ?></textarea>
                    </div>
                    <div class="form-group" style="margin-top: 10px; float:right;">
                        <button type="submit" class="btn btn-default" name="update">Bilgileri Güncelle</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Webmaster Notu
                        </div>
                        <div class="panel-body">
                            Bu sistem <a href="https://emregeldegul.net">Yunus Emre Geldegül</a> tarafından geliştirilmiştir.<br>
                            Eğer isterseniz <a href="https://github.com/emregeldegul/quizer">GitHub</a> üzerinden geliştirilmesine katkıda bulunabilirsiniz.
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
