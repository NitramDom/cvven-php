<div class="box box-info">
    <div class="box-body">

        <div class="box-body">
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

            <?php echo form_open('reservation/form_reservation'); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Type de logement</label>
                        <select name="reservation-logement" class="form-control select2" style="width: 100%;">
                            <?php
                            foreach ($lesLogements as $key => $data) {
                                echo "<option value='$key'>" . $data . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Type de pension</label>
                        <select name="reservation-pension"class="form-control select2" style="width: 100%;">
                            <?php
                            foreach ($lesPensions as $key => $data) {
                                echo "<option value='$key'>" . $data . "</option>";
                            }
                            /* for($i = 0; $i < $lesPensions; $i++) {
                              echo "<option >" . $lesPensions[$i] . "</option>";
                              } */
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Menage</label>
                        <select name="reservation-menage" class="form-control select2" style="width: 100%;">
                            <?php
                            foreach ($lesMenages as $key => $data) {
                                echo "<option value='$key'>" . $data . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nombre de personnes</label>
                        <input type="number" min=="1" name="reservation-personnes" class="form-control pull-right" required>
                    </div>                    

                    <div class="form-group">
                        <label>Date Début:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="reservation-debut" class="form-control pull-right" id="datepicker">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Date Fin:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="reservation-fin" class="form-control pull-right" id="datepicker2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="input-group input-group-sm">


                    <button type="submit" class="btn btn-info btn-flat">Réservez !</button>
                    </span>
                </div>
    </div>
</div>
