<?php if(isset($_SESSION['user'])){
        if($_SESSION['user']['role'] =='admin'){?>

            <div class="container">
                <form action="../index.php?page=product/update" method="post" enctype="multipart/form-data" id="app">
                    <div class="row createproductmain">
                        <div class="">
                            <div>
                                <div class="col">
                                    <label for="fileToUpload" class="imginput" id="LabelImage"><div class="col">
                                        <div class="imageupload">
                                        <img src="../assets/Upload/<?= $product[0]->reference ?>.<?= $product[0]->photo ?>" alt="" id="imageTarget">
                                        </div>
                                        <p class="linkbtn">Importer une image</p>
                                    </div></label>
                                    <input type="file" onchange="getimage()" hidden name="photo"  id="fileToUpload">
                                </div>
                            </div>
                            <div class="row">
                                <select id="category" required>
                                    <option value="<?= $thiscat[0]->id ?>" selected="true"  ><?= $thiscat[0]->name ?></option>
                                    <?php foreach($allcategory as $c){ 
                                        if($c['id'] != $thiscat[0]->id){?>
                                            <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                                    <?php } }?>
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
                                    <option selected="true" value="<?= $thisundercat[0]->id ?>" ><?= $thisundercat[0]->name ?></option>
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
                                    <input type="text" class="form_control " required name="title" value="<?= $product[0]->title ?>" placeholder="Nom du produit">
                                </div>
                                <div class="w45">
                                <input type="number" class="form_control " required name="price" value="<?= $product[0]->price ?>"  placeholder="Prix">
                                 </div>
                            </div>
                            <div class="row jc_spaceb">
                                <div class="w100">
                                    <input type="text" class="form_control " required name="reference" value="<?= $product[0]->reference ?>"  placeholder="Référence">
                                 </div>
                            </div>
                            <div>
                                <textarea class="form_control " name="desc" id="" cols="30" required rows="10"  placeholder="Description"><?= $product[0]->desc ?></textarea>
                            </div>
                            <div>
                                <textarea class="form_control " name="fichetech" id="" cols="30"  required rows="10" placeholder="Fiche technique"><?= $product[0]->fichetech ?></textarea>
                            </div>
                            <input type="hidden" name="id" value="<?= $product[0]->id ?>">
                            <input type="hidden" name="photo" value="<?= $product[0]->photo ?>">
                           
                        </div>
                    </div>
                    
                    
                    
                    <button type="submit" class="btn w25">Submit</button>
                </form>
            </div>


        <?php } else {
            header('Location : index.php');
            exit();
} }?>
