<div class="container_formulaire">
    <div class="formulaire">
        <h5 class="form_title">Mon Profils</h5>
        <div class="form_item">
            <label>nom</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div class="form_item">
            <label>prénom</label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div class="form_item">
            <label>téléphone</label>
            <input type="text" name="telephone" id="telephone">
        </div>
        <div class="form_item">
            <label>email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form_item">
            <label>Mot de passe</label>
            <input type="password" name="mdp" id="mdp">
        </div>
        <div class="form_item">
            <label>Adresse</label>
            <input type="text" name="adresse" id="adresse">
        </div>
        <div class="form_item">
            <button class='btn btn-success button_form' onclick='Update_Administrateur()'>Modifier</button>
            <button class='btn btn-danger button_form' onclick='Delete_Administrateur()'>Supprimer</button>
        </div>
        <div id='status'></div>
    </div>
</div>

<script>
    Display_Profils_Administrateur()
</script>