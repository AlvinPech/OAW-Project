<?php

$url = $_POST["linkUrl"];
$feedName = $_POST["feedName"];
$channel_id = md5($url);


$estado = "";

$mysqli = new mysqli('localhost', 'root', 'root', 'rss');
if(!$mysqli){
    $estado = "No se pudo realizar la conexión PHP - Mysql";
}
else{

  $item_exists_sql = "select channel_id from channels where channel_id = '" . $channel_id . "'";
  $resultado = $mysqli->query($item_exists_sql);

  if ($resultado->num_rows < 1 && $url != "" && $feedName != "") {
    $sql = "insert into channels(channel_id, channel_name, url) values('$channel_id', '$feedName', '$url')";
    $resultado = $mysqli->query($sql);
    if($resultado){
        $estado = "Los datos del articulo se registraron con éxito";
    }
    else{
        $estado = "Los datos del articulo no se pudieron registrar";
    }

  }

$mysqli->close();
}


 ?>
