<?php
if (isset($_FILES['userFile'])){

    foreach ($_FILES['userFile']['name'] as $key => $value){

        if(($_FILES['userFile']['type'][$key]=='image/jpg' ||
                $_FILES['userFile']['type'][$key]=='image/png' ||
                $_FILES['userFile']['type'][$key]=='image/jpeg' ||
                $_FILES['userFile']['type'][$key]=='image/gif') &&
            $_FILES['userFile']['size'][$key]<=1000000){

            // on peut y aller
            if($_FILES['userFile']['error'][$key]== UPLOAD_ERR_OK){
                $extension = pathinfo($_FILES['userFile']['name'][$key], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' .$extension;
                $_FILES['userFile']['newName'][$key]=$filename;
                $uploads_dir = 'upload';
                $tmp_name = $_FILES["userFile"]["tmp_name"][$key];
                move_uploaded_file($tmp_name, "$uploads_dir/$filename");

            }
        }
        else {
            echo 'les fichiers ne correspondent pas à des images: jpg,png,gif<br>';
        }
    }


    foreach ($_FILES['userFile']['name'] as $key => $value){

        ?><figure class="figure thumb">
             <img src="upload/<?= $_FILES['userFile']['newName'][$key] ?>" alt="Cinque Terre" class="figure-img img-fluid img-thumbnail">
        <figcaption class="figure-caption"> <?= $_FILES['userFile']['name'][$key] ?></figcaption>
        </figure>
        <?php

    }
}