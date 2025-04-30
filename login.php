
<?php

require_once __DIR__ . "/class/Autoloader.php";
Autoloader::register();


ob_start() ?>


<form >


</form>



<?php $content = ob_get_clean();

Template::render($content);
?>