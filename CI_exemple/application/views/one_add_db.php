<div class='d-flex flex-row justify-content-center'>
    <div class="row">
        <div class="col-12 my-5 d-flex justify-content-center">
            <h5>Modifier le produit</h5>
        </div>
        <div class="col-12 my-5">
            <div class="d-flex justify-content-center">
                <form action="<?= site_url('Display/add/') ?>" method="POST">
                    <div class="d-flex flex-column">
                        <div class="my-2">
                            <label for="nom">Nom</label>
                            <?php echo form_input(['name' => 'nom', 'class' => 'form-control', 'value' => set_value('nom')]); ?>
                            <?php echo form_error('nom', "<div style='color:red'>", "</div>"); ?>
                        </div>
                        <div class="my-2">
                            <label for="description">Description</label>
                            <?php echo form_input(['name' => 'description', 'class' => 'form-control', 'value' => set_value('description')]); ?>
                            <?php echo form_error('description', "<div style='color:red'>", "</div>"); ?>
                        </div>
                        <div class="my-2">
                            <label for="prix">Prix</label>
                            <?php echo form_input(['type' => 'number', 'name' => 'prix', 'class' => 'form-control', 'value' => set_value('prix')]); ?>
                            <?php echo form_error('prix', "<div style='color:red'>", "</div>"); ?>
                        </div>
                        <button type="submit" name='btn_add' class='btn btn-success'>Enregistrer le produit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>