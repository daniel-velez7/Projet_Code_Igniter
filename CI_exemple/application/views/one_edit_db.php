<div class='d-flex flex-row justify-content-center'>
    <div class="row">
        <div class="col-12 my-5 d-flex justify-content-center">
            <h5>Modifier le produit</h5>
        </div>
        <div class="col-12 my-5">
            <div class="d-flex justify-content-center">
                <?php
                if (isset($produit)) { ?>
                    <?php echo form_open('', ['action' => '' . site_url('Display/liste_one/' . $produit->id) . '', 'method' => 'post', 'name' => 'insertdata', 'autocomplete' => 'off']); ?>
                    <div class="d-flex flex-column">
                        <div class="my-2">
                            <label for="nom">Nom</label>
                            <?php echo form_input(['name' => 'nom', 'class' => 'form-control', 'value' =>  $produit->nom]); ?>
                            <?php echo form_error('nom', "<div style='color:red'>", "</div>"); ?>
                        </div>
                        <div class="my-2">
                            <label for="description">Description</label>
                            <?php echo form_input(['name' => 'description', 'class' => 'form-control', 'value' =>  $produit->description]); ?>
                            <?php echo form_error('description', "<div style='color:red'>", "</div>"); ?>
                        </div>
                        <div class="my-2">
                            <label for="prix">Prix</label>
                            <?php echo form_input(['type' => 'number','name' => 'prix', 'class' => 'form-control', 'value' =>  $produit->prix]); ?>
                            <?php echo form_error('prix', "<div style='color:red'>", "</div>"); ?>
                        </div>
                        <?php echo form_input(['type' => 'hidden', 'name' => 'id', 'class' => 'form-control', 'value' =>  $produit->id]); ?>
                        <div class="my-2">
                            <?php echo form_submit(['name' => 'btn_update', 'class' => 'btn btn-success', 'value' => 'Validez les modifications']); ?>
                            <?php echo form_submit(['name' => 'btn_delete', 'class' => 'btn btn-danger', 'value' => 'Supprimer le produits']); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>