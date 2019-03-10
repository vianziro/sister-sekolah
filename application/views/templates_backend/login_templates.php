<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$this->config->item('app_name')?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?=base_url('vendor/fortawesome/font-awesome/css/font-awesome.css')?>">
        <link rel="stylesheet" href="<?=base_url('vendor/almasaeed2010/adminlte/bootstrap/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?=base_url('vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css')?>">
        <link rel="stylesheet" href="<?=base_url('vendor/almasaeed2010/adminlte/plugins/iCheck/square/blue.css')?>">
        <script src="<?=base_url('vendor/almasaeed2010/adminlte/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
        <script src="<?=base_url('vendor/almasaeed2010/adminlte/bootstrap/js/bootstrap.min.js')?>"></script>
    </head>
    <body class="hold-transition login-page" style="background-image: url('<?=base_url('assets/img/bg-login.jpg')?>'); background-size: cover;">
        <div class="login-box">
            <?=$msg?>
            <div class="login-logo">
                SI<b>AKAD</b>
            </div>
            <div class="login-box-body">
                <?php
                    if(!empty($main_content))
                    {
                        $this->load->view($main_content);
                    }
                ?>
            </div>
        </div>
        <link rel="stylesheet" href="<?=base_url('vendor/almasaeed2010/adminlte/plugins/iCheck/square/blue.css')?>">
        <script src="<?=base_url('vendor/almasaeed2010/adminlte/plugins/iCheck/icheck.min.js')?>"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%'
                });
            });
        </script>
    </body>
</html>
