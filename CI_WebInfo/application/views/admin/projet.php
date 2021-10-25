<div class="container_formulaire">
    <div class="formulaire">
        <h5 class="form_title">Création de Projet</h5>
        <div class="form_item">
            <label>titre</label>
            <input type="text" name="titre" id="titre">
        </div>
        <div class="form_item">
            <label>Date début</label>
            <input type="date" name="date-debut" id="date_debut">
        </div>
        <div class="form_item">
            <label>Date fin</label>
            <input type="date" name="date-fin" id="date_fin">
        </div>
        <button class='btn btn-success button_form' onclick="Add_Projet()">Ajouter</button>
        <div id='status'></div>
    </div>
</div>
<div class="container justify-content-center">
    <div class="container_edit mt-5" id='edit_parent'>
        <h5 class="text-center font-weight-bold">Editer Projets:</h5>
        <?php
        for ($i = 0; $i < count($list); $i++) { ?>
            <div class='row'>
                <div class="col  w-100 border text-center"><?= $list[$i]->nom; ?></div>
                <div class="col  w-100 border text-center"><?= $list[$i]->date_debut; ?></div>
                <div class="col  w-100 border text-center"><?= $list[$i]->date_fin; ?></div>
                <div class="col  w-100 border text-center"><a class="btn btn-primary" href="<?= site_url('profils/Formation&id=' . $list[$i]->id); ?>">Add</a></div>
                <div class="col  w-100 border text-center"><a class="btn btn-danger" href="<?= site_url('profils/Formation&id=' . $list[$i]->id); ?>">Delete</a></div>
            </div>
        <?php
        } ?>
    </div>
</div>