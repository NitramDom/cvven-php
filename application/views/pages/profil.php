<div class="panel-body">
    <div class="panel panel-default">
        <div class="panel-heading">Modifier mon mot de passe</div>
        <div class="panel-body">
            <div class="col-sm-3"> 
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Maecenas id aliquet risus, vitae facilisis lacus. <br>
                    Donec quis feugiat mauris, non ultrices lacus. Nullam euismod tellus nunc, <br>
                    posuere dictum augue faucibus sit amet. Pellentesque eu mi purus. Vestibulum gravida blandit nunc vel cursus. <br>
                </p>
            </div>

            <div class="col-sm-4">
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

                <?php echo form_open('user/profil_form'); ?>
                <div class="form-group">
                    <span class="glyphicon glyphicon-record"></span> <label for="profil-password1">Mot de passe</label>
                    <input type="password" name="profil-password1" class="form-control" id="profil-password1" placeholder="Saisissez votre mot de passe">
                </div>
                <div class="form-group">
                    <span class="glyphicon glyphicon-record"></span> <label for="profil-password2">Confirmation mot de passe</label>
                    <input type="password" name="profil-password2" class="form-control" id="profil-password2" placeholder="Confirmez votre mot de passe">
                    </br>
                    <button type="submit" class="btn btn-info">Valider</button>
                </div>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Mes réservations</div>
        <div class="panel-body">
            <?php if ($this->user_model->have_reservation($user_infos['idclient']) == 0) {
                ?>
                <p>Vous n'avez aucune réservation.
                </p>
                <?php
            } else {
                $mesReservations = $this->user_model->get_reservation($user_infos['idclient']);
                ?>
                <table class="table table-striped">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Date d'arrivée</th>
                        <th>Date de départ</th>
                        <th>Nombre de personnes</th>
                        <th>Ménage</th>
                        <th>Pension</th>
                        <th>Etat</th>
                        <th>Date de réservation</th>
                    </tr>
                    <?php
                    foreach ($mesReservations as $data) {
                        ?>
                        <tr>
                            <td><?= $data['idreservation'] ?></td>
                            <td><?= $data['datearrivee'] ?></td>                            
                            <td><?= $data['datedepart'] ?></td>
                            <td><?= $data['nbpersonnes'] ?></td>
                            <td><?= $data['menage'] ? 'oui' : 'non' ?></td>
                            <td><?= $data['pension'] ? 'oui' : 'non' ?></td>
                            <td><?= $data['etat'] ?></td>
                            <td><?= $data['datereservation'] ?></td>
                        </tr>                
                        <?php
                    }
                    ?>                    
                </table>
                <?php
            }
            ?>
        </div>
    </div>
</div>