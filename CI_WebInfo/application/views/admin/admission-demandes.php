<div class="container_formulaire">
    <div class="formulaire">

        <h5 class="form_title">Demandes d'admission sur des formations</h5>
        <div class="container justify-content-center">
            <div class="container_edit mt-5" id='edit_parent'>
                <?php

                for ($i = 0; $i < count($list_stagiaire_formation); $i++) { ?>
                    <div class="row">

                        <div class="col  w-100 border text-center"><?= $list_stagiaire_formation[$i]->nom; ?></div>
                        <div class="col  w-100 border text-center"><?= $list_formation[$i]->titre; ?></div>
                        <div class="col  w-100 border text-center"><?= $list_motivation_formation[$i]; ?></div>
                        <div class="col w-100 border text-center"><a class="btn btn-primary" href="#">Accepter</a></div>
                        <div class="col w-100 border text-center"><a class="btn btn-danger" href="#">Refuser</a></div>
                    </div>

                <?php }

                ?>

            </div>
        </div>

    </div>
</div>

<div class="container_formulaire">
    <div class="formulaire">

        <h5 class="form_title">Demandes d'admission sur des projets</h5>
        <div class="container justify-content-center">
            <div class="container_edit mt-5" id='edit_parent2'>
                <?php

                for ($i = 0; $i < count($list_stagiaire_projet); $i++) { ?>
                    <div class="row">

                        <div class="col  w-100 border text-center"><?= $list_stagiaire_projet[$i]->nom; ?></div>
                        <div class="col  w-100 border text-center"><?= $list_projet[$i]->nom; ?></div>
                        <div class="col  w-100 border text-center"><?= $list_motivation_projet[$i]; ?></div>
                        <div class="col w-100 border text-center"><a class="btn btn-primary" href="#">Accepter</a></div>
                        <div class="col w-100 border text-center"><a class="btn btn-danger" href="#">Refuser</a></div>
                    </div>

                <?php }

                ?>
            </div>
        </div>

    </div>
</div>