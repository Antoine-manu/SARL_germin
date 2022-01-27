<?php if(isset($_SESSION['user'])){
        if($_SESSION['user']['role'] =='admin'){?>

            <main class="container">
                <h2 class="admin__title">Pannel administrateur</h2>
                <div class="admin">
                    <div class="admin__div boxshadow">
                        <img src="../assets/images/gestionuser.svg" alt="">
                        <button class="btn"><a href="index?page=users/userlist" class="light">Gestion utilisateur</a></button>
                    </div> 
                    <div class="admin__div boxshadow">
                        <img src="../assets/images/gestionproduit.svg" alt="">
                        <button class="btn"><a href="index.php?page=product/productlist" class="light">Gestion produits</a></button>
                    </div>
                    <div class="admin__div boxshadow">
                        <img src="../assets/images/creationproduit.svg" alt="">
                        <button class="btn"><a href="index.php?page=product/createproduct" class="light">Creation produits</a></button>
                    </div>
                </div>
            </main>

        <?php } else {
            echo ' here';
} }?>
