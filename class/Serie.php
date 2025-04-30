<?php

class Serie {

    public function get_clickable_poster(): void {
        ?>
        <a class="image-container" href="index.php">
            <img src=<?= $this->affiche ?>>
        </a>

    <?php
    }  
}
?>