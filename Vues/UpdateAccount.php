

<div class="container">
        <h2>Votre compte</h2>
        <form action="../index.php?page=users/update" method="post">
        <div class="register">
                <div class="register__content">
                    <div>
                        <input type="text" class="input_control white-bg"  required name="name" value="<?= $user->name ?>" placeholder="Prénom">
                    </div>
                    <div>
                        <input type="text" class="input_control white-bg"  required name="surname" value="<?= $user->surname ?>" placeholder="Nom">
                    </div>
                    <div>
                        <input type="text" class="input_control white-bg"  required name="email" value="<?= $user->email ?>" placeholder="Email">
                    </div>
                    <div class="register__links">

                   

                    </div>
                </div>
                <div class="register__content">
                    <div>
                        <input type="number" class="input_control white-bg"  value="<?= $user->phone ?>" name="phone" required placeholder="Numéro de telephone">
                    </div>
                    <div>
                        <input type="text" class="input_control white-bg"  value="<?= $user->adress ?>" name="adress" required placeholder="Adresse">
                    </div>
                    <div>
                        <input type="text" class="input_control white-bg"  value="<?= $user->city ?>" name="city" required placeholder="Ville">
                    </div>
                    <div>
                         <input type="number" class="input_control white-bg"  value="<?= $user->postal_code ?>" name="postal_code" required placeholder="Code postal">
                    </div>
                </div>
            </div>
            <div class="register__links">
                    <div class="">
                        <input type="hidden" name="id" value="<?= $user->id ?>">
                        <button class="btn">Mettre a jour vos informations</button>
                    </div>
            </div>
        </form>
    </div>
