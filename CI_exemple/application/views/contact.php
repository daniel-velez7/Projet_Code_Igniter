<div class='d-flex flex-row justify-content-center'>
    <div class="row">
        <div class="col-12 my-5 d-flex justify-content-center">
            <h5>Bienvenue sur la page de contact</h5>
        </div>
        <div class="col-12 my-5">
            <div class="d-flex justify-content-center body-size">
                <?php echo form_open('', ['action' => '' . site_url('Display/contact/') . '','method' => 'post','name' => 'insertdata', 'autocomplete' => 'off']); ?>
                <div class="form-group mb-3">
                    <label for="nom">Nom</label>
                    <?php echo form_input(['name' => 'firstname', 'class' => 'form-control', 'value' => set_value('firstname')]); ?>
                    <?php echo form_error('firstname', "<div style='color:red'>", "</div>"); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="prenom">Prenom</label>
                    <?php echo form_input(['name' => 'lastname', 'class' => 'form-control', 'value' => set_value('lastname')]); ?>
                    <?php echo form_error('lastname', "<div style='color:red'>", "</div>"); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <?php echo form_input(['type' => 'email','name' => 'email', 'class' => 'form-control', 'value' => set_value('email')]); ?>
                    <?php echo form_error('email', "<div style='color:red'>", "</div>"); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="gender">homme</label>
                    <?php echo form_radio('gender', 'accept', TRUE, ['value' => set_value('gender')]); ?>
                    <label for="gender">femme</label>
                    <?php echo form_radio('gender', 'accept', FALSE, ['value' => set_value('gender')]); ?>
                    <?php echo form_error('gender', "<div style='color:red'>", "</div>"); ?>
                </div>
                <div class="form-group mb-3">
                    <label for="color">Couleur</label>
                    <?php $options = array(
                        'rouge'         => 'rouge',
                        'bleu'           => 'bleu',
                        'jaune'         => 'jaune',
                        'vert'        => 'vert',
                    ); ?>
                    <?php echo form_dropdown('color', $options, set_value('color')); ?>
                    <?php echo form_error('color', "<div style='color:red'>", "</div>"); ?>
                </div>
                <?php echo form_submit(['name' => 'btn', 'class' => 'btn btn-primary', 'value' => 'Envoyer']); ?>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>