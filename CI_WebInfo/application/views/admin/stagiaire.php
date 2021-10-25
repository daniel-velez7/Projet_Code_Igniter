<div class="container_formulaire">
    <div class="formulaire">
        <h5 class="form_title">Stagiaire inscription</h5>
        <div class="form_item">
            <label>nom</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div class="form_item">
            <label>prénom</label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div class="form_item">
            <label>téléphone</label>
            <input type="text" name="telephone" id="telephone">
        </div>
        <div class="form_item">
            <label>email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form_item">
            <label>Mot de passe</label>
            <input type="password" name="mdp" id="mdp">
        </div>
        <div class="form_item">
            <label>Adresse</label>
            <input type="text" name="adresse" id="adresse">
        </div>
        <button class='btn btn-success button_form' onclick="Inscription_Stagiaire('edit')">Ajouter</button>
        <div id='status'></div>
    </div>
</div>
<div class="container justify-content-center">
    <div class="container mt-5 p-5" id='edit_parent'>
    <h5 class="text-center font-weight-bold">Editer Stagiaires:</h5>
        <?php
        for ($i = 0; $i < count($list); $i++) { ?>
            <div class='row'>
                <div class="col  w-100 border text-center"><?= $list[$i]->nom; ?></div>
                <div class="col  w-100 border text-center"><?= $list[$i]->prenom; ?></div>
                <div class="col  w-100 border text-center"><?= $list[$i]->telephone; ?></div>
                <div class="col  w-100 border text-center"><?= $list[$i]->email; ?></div>
                <div class="col  w-100 border text-center"><a class="btn btn-primary" href="<?= site_url('profils/Formation&id=' . $list[$i]->id); ?>">Edit</a></div>
                <div class="col  w-100 border text-center"><a class="btn btn-danger" href="<?= site_url('profils/Formation&id=' . $list[$i]->id); ?>">Delete</a></div>
            </div>
        <?php
        } ?>
    </div>
</div>

