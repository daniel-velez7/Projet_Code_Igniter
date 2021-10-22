<div class="container justify-content-center">
    <div class="container_search mt-5 flex-wrap" id='search_parent' style='height: auto;'>

        <?php
        for  ($i = 0; $i < count($list); $i++) { ?>
            <div class='card m-3' style='width: 18rem;'>
                <div class='card-body justify-content-center text-center'>
                    <h5 class="card-title"><?= $list[$i]->nom; ?></h5>
                    <div>Date debut: <?= $list[$i]->date_debut; ?></div>
                    <div>Date Fin: <?= $list[$i]->date_fin; ?></div>
                    <a class="btn btn-primary" href="<?= site_url('profils/Projet&id='. $list[$i]->id); ?>">S'inscrire</a>
                </div>
            </div>
        <?php
        } ?>

    </div>
</div>