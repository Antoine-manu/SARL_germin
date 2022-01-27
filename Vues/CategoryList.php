<?php if(isset($_SESSION['user'])){
        if($_SESSION['user']['role'] =='admin'){?>

            <main class="container">
                <h2>Gestion des categories principales</h2>
                <div>
                    <table class="table">
                    <thead >
                        <tr class="table__content">
                            <th>Id</th>
                            <th>Categorie</th>
                            <th colspan="2">Edition</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php foreach($category as $u) {
                            ?>
                        <tr class="table__content">
                            <td><?= $u['id'] ?></td>
                            <td><?= $u['name'] ?></td>
                            <td><a  href="##" onclick="notif(<?= $u['id'] ?>)"><i class="fas fa-edit icon"></i></a></td>
                                <div id="<?= $u['id'] ?>" class="deleteconfirm animate__bounceIn animate__animated none">
                                    <h3>Que voulais vous changer dans cette categorie ?</h3>
                                    <form method="post" action="../index.php?page=categories/update&id=<?=$u['id'] ?>">
                                    <input type="text" name="name" class="input_control" value="<?=$u['name'] ?>">
                                    <input type="hidden" name="id" value="<?=$u['id'] ?>">
                                    <input type="hidden" name="cat_id" value="">
                                        <div class="deleteconfirm__btn">
                                            <button type="submit" class="btn red">Valider</button>
                                            <a href="" class="linkbtn">Annuler</a>
                                        </div>
                                    </form>
                                </div>
                            <td><a  href="##" onclick="notif(<?= $u['id']+1888888888888 ?>)"><i class="fas fa-trash icon"></i></a></td>
                                <div id="<?= $u['id']+1888888888888 ?>" class="deleteconfirm animate__bounceIn animate__animated none">
                                    <h3>Etes vous sûr de vouloir supprimer ce produit ?</h3>
                                    <div class="deleteconfirm__btn">
                                        <a href="../index.php?page=categories/delete&id=<?=$u['id'] ?>" class="linkbtn red">Oui</a>
                                        <a href="" class="linkbtn">Non</a>
                                    </div>
                                </div>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
                <h2>Gestion des sous-categories</h2>
                <div>
                    <table class="table">
                    <thead >
                        <tr class="table__content">
                            <th>Id</th>
                            <th>Categorie</th>
                            <th>Categorie principales</th>
                            <th colspan="2">Edition</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php foreach($undercategory as $u) {
                            ?>
                        <tr class="table__content">
                            <td><?= $u['id'] ?></td>
                            <td><?= $u['name'] ?></td>
                            <td><?= $u['maincat_name'] ?></td>
                            <td><a  href="##" onclick="notif(<?= $u['id']+90000000000000 ?>)"><i class="fas fa-edit icon"></i></a></td>
                                <div id="<?= $u['id']+90000000000000 ?>" class="deleteconfirm animate__bounceIn animate__animated none">
                                    <h3>Que voulais vous changer dans cette categorie ?</h3>
                                    <form method="post" action="../index.php?page=categories/update&id=<?=$u['id'] ?>">
                                    <input type="text" name="name" class="input_control" value="<?=$u['name'] ?>">
                                    <input type="hidden" name="id" value="<?=$u['id'] ?>">
                                    <select class="select_control" name="cat_id" >
                                        <?php foreach($category as $c){ ?>
                                            <option  value="<?=$c['id'] ?>"><?=$c['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                        <div class="deleteconfirm__btn">
                                            <button type="submit" class="btn red">Valider</button>
                                            <a href="" class="linkbtn">Annuler</a>
                                        </div>
                                    </form>
                                </div>
                            <td><a  href="##" onclick="notif(<?=  $u['id']+100000 ?>)"><i class="fas fa-trash icon"></i></a></td>
                                <div id="<?= $u['id']+100000 ?>" class="deleteconfirm animate__bounceIn animate__animated none">
                                    <h3>Etes vous sûr de vouloir supprimer ce produit ?</h3>
                                    <div class="deleteconfirm__btn">
                                        <a href="../index.php?page=categories/delete&id=<?=$u['id'] ?>" class="linkbtn red">Oui</a>
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

