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
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="login-logo">
                <b>Camping de la SEAM</b>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">Veuillez vous enregistrer</p>

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

                <?php echo form_open('user/register_form'); ?>
                <div class="form-group has-feedback">
                    <input type="text" name="register-nom" class="form-control" placeholder="Nom" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="register-prenom" class="form-control" placeholder="Prénom" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>                         
                <div class="form-group has-feedback">
                    <input type="email" name="register-email" class="form-control" placeholder="Email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="phone" name="register-telephone" class="form-control" placeholder="Téléphone" required>
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>            
                <div class="form-group has-feedback">
                    <input type="text" name="register-adresse" class="form-control" placeholder="Adresse (numéro et voie)" required>
                    <span class="glyphicon glyphicon-pushpin form-control-feedback"></span>
                </div>    
                <div class="form-group has-feedback">
                    <input type="text" name="register-ville" class="form-control" placeholder="Ville" required>
                    <span class="glyphicon glyphicon-pushpin form-control-feedback"></span>
                </div> 
                <div class="form-group has-feedback">
                    <input type="text" name="register-codepostal" class="form-control" placeholder="Code postal" required>
                    <span class="glyphicon glyphicon-pushpin form-control-feedback"></span>
                </div>                 
                <div class="form-group has-feedback">
                    <input type="password" name="register-password1" class="form-control" placeholder="Mot de passe" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="register-password2" class="form-control" placeholder="Confirmation" required>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Inscription</button>
                <a href="<?= base_url(); ?>index.php/user/login" class="btn btn-warning btn-block btn-flat">Déjà inscrit ?</a>
            </div>
        </form>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="<?= base_url(); ?>/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
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