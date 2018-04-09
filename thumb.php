<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 09/04/18
 * Time: 17:50
 */
?>
<div class="container-fluid">
    <h2 class="text-center">Thumbnails</h2>
    <?php
    $it = new FilesystemIterator('upload/');
    foreach ($it as $fileinfo) {

    ?><figure class="figure">
         <img src="upload/<?= $fileinfo->getFilename()?>" alt="Cinque Terre" width="300" class="figure-img img-fluid img-thumbnail">
        <figcaption class="figure-caption"> <?= $fileinfo->getFilename()?></figcaption>
        <form method="GET" action="">
            <input type="hidden" name="deleteImg" value="<?= $fileinfo->getFilename()?>">
            <input type="submit" value="x">
        </form>
        </figure>
        <?php

    }

     ?>