<div class="container_formulaire">
    <form class="formulaire" action="<?= site_url("Formateur/connection"); ?>" method="post">
        <h5 class="form_title">Connection</h5>
        <div class="form_item">
            <label>email</label>
            <input type="email" name="email" id="email">
            <?php echo form_error('email', "<div style='color:red'>", "</div>"); ?>
        </div>
        <div class="form_item">
            <label>Mot de passe</label>
            <input type="password" name="password" id="password">
            <?php echo form_error('password', "<div style='color:red'>", "</div>"); ?>
        </div>
        <button class='btn btn-success button_form' type="submit">Se connecter</button>
    </form>
</div>