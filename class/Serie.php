<?php

class Serie {

    public function get_clickable_poster(): void {
        ?>
        <a class="image-container" href=<?= "view.php?type=serie&id=$this->idSerie"; ?>>
            <img src=<?= $this->affiche ?>>
            <h1><?= $this->titre ?></h1>
        </a>

    <?php
    }  
}
?>