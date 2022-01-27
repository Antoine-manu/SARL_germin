<?php if(isset($_SESSION['user'])){
        if($_SESSION['user']['role'] =='admin'){?>

            <div class="container">
                <form action="../index.php?page=product/create" method="post" enctype="multipart/form-data" id="app">
                    <div class="row createproductmain">
                        <div class="">
                            <div>
                                <div class="col">
                                    <label for="fileToUpload" class="imginput" id="LabelImage"><div class="col">
                                        <div class="imageupload">
                                        <img src="../assets/images/imagehere.png" alt="" id="imageTarget">
                                        </div>
                                        <p class="linkbtn">Importer une image</p>
                                    </div></label>
                                    <input type="file" onchange="getimage()" hidden name="photo"  id="fileToUpload">
                                </div>
                            </div>
                            <div class="row">
                                <select id="category" required>
                                    <option value="none" selected="true" disabled="disabled" >Choissiez votre categorie</option>
                                    <?php foreach($category as $c){ ?>
                                            <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <button onclick="notif('categoryadd'),notif('button'),notif('button2')" id="button2" type="button" class="btn"><i class="fas fa-plus"></i></button>
                                <button onclick="notif('categoryadd'),notif('button'),notif('button2')" id="button" type="button" class="btn none"><i class="fas fa-minus"></i></button>
                                
                            </div>
                            <div class="none" id="categoryadd">
                                        <div class="row">
                                            <input type="text" class="form_control " id="categoryinput"  name="name" placeholder="Nom de la category">
                                            <button type="button" onclick="notif('categoryadd'),notif('button'),notif('button2')" id="categoryinputbutton"  class="btn"><i class="fas fa-check"></i></button>
                                        </div>
                                </div>
                            <div class="row">
                                <select name="category_id" id="underCategory" >
                                    <option selected="true" disabled="disabled" >Choissiez votre sous-categorie</option>
                                </select>
                                <button onclick="notif('undercategoryadd'),notif('underCatbutton'),notif('underCatbutton2')" id="underCatbutton2" type="button" class="btn"><i class="fas fa-plus"></i></button>
                                <button onclick="notif('undercategoryadd'),notif('underCatbutton2'),notif('underCatbutton')" id="underCatbutton" type="button" class="btn none"><i class="fas fa-minus"></i></button>
                                
                            </div>
                            <div class="none" id="undercategoryadd">
                                        <div class="row">
                                            <input type="text" class="form_control " id="undercategoryinput"  name="name" placeholder="Nom de la category">
                                            <button type="button" id="undercategoryinputbutton" onclick="notif('undercategoryadd'),notif('underCatbutton2'),notif('underCatbutton')"   class="btn"><i class="fas fa-check"></i></button>
                                        </div>
                                </div>
                        </div>
                        <div class="form_container">
                            <div class="row jc_spaceb">
                                <div class="w45">
                                    <input type="text" class="form_control " required name="title" placeholder="Nom du produit">
                                </div>
                                <div class="w45">
                                <input type="number" class="form_control " step="any" required name="price"  placeholder="Prix">
                                 </div>
                            </div>
                            <div class="row jc_spaceb">
                                <div class="w100">
                                    <input type="text" class="form_control " required name="reference"  placeholder="Référence">
                                 </div>
                            </div>
                            <div>
                                <textarea class="form_control " name="desc" id="" cols="30" required rows="10" placeholder="Description"></textarea>
                            </div>
                            <div>
                                <textarea class="form_control " name="fichetech" id="" cols="30" required rows="10" placeholder="Fiche technique"></textarea>
                            </div>
                           
                        </div>
                    </div>
                    
                    
                    
                    <button type="submit" class="btn w25">Crée le produit</button>
                </form>
            </div>


        <?php } else {
            header('Location : index.php');
            exit();
} }?>
