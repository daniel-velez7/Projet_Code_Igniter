<div class="container_formulaire">
    <div class="formulaire">
        <input type='text' id='id_intervenant' value='<?php echo $_REQUEST['id'];?>' style='display: none;'></input>
        <h5 class="form_title">Mon Profils</h5>
        <div class="form_item">
            <img id='photo'></img>
        </div>
        <div class="form_item d-flex flex-row">
            <h5 class='me-3' id='nom'>nom</h5>
            <h5 id='prenom'>prénom</h5>
        </div>
        <div class="form_item">
            <a id='cv'>Voir CV</a>
        </div>
        <div class="form_item">
            <h5 id='email'>Email</h5>
        </div>
    </div>
</div>

<script>Display_Information_Intervenant();</script>