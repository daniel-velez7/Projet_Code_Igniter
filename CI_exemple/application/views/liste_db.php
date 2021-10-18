


<div class='d-flex flex-row justify-content-center'>
    <div class="row">
        <div class="col-12 my-5 d-flex justify-content-center">
            <h5>Bienvenue sur la page du marcher de toulouse matabio</h5>
        </div>
        <div class="col-12 my-5">
            <div class="d-flex flex-column align-items-center">
                <p> Voici la liste des produits disponible : <br> </p>
                <?php
                if (isset($produits)) {
                    $countProduits = count($produits);
                    if ($countProduits > 0) {
                        foreach ($produits as $row) {
                            echo ('<div class="d-flex flex-row my-2">');
                                echo ('<h5 style="width: 100px;">' . $row->nom . '</h5>');
                                echo ('<a class="btn btn-success" href="' . site_url('Display/liste_one/' . $row->id) . '">Modifier l\'article</a>');
                            echo ('</div>');
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>