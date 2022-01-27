<div class="container">
        <h2>Créez votre compte</h2>
        <form action="../index.php?page=users/create" method="POST">
            <div class="register">
                <div class="register__content">
                <div>
                    <input type="text" class="input_control" required name="name" placeholder="Prénom">
                </div>
                <div>
                    <input type="text" class="input_control" required name="surname" placeholder="Nom">
                </div>
                <div>
                    <input type="text" class="input_control" required name="email" placeholder="Email">
                </div>
                <div class="input__flex">
                    <input type="password" class="input_control" name="password" required placeholder="Password" id="myInput">
                    <div class="input__flex__btn">
                        <input class="" id="show" type="checkbox" onclick="myFunction()">
                        <label for="show">Show Password</label>
                    </div>
                </div>
                
                </div>
                <div class="register__content" id="app"> 
                    <div>
                        <input @keyup="getapi" v-model="search" class="input_control" name="adress" id="adress"
                            placeholder="Entrez votre Adress" required>
                        <ul v-if="isloading" class="input__list">
                            <li v-for="info in info.features" class="input__list__item">
                                <a v-on:click="adressefunction()" class="input__list__item__link">{{info.properties.label}}</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <input v-model="city" type="text" name="postal_code" class="input_control" id="city" placeholder="Entrez votre ville"
                            required>
                    </div>
                    <div>
                        <input v-model="cp" name="postal_code" type="text" class="input_control" id="pc"
                            placeholder="Entrez votre code postal" required>
                    </div>
                    <div>
                        <input name="phone" type="number" class="input_control" 
                            placeholder="Entrez votre numéro de telephone" required>
                    </div>
            </div>
            </div>
        
        
        <button type="submit" name="submit" class="btn">Créez votre compte</button>
    </form>
    </div>
