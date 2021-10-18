<div class='d-flex flex-row justify-content-center'>
    <div class="row">
        <div class="col-12 my-5 d-flex justify-content-center">
            <h5>Inscription</h5>
        </div>
        <div class="col-12 my-5">
            <div class="d-flex justify-content-center">
                <form action="<?= site_url('Display/inscription/') ?>" method="POST">
                    <div class="d-flex flex-column">
                        <div class="my-2">
                            <label for="nom">Adresse email</label>
                            <?php echo form_input(['name' => 'email', 'class' => 'form-control', 'value' => set_value('email')]); ?>
                            <?php echo form_error('email', "<div style='color:red'>", "</div>"); ?>
                        </div>
                        <div class="my-2">
                            <label for="password">Mot de passe</label>
                            <?php echo form_input(['type' => 'password', 'name' => 'password', 'class' => 'form-control', 'value' => set_value('password')]); ?>
                            <?php echo form_error('password', "<div style='color:red'>", "</div>"); ?>
                        </div>
                        <button type="submit" name='btn_inscription' class='btn btn-success'>s'inscrire'</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>