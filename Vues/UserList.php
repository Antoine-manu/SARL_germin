<?php if(isset($_SESSION['user'])){
        if($_SESSION['user']['role'] =='admin'){?>

            <main class="container">
                        
                        <h2>Gestion utilisateur</h2>
                        <div>
                            <table class="table">
                            <thead >
                                <tr class="table__content">
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th colspan="2">Edition</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php foreach($users as $u) { ?>
                                <tr class="table__content">
                                    <td><?= $u['id'] ?></td>
                                    <td><?= $u['name'] ?></td>
                                    <td><?= $u['surname'] ?></td>
                                    <td><?= $u['email'] ?></td>
                                    <td><?= $u['role'] ?></td>
                                    <td><a href="../index.php?page=users/useredit&id=<?=$u['id'] ?>"><i class="fas fa-edit icon"></i></a></td>
                                    <td><a  href="##" onclick="notif(<?= $u['id'] ?>)"><i class="fas fa-trash icon"></i></a></td>
                                    <div id="<?= $u['id'] ?>" class="deleteconfirm animate__bounceIn animate__animated none">
                                        <h3>Etes vous sûr de vouloir supprimer cet utilisateur ?</h3>
                                        <div class="deleteconfirm__btn">
                                            <a href="../index.php?page=users/delete&id=<?=$u['id'] ?>" class="linkbtn red">Oui</a>
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

