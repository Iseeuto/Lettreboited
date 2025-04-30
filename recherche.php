<?php

require_once __DIR__ . "/class/Autoloader.php";
Autoloader::register();

ob_start()?>

<p style="font-size: 1.2em">
    Ce texte a été <b><?php echo "bufferisé" ?></b>
    avant d'être injecté dans mon template.
</p>


<?php $content=ob_get_clean();

Template::render($content);

?>