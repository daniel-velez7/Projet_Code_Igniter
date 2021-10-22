<div class="container justify-content-center">
    <div class="container_search mt-5 flex-wrap" id='search_parent' style='height: auto;'>
        
    <?php
        for  ($i = 0; $i < count($list); $i++) { ?>
            <div class='card m-3' style='width: 18rem;'>
                <img class='card-img-top' src="<?= base_url($list[$i]->photo); ?>" alt="">
                <div class='card-body justify-content-center text-center'>
                    <h5 class="card-title"><?= $list[$i]->prenom . ' ' . $list[$i]->nom; ?></h5>
                    <a class="btn btn-primary" href="<?= site_url('profils/Intervenant&id='. $list[$i]->id); ?>">Voir Profils</a>
                </div>
            </div>
        <?php
        } ?>

    </div>
</div>