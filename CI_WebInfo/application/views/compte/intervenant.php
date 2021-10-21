<div class="container_formulaire">
    <div class="formulaire">
        <h5 class="form_title">Mon Profils</h5>
        <div class="form_item">
            <label>nom</label>
            <input type="text" name="nom" id="nom"  value="<?= $user['nom']?>">
        </div>
        <div class="form_item">
            <label>prénom</label>
            <input type="text" name="prenom" id="prenom"  value="<?= $user['prenom']?>">
        </div>
        <div class="form_item">
            <label>cv</label>
            <input type="file" name="cv" id="cv"  value="<?= $user['cv']?>">
        </div>
        <div class="form_item">
            <label>photo</label>
            <input type="file" name="photo" id="photo"  value="<?= $user['photo']?>">
        </div>
        <div class="form_item">
            <label>Email</label>
            <input type="email" name="email" id="email"  value="<?= $user['email']?>">
        </div>
        <div class="form_item">
            <label>Mot de passe</label>
            <input type="password" name="mdp" id="mdp">
        </div>

        <div class="form_item">
            <button class='btn btn-success button_form' onclick='UpdateAccount_Intervenant()'>Modifier</button>
            <button class='btn btn-danger button_form' onclick='DeleteAccount_Intervenant()'>Supprimer</button>
        </div>
        <div id='status'></div>
    </div>
</div>

<div class="container_formulaire">
    <div class="formulaire">
        <h5 class="form_title">Ajouter Competence et Specialisation</h5>
        <div class="form_item">
            <label>Competence</label>
            <select id="competence">
            </select>
        </div>
        <div class="form_item">
            <label>Specialisation</label>
            <select id="specialisation">
            </select>
        </div>
        
        <button class='btn btn-success button_form' onclick="Add_Specialisation_Intervenant()">Ajouter</button>
        <div id='status'></div>
    </div>
</div>

<div class="container justify-content-center">
    <div class="container_edit mt-5" id='edit_parent'>
        
    </div>
</div>

<script>
    Display_Profils_Intervenant();
    Add_Option_Competences_Intervenant();
    DisplayTab_Specialisation_Intervenant();
</script>