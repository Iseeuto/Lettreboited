<?php

class Acteur{

    public function get_clickable_poster(): void {
        ?>
        <a class="image-container" href=<?= "view.php?type=acteur&id=$this->idActeur"; ?>>
            <img src=<?= $this->photo ?>>
        </a>

    <?php
    }  
}
?>