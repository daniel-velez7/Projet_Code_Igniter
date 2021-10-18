<div class="container_formulaire">
    <div class="formulaire">
        <h5 class="form_title">Stagiaire formulaire d'inscription</h5>
        <input type="text" name="type_validation" id="type_validation" value="<?php echo $_REQUEST['type'] ?>" style='display:none;'>
        <input type="text" name="id_validation" id="id_validation" value="<?php echo $_REQUEST['id'] ?>" style='display:none;'>
        <input type="text" name="nom" id="nom" style='display:none;'>
        <input type="text" name="prenom" id="prenom" style='display:none;'>
        <div class="form_item text-center">
            <h5>Vos Motivations</h5>
            <textarea name="motivation" id="motivation" rows="8" cols="50" maxlength='400' placeholder="400 caractère maximum"></textarea>
        </div>
        <button class='btn btn-success button_form' onclick='Validation_Motivation()'>Faire la demande d'inscription</button>
        <div id='status'></div>
    </div>
</div>

<script>Display_Inscription_Stagiaire();</script>