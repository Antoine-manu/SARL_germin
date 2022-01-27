<?php 

use App\Models\Categories;

$category = new Categories;
$allCategory = $category->getCat();
$underCategory = $category->getUnderCat();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body >
    <header>
        <nav class="nav">
                <img class="nav__logo" src="../assets/images/logo.png" alt="">
                <div class="nav__content">
                    <?php if(isset($_SESSION['user'])){
                        if($_SESSION['user']['role'] =='admin'){
                        ?>
                        <ul class="nav__content__list__alt">
                            <li class="nav__content__list__item">
                                <a class="nav__content__list__item__link" aria-current="page" href="../index.php?page=Main/pannel">Administrateur</a>
                            </li>
                            <?php } else { ?>
                            <ul class="nav__content__list">
                        <?php } ?>
                            <?php } else { ?>
                            <ul class="nav__content__list">
                        <?php } ?>
                        <li class="nav__content__list__item">
                            <a class="nav__content__list__item__link" aria-current="page" href="../index.php">Accueil</a>
                        </li>
                        <li class="nav__content__list__item">
                            <a href="../index.php?page=product/catalogue" class="nav__content__list__item__link" aria-current="page">Catalogue</a>
                            <ul class="dropdown">
                                <?php foreach($allCategory as $c){ ?>
                                        <li class="dropdown__item">
                                        <a href="../index.php?page=product/catalogue&id=<?= $c['id'] ; ?>"><?= $c['name'] ; ?>  </a>                                          
                                        <ul class="dropdown__item__list">
                                        <?php   foreach($underCategory as $uc) {
                                                 if( $uc['cat_id']==$c['id']) {?>
                                            <li class="dropdown__item__list__item"><a href="../index.php?page=product/catalogue&id=<?= $uc['id'] ; ?>"><?= $uc['name'] ?></a></li>
                                            <?php } }?>
                                        </li>
                                        <?php }?>
                                    </ul>
                            </ul>
                        </li>
                        <li class="nav__content__list__item">
                            <a class="nav__content__list__item__link" href="../index.php?page=Main/About" aria-current="page" href="adminpannel.php">A propos</a>
                        </li>
                    </ul>
                    <?php if(isset ($_SESSION['user'])){ 

                        
                        ?>
                        <span class="nav__content__link">
                                <a class="" href="../index.php?page=auth/account">Bonjour <?= $_SESSION['user']['name'] ?></a>   
                        </span>
                    <?php } else { ?>
                        <span class="nav__content__link">
                                <a class="" href="../index.php?page=auth/login">Connexion</a>   
                        </span>
                    <?php } ?>
                    
                </div>
        </nav>
        <nav class="navalternative">
                <img class="navalternative__logo" id="logo" src="../assets/images/logo.png" alt="">
                <div class="navalternative__content none" id="displaymenu">
                    <?php if(isset($_SESSION['user'])){
                        if($_SESSION['user']['role'] =='admin'){
                        ?>
                        <ul class="navalternative__content__list__alt">
                            <li class="navalternative__content__list__item">
                                <a class="navalternative__content__list__item__link" aria-current="page" href="../index.php?page=Main/pannel">Pannel administrateur</a>
                            </li>
                            <?php } else { ?>
                            <ul class="navalternative__content__list">
                        <?php } ?>
                            <?php } else { ?>
                            <ul class="navalternative__content__list">
                        <?php } ?>
                        <li class="navalternative__content__list__item">
                            <a class="navalternative__content__list__item__link" aria-current="page" href="../index.php">Accueil</a>
                        </li>
                        <li class="navalternative__content__list__item">
                            <a class="navalternative__content__list__item__link" aria-current="page" href="adminpannel.php">Catalogue</a>
                            
                        </li>
                        <li class="navalternative__content__list__item">
                            <a class="navalternative__content__list__item__link" aria-current="page" href="adminpannel.php">A propos</a>
                        </li>
                        <?php if(isset ($_SESSION['user'])){  ?>
                        <li class="navalternative__content__list__item">
                        <span class="navalternative__content__link">
                                <a class="" href="../index.php?page=auth/account">Bonjour <?= $_SESSION['user']['name'] ?></a>   
                        </span>
                        </li>
                        <?php } else { ?>
                        <li class="navalternative__content__list__item">
                        <span class="navalternative__content__link">
                                <a class="" href="../index.php?page=auth/login">Connexion</a>   
                        </span>
                        </li>
                        <?php } ?>

                    </ul>
                    
                </div>
        </nav>
    </header>

<?php echo $content; ?>


    </body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="/assets/js/script.js"></script>
<script src="/assets/js/formulaire.js"></script>
<script src="/assets/js/categoryajax.js"></script>
</html>