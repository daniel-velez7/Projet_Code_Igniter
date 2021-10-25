<div class="container_formulaire">
    <div class="formulaire">

        <h5 class="form_title">Demandes d'admission sur des projets</h5>
        <div class="container justify-content-center">
            <div class="container_edit mt-5" id='edit_parent'>
                <?php 
                
                for ($i = 0; $i < count($list_stagiaire_formation); $i++)
                { ?>

                    <label><?= $list_stagiaire_formation[$i]->nom; ?></label>
                    <label><?= $list_formation[$i]->titre; ?></label>

                <?php }
                
                ?>
                
            </div>
        </div>

    </div>
</div>

<div class="container_formulaire">
    <div class="formulaire">

        <h5 class="form_title">Demandes d'admission sur des formations</h5>
        <div class="container justify-content-center">
            <div class="container_edit mt-5" id='edit_parent2'>

            </div>
        </div>

    </div>
</div>