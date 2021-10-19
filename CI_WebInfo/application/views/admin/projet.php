<div class="container_formulaire">
    <div class="formulaire">
        <h5 class="form_title">Création de Projet</h5>
        <div class="form_item">
            <label>titre</label>
            <input type="text" name="titre" id="titre">
        </div>
        <div class="form_item">
            <label>Date début</label>
            <input type="date" name="date-debut" id="date_debut">
        </div>
        <div class="form_item">
            <label>Date fin</label>
            <input type="date" name="date-fin" id="date_fin">
        </div>
        <button class='btn btn-success button_form' onclick="Add_Projet()">Ajouter</button>
        <div id='status'></div>
    </div>
</div>
<div class="container justify-content-center">
    <div class="container_edit mt-5" id='edit_parent'>
        
    </div>
</div>

<script>DisplayTab_Projet();</script>