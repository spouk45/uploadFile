
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php


// -------- supression de fichier ----------
if(isset($_GET['deleteImg'])){
    if(file_exists('upload/'.$_GET['deleteImg'])){
        unlink('upload/'.$_GET['deleteImg']);
    }
    else{
        echo 'le fichier : '.$_GET['deleteImg'].'n\'existe pas.';
    }
}

// ----------- upload de  fichiers ------------
if (isset($_FILES['userFile'])){
    ?><pre><?php print_r($_FILES);?></pre><?php
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

                $uploads_dir = 'upload';
                $tmp_name = $_FILES["userFile"]["tmp_name"][$key];
                move_uploaded_file($tmp_name, "$uploads_dir/$filename");

            }
        }
        else {
            echo 'les fichiers ne correspondent pas à des images: jpg,png,gif<br>';
        }
    }
}


?>


<!--
    <h2>Upload des fichiers</h2>
    <form action="" enctype="multipart/form-data" method="POST" name="myForm">
        <div class="form-group">
            <label for="files">Images:</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
            <input type="file" multiple="multiple" class="" id="userFile" name="userFile[]">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
-->

<div class="container-fluid">
    <div class="contr"><h2>Glissez - déposez vos fichiers dans la «&#160;zone de drop&#160;» (maximum cinq fichiers - taille maximale par fichier 1Mo)</h2></div>
    <div class="upload_form_cont row">
        <div id="dropArea" class="col-3 offset-1">Zone de drop</div>
        <div class="info col-7">

            <div>Fichiers restants : <span id="count">0</span></div>
            <div><input type="hidden" id="url" value="show.php"/></div>
            <canvas width="500" height="20"></canvas>
            <h2>Résultat :</h2>
            <div id="result"></div>

        </div>
    </div>
</div>
<section>
    <?php include 'thumb.php';?>
</section>



</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>