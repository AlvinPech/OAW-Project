<?php

$url = $_SERVER['SCRIPT_NAME'];
$cortar = explode('/', $url);
$archivo = $cortar[count($cortar)-1];
$archvioCache = 'cached-'.substr_replace($archivo,'',-4).'html';
$cachetiempo = 18000;

if(file_exists($archvioCache)&&time() - $cachetiempo < filemtime($archvioCache)){
  echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->n";
  readfile($archvioCache);
  exit;
}

ob_start();