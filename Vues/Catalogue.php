

    <?php if(isset($all)){ ?>
        <main class="catalogue_display2">
            <section class="catalogue">
                    <div class="catalogue__category">
                    <?php foreach($category as $c){ ?>
                        <div class="catalogue__category__card">
                            <a href="../index.php?page=product/catalogue&id=<?= $c['id'] ; ?>"><img class="catalogue__category__card__image" src="../assets/images/cat/<?= $c['name'] ?>.png" alt=""></a>
                            <h2 class="catalogue__category__card__title"><a href="../index.php?page=product/catalogue&id=<?= $c['id'] ; ?>"><?= $c['name'] ?></a></h2>
                        </div>
                    <?php }?>
                    </div>
            </section>
        </main>
    <?php } else { ?>
        <main class="catalogue_display">
                <nav class="sidenav">
                    <div class="sidenav__div">
                        <ul class="sidenav__div__list">
                            <li class="sidenav__div__list__item">Tri par prix :
                                <ul class="sidenav__div__list__item__list">
                                    <li>Croissant</li>
                                    <li>Decroissant</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <section class="catalogue">
                    <div class="catalogue__content">
                    <?php if($product==null){ ?>
                        
                        <?php foreach($ProductArray as $ap){ ?>
                        <div class="catalogue__content__card">
                            <a href="../index.php?page=product/singleProduct&id=<?= $ap->id ?>"><img class="catalogue__content__card__image" src="../assets/Upload/<?= $ap->reference?>.<?=$ap->photo ?>" alt=""></a>
                            <h2 class="catalogue__content__card__title"><a href="../index.php?page=product/singleProduct&id=<?= $ap->id ?>"><?= $ap->title ?></a></h2>
                        </div>
                        <?php }?> 
            <?php } else {?>
                
                    <?php foreach($product as $p){?>
                        <div class="catalogue__content__card">
                            <a href="../index.php?page=product/singleProduct&id=<?= $p->id ?>"><img class="catalogue__content__card__image" src="../assets/Upload/<?= $p->reference?>.<?=$p->photo ?>" alt=""></a>
                            <h2 class="catalogue__content__card__title"><a href="../index.php?page=product/singleProduct&id=<?= $p->id ?>"><?= $p->title ?></a></h2>
                        </div>
                    <?php }} ?>
                </div>
            </section>
            </main>
    <?php } ?>
        
   