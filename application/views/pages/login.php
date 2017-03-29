<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $title; ?> - Camping de la SEAM</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/iCheck/square/blue.css">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <b>Camping de la SEAM</b>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Veuillez vous authentifier</p>
                <?php
                if (validation_errors() != null) {
                    ?>    
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i>Erreur !</h4>
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php
                }
                ?>

                <?php echo form_open('user/login_form'); ?>

                <div class="form-group has-feedback">
                    <input type="email" name="login-email" class="form-control" placeholder="Email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="login-password" class="form-control" placeholder="Mot de passe" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-flat">Connexion</button>
                <a href="<?= base_url(); ?>index.php/user/register" class="btn btn-danger btn-block btn-flat">Pas encore inscrit ?</a>
                </form>
            </div>
        </div>

        <script src="<?= base_url(); ?>/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?= base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>/assets/plugins/iCheck/icheck.min.js"></script>
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