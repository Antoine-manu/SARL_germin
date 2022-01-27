<?php if(isset($_SESSION['user'])){
        if($_SESSION['user']['role'] =='admin'){?>

            <main class="container">
                <div class="row jc_spaceb mauto w75 ai_center">
                <a href="../index.php?page=categories/categorylist" class="linkbtn h50">Gerer les categories</a>
                <h2>Gestion produits</h2>
                <input class="h50" type="search" name="" id="">
                </div>
                <div>
                    <table class="table">
                    <thead >
                        <tr class="table__content">
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Prix</th>
                            <th>Reference</th>
                            <th>Categorie</th>
                            <th colspan="2">Edition</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php foreach($product as $u) { 
                            ?>
                        <tr class="table__content">
                            <td><?= $u['id'] ?></td>
                            <td><?= $u['title'] ?></td>
                            <td><?= $u['price'] ?> €</td>
                            <td><?= $u['reference'] ?></td>
                            <td><?= $u['name'] ?></td>
                            <td><a href="../index.php?page=product/productEdit&id=<?=$u['id'] ?>"><i class="fas fa-edit icon"></i></a></td>
                            <td><a  href="##" onclick="notif(<?= $u['id'] ?>)"><i class="fas fa-trash icon"></i></a></td>
                                <div id="<?= $u['id'] ?>" class="deleteconfirm animate__bounceIn animate__animated none">
                                    <h3>Etes vous sûr de vouloir supprimer ce produit ?</h3>
                                    <div class="deleteconfirm__btn">
                                        <a href="../index.php?page=product/delete&id=<?=$u['id'] ?>" class="linkbtn red">Oui</a>
                                        <a href="" class="linkbtn">Non</a>
                                    </div>
                                </div>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            </main>

        <?php } else {
            header('Location : inder.php');
            exit();
} }?>

