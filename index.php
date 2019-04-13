<?php
    require_once("settings/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo NAME; ?></title>
    <!-- DataTables CSS -->
    <link href="<?php echo URL."/master/bootstrap"; ?>/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="<?php echo URL."/master/bootstrap"; ?>/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL."/master/bootstrap"; ?>/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo URL."/master/bootstrap"; ?>/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo URL."/master/bootstrap"; ?>/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo URL."/master/bootstrap"; ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo URL."/master/highlight"; ?>/styles/default.css">
    <script src="<?php echo URL."/master/highlight"; ?>/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</head>
<body>
    <?php
        if (isset($_SESSION["user"])) {
            require_once(PATH."/modules/homepages/user/index.php");
        }else {
            require_once(PATH."/modules/homepages/guest/index.php");
        }
    ?>
    <!-- jQuery -->
    <script src="<?php echo URL."/master/bootstrap"; ?>/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo URL."/master/bootstrap"; ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo URL."/master/bootstrap"; ?>/vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo URL."/master/bootstrap"; ?>/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo URL."/master/bootstrap"; ?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL."/master/bootstrap"; ?>/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo URL."/master/bootstrap"; ?>/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>
        $(document).ready(function(){
            var date_input=$('input[name="exStartDate"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
        $(document).ready(function(){
            var date_input=$('input[name="exFinishDate"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                "language": {
                "lengthMenu": "Gösterilecek Satır: _MENU_",
                "zeroRecords": "Kayıt Yok",
                "info": "Sayfa _PAGE_ / _PAGES_",
                "infoEmpty": "Hiç sonuç bulunamadı",
                "infoFiltered": "(toplam _MAX_ kayıt arasından filtrelendi)"
            },
                responsive: true,
                "order": [[ 0, "desc" ]],
                "ordering": false,
            });
        });

        $(document).ready(function() {
            $('#dataTables-answers').DataTable({
                "language": {
                "lengthMenu": "Gösterilecek Satır: _MENU_",
                "zeroRecords": "Kayıt Yok",
                "info": "Sayfa _PAGE_ / _PAGES_",
                "infoEmpty": "Hiç sonuç bulunamadı",
                "infoFiltered": "(toplam _MAX_ kayıt arasından filtrelendi)"
            },
                responsive: true,
                "order": [[ 2, "desc" ]],

            });
        });

        $(document).ready(function() {
            $('#dataTables-user').DataTable({
                "language": {
                "lengthMenu": "Gösterilecek Satır: _MENU_",
                "zeroRecords": "Kayıt Yok",
                "info": "Sayfa _PAGE_ / _PAGES_",
                "infoEmpty": "Hiç sonuç bulunamadı",
                "infoFiltered": "(toplam _MAX_ kayıt arasından filtrelendi)"
            },
                responsive: true,
                "order": [[ 0, "desc" ]],

            });
        });
    </script>
</body>
</html>
