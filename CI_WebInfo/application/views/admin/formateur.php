<div class="container_formulaire">
    <div class="formulaire">
        <h5 class="form_title">Ajouter Formateur</h5>
        <div class="form_item">
            <label>nom</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div class="form_item">
            <label>prénom</label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div class="form_item">
            <label>cv</label>
            <input type="file" name="cv" id="cv">
        </div>
        <div class="form_item">
            <label>photo</label>
            <input type="file" name="photo" id="photo">
        </div>
        <div class="form_item">
            <label>Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form_item">
            <label>Mot de passe</label>
            <input type="password" name="mdp" id="mdp">
        </div>
        <button id='add_button' class='btn btn-success button_form' onclick="Inscription_Formateur('edit')">Valider l'inscription</button>
        <div id='status'></div>
    </div>
</div>


    <div class="container justify-content-center">
        <div class="container mt-5 p-5" id='edit_parent'>
        <h5 class="text-center font-weight-bold">Editer Formateurs:</h5>
        <?php
        for ($i = 0; $i < count($list); $i++) { ?>
            <div class='row'>
                <div class="col  w-100 border text-center"><?= $list[$i]->nom; ?></div>
                <div class="col  w-100 border text-center"><?= $list[$i]->prenom; ?></div>
                <div class="col  w-100 border text-center"><a class="btn btn-primary" href="<?= base_url($list[$i]->cv); ?>">Afficher CV</a></div>
                <div class="col  w-100 border text-center"><img class='img_edit' src="<?= base_url($list[$i]->photo); ?>" alt=""></div>
                <div class="col  w-100 border text-center"><?= $list[$i]->email; ?></div>
                <div class="col  w-100 border text-center"><a class="btn btn-primary" href="<?= site_url('profils/Formation&id=' . $list[$i]->id); ?>">Edit</a></div>
                <div class="col  w-100 border text-center"><a class="btn btn-danger" href="<?= site_url('profils/Formation&id=' . $list[$i]->id); ?>">Delete</a></div>
            </div>
        <?php
        } ?>
         </div>
    </div>
    
  
    <img class='card-img-top' src="<?= base_url($list[$i]->photo); ?>" alt="">