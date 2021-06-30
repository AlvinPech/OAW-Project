<?php
$cached = fopen($archvioCache, 'w');
fwrite($cached, ob_get_content());
fclose($cached);
ob_end_flush();