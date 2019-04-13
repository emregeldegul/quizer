<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="<?php echo URL."/?mod=main"; ?>"><i class="fa fa-dashboard fa-fw"></i> Ana Panel</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i> Profil Yönetimi<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo URL."/?mod=profile&op=edit"; ?>">Profili Düzenle</a>
                    </li>
                    <li>
                        <a href="<?php echo URL."/?mod=profile&op=password"; ?>">Şifreni Değiştir</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-edit fa-fw"></i> Sınav Yönetimi<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo URL."/?mod=exam&op=list"; ?>">Sınavları Listele</a>
                    </li>
                    <?php if ($_SESSION["user"]["status"] == "2"): ?>
                        <li>
                            <a href="<?php echo URL."/?mod=exam&op=myAnswers"; ?>">Cevaplarımı Listele</a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo URL."/?mod=exam&op=create"; ?>">Sınav Oluştur</a>
                        </li>
                        <li>
                            <a href="<?php echo URL."/?mod=exam&op=exams"; ?>">Cevapları Listele</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-envelope fa-fw"></i> Mesaj Yönetimi<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <?php if ($_SESSION["user"]["status"] == "2"): ?>
                        <li>
                            <a href="<?php echo URL."/?mod=pm&op=send"; ?>">Mesaj Gönder</a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo URL."/?mod=pm&op=list"; ?>">Mesajları Listele</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <?php if ($_SESSION["user"]["status"] == "3"): ?>
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Üye Yönetimi<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo URL."/?mod=user&op=create"; ?>">Üye Oluştur</a>
                        </li>
                        <li>
                            <a href="<?php echo URL."/?mod=user&op=list"; ?>">Üyeleri Listele</a>
                        </li>
                        <li>
                            <a href="<?php echo URL."/?mod=user&op=deActiveUsers"; ?>">Onaysız Üyelikler</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-gear fa-fw"></i> Sistem Yönetimi<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo URL."/?mod=admin&op=edit"; ?>">Genel Sistem Ayarları</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
