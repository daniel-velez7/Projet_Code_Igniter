<div class="container_formulaire">
    <div class="formulaire">
        <h5 class="form_title">Création de Formation</h5>
        <div class="form_item">
            <label>titre</label>
            <input type="text" name="titre" id="titre">
        </div>
        <div class="form_item">
            <label>description</label>
            <textarea id="description" name="description" placeholder="Donner une description de la formation"></textarea>
        </div>
        <div class="form_item">
            <label>nombre d'heure</label>
            <input type="number" name="nb_heure" id="nb_heure">
        </div>
        <div class="form_item">
            <label>Date début</label>
            <input type="date" name="date-debut" id="date_debut">
        </div>
        <div class="form_item">
            <label>Date fin</label>
            <input type="date" name="date-fin" id="date_fin">
        </div>
        <button class='btn btn-success button_form' onclick="Add_Formation()">Ajouter</button>
        <div id='status'></div>
    </div>
</div>


<div class="container justify-content-center">
    <div class="container_edit mt-5" id='edit_parent'>
        <h5 class="text-center font-weight-bold">Editer Formations:</h5>
        <?php
        for ($i = 0; $i < count($list); $i++) { ?>
            <div class='row'>
                <div class="col  w-100 border text-center"><?= $list[$i]->titre; ?></div>
                <div class="col  w-100 border text-center"><?= $list[$i]->description; ?></div>
                <div class="col  w-100 border text-center"><?= $list[$i]->nb_heure; ?></div>
                <div class="col  w-100 border text-center"><?= $list[$i]->date_debut; ?></div>
                <div class="col  w-100 border text-center"><?= $list[$i]->date_fin; ?></div>
                <div class="col  w-100 border text-center"><a class="btn btn-primary" href="<?= site_url('profils/Formation&id=' . $list[$i]->id); ?>">Add</a></div>
                <div class="col  w-100 border text-center"><a class="btn btn-danger" href="<?= site_url('profils/Formation&id=' . $list[$i]->id); ?>">Delete</a></div>
            </div>
        <?php
        } ?>
    </div>
</div>