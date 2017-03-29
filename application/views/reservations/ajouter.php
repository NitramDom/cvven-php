<h1> <?= $titre; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('reservations/ajouter_formulaire'); ?>

<label for="datearrivee">Votre date d'arrivée</label>
<input type="date" name="datearrivee" required>
<br>

<label for="datearrivee">Votre date de départ</label>
<input type="date" name="datedepart" required>
<br>

<label for="nbpersonnage">Nombre de personnes</label>
<input type="number" name="nbpersonnage" required>
<br>

<label for="menage">On s'occupe du ménage ?</label>
<select name="menage">
    <option value="0">Non</option> 
    <option value="1" selected>Oui</option>
</select>
<br>

<input type="submit" name="submit" value="Réserver">

</form>

<br>