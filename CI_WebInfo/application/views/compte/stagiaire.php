<div class="container_formulaire">
    <form class="formulaire" action="<?= site_url("Stagiaire/compte"); ?>" method="POST">
        <h5 class="form_title">Mon Profils</h5>
        <div class="form_item">
            <label>nom</label>
            <input type="text" name="nom" id="nom" value="<?= $user['nom'] ?>">
        </div>
        <div class="form_item">
            <label>prénom</label>
            <input type="text" name="prenom" id="prenom" value="<?= $user['prenom'] ?>">
        </div>
        <div class="form_item">
            <label>téléphone</label>
            <input type="text" name="telephone" id="telephone" value="<?= $user['telephone'] ?>">
        </div>
        <div class="form_item">
            <label>email</label>
            <input type="email" name="email" id="email" value="<?= $user['email'] ?>">
        </div>
        <div class="form_item">
            <label>Mot de passe</label>
            <input type="password" name="mdp" id="mdp">
        </div>
        <div class="form_item">
            <label>Adresse</label>
            <input type="text" name="adresse" id="adresse" value="<?= $user['adresse'] ?>">
        </div>
        <div class="form-item">
            <button type='submit' class='btn btn-success button_form' name="update">Modifier</button>
            <button type='submit' class='btn btn-danger button_form' name="delete">Supprimer</button>
        </div>
    </form>
</div>

<script>
    Display_Profils_Stagiaire()
</script>