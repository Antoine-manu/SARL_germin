<div class="container">
        <h2>Votre compte</h2>
        <div class="register">
                <div class="register__content">
                    <div>
                        <input type="text" class="input_control white-bg" disabled required name="name" value="<?= $user->name ?>" placeholder="Prénom">
                    </div>
                    <div>
                        <input type="text" class="input_control white-bg" disabled required name="surname" value="<?= $user->surname ?>" placeholder="Nom">
                    </div>
                    <div>
                        <input type="text" class="input_control white-bg" disabled required name="email" value="<?= $user->email ?>" placeholder="Email">
                    </div>
                    <div class="register__links">

                    

                    </div>
                </div>
                <div class="register__content">
                    <div>
                        <input type="number" class="input_control white-bg" disabled value="<?= $user->phone ?>" name="phone" required placeholder="Numéro de telephone">
                    </div>
                    <div>
                        <input type="text" class="input_control white-bg" disabled value="<?= $user->adress ?>" name="adress" required placeholder="Adresse">
                    </div>
                    <div>
                        <input type="text" class="input_control white-bg" disabled value="<?= $user->city ?>" name="city" required placeholder="Ville">
                    </div>
                    <div>
                         <input type="number" class="input_control white-bg" disabled value="<?= $user->postal_code ?>" name="postal_code" required placeholder="Code postal">
                    </div>
                </div>
            </div>
            <div class="register__links">
                    <div class="register__links__div">
                        <input type="hidden" name="id" value="<?= $user->id ?>">
                        <a href="../index.php?page=auth/UpdateAccount" class="linkbtn register__links__btn">Mettre a jour vos informations</a>
                        <a href="../index.php?page=auth/logout" id="logout" class="linkbtn red">Se deconnecter</a>
                    </div>
            </div>
    </div>
