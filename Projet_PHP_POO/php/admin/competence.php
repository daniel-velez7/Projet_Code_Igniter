<div class="container_formulaire">
    <div class="formulaire">
        <h5 class="form_title">Ajouter Competence</h5>
        <div class="form_item">
            <label>nom</label>
            <input type="text" name="nom" id="nom">
        </div>
        <button class='btn btn-success button_form' onclick="Add_Competence()">Ajouter</button>
        <div id='status'></div>
    </div>
</div>

<div class="container justify-content-center">
    <div class="container_edit mt-5" id='edit_parent'>
        
    </div>
</div>

<script>
    DisplayTab_Competence();
</script>