<main class="container login">

    <?php if($status === true) :  ?>
    <div class="notif alert animate__backInDown animate__animated" role="alert">
        Identifiants incorrects
    </div>
    <?php endif; ?>
        <h3>Déjà client ?</h3>
    <form action="../index.php?page=auth/getAuth" method="POST">
        <div class="login__input">
            <input type="text" class="input_control" name="email" placeholder="Email">
        </div>
        <div class="login__input input__flex">
            <input type="password" class="input_control" name="password" placeholder="Password" id="myInput">
            <div class="input__flex__btn">
                <input class="" id="show" type="checkbox" onclick="myFunction()">
                <label for="show">Show Password</label>
            </div>
        </div>
        <button type="submit" name="submit" class="btn">Connexion</button>
        <div class=" ">
            <h3 class="">Pas encore de compte ?</h3>
            <a class="linkbtn" href="index.php?page=auth/register" >Crée un compte</a>
            
        </div>
    </form>
</main>
