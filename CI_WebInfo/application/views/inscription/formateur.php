<div class="container_formulaire">
    <form class="formulaire" action="<?= site_url("Formateur/inscription"); ?>" method="post">
        <h5 class="form_title">Formateur inscription</h5>
        <div class="form_item">
            <label>nom</label>
            <input type="text" name="nom" id="nom">
            <?php echo form_error('nom', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form_item">
            <label>prénom</label>
            <input type="text" name="prenom" id="prenom">
            <?php echo form_error('prenom', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form_item">
            <label>cv</label>
            <input type="file" name="cv" id="cv">
            <?php echo form_error('cv', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form_item">
            <label>photo</label>
            <input type="file" name="photo" id="photo">
            <?php echo form_error('photo', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form_item">
            <label>Email</label>
            <input type="email" name="email" id="email">
            <?php echo form_error('email', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form_item">
            <label>Mot de passe</label>
            <input type="password" name="mdp" id="mdp">
            <?php echo form_error('mdp', "<div style='color:red'>", "</div>"); ?>
        </div>
        <button type="submit" class="btn btn-success">Valider inscription</button>
    </form>
</div>