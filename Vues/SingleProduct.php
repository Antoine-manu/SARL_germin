<main class="product">
        <div class="product_content">
            <div class="product_content_div">
                <img src="../assets/Upload/<?= $product[0]->reference ?>.<?= $product[0]->photo ?>" alt="">
            </div>
            <div class="product_content_div">
                <h2 class="product_content_div__title"><?= $product[0]->title ?></h2>
                <div class="product_content_div__table">
                    <ul class="product_content_div__table__title">
                        <li class="tar"><a  href="#" onclick="showdesc()">Description</a></li>
                        <li><a href="#" onclick="showft()">Fiche technique</a></li>
                    </ul>
                    <div class="product_content_div__table__content" id="fiche1"><p><?= $product[0]->desc ?></p></div>
                    <div class="product_content_div__table__content none" id="fiche2"><p><?= $product[0]->fichetech ?></p></div>
                </div>
                <p class="product_content_div__price">Prix : <?= $product[0]->price ?> € </p>
            </div>
        </div>
</main>