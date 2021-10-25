<div class="container_formulaire">
    <div class="formulaire">
        <h5 class="form_title">Ajouter Specialisation</h5>
        <div class="form_item">
            <label>Competence</label>
            <select id="competence">
            </select>
        </div>
        <div class="form_item">
            <label>nom</label>
            <input type="text" name="nom" id="nom">
        </div>
        <button class='btn btn-success button_form' onclick="Add_Specialisation()">Ajouter</button>
        <div id='status'></div>
    </div>
</div>

<div class="container justify-content-center">
    <div class="container_edit mt-5" id='edit_parent'>
    <h5 class="text-center font-weight-bold">Editer Specialisation:</h5>
        <?php
        for ($i = 0; $i < count($list); $i++) { ?>
            <div class='row'>
                <div class="col  w-100 border text-center"><?= $list[$i]->nom; ?></div>
                <div class="col  w-100 border text-center"><a class="btn btn-primary" href="<?= site_url('profils/Formation&id=' . $list[$i]->id); ?>">Modifier</a></div>
                <div class="col  w-100 border text-center"><a class="btn btn-danger" href="<?= site_url('profils/Formation&id=' . $list[$i]->id); ?>">Delete</a></div>
            </div>
        <?php
        } ?>
    </div>
</div>
