<?php
session_start();
 ?>

<!DOCTYPE html>

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



//function




  //get_declared_classes
  class Foo {
    public static $staticProperty;

    public $property;
    protected $privateProperty;
  }

  $reflectionClass = new ReflectionClass('Foo');
  $foo = new Foo;
  $reflectionProperty = $reflectionClass->getProperty('privateProperty');
  $reflectionProperty->setAccessible(true);
  $var = "";



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link  rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Raleway:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="jquery-3.6.0.min.js"></script>

</head>


<body>

    <div class="contenedor">
        <div class="header">
           <div class="titulo">
            <h1 >
           NOTICIAS
            </h1>
           </div>

        </div>

        <div class="cuerpo">
    <div class="br-menu" id="br-menu">

 <div class="card">
  <div class="card-header">
  <h3 style="text-align: center;">Secciones</h3>
</div></br>

<?php

    $mysqli = new mysqli('localhost', 'root', 'root', 'rss');
    if(!$mysqli){
        $estado = "No se pudo realizar la conexión PHP - Mysql";
    }
    else{

        $sql = "select * from channels";

        $resultado = $mysqli->query($sql);


        if($resultado->num_rows > 0){

          while ($values = $resultado->fetch_array()) {?>
            <div class="">
              <form action="index.php" method="post">
                <input type="hidden" name="varname" value="<?= $values['url'] ?>">
                <button style="width:100%;height:30px;" type="submit" name="button"><?php echo $values['channel_name']; ?></button>
              </form>
            </div>
            <?php
          }
        }
        else{
            $estado = "No existen contenidos con los datos capturados";
        }

        $mysqli->close();
  }


  if(array_key_exists('varname', $_POST)) {
      button1($_POST['varname']);
  }

  function button1($currentURL) {
    $_SESSION['saludo']=$currentURL;
  }


 ?>




</div><div class="sc"> </br> </div>

<button  type="button"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn btn-dark">Añadir <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></button>

      <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
  <div id="toast1" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
    <div class="toast-header">
      <img src="img/msj.png" class="rounded mr-2" alt="mensaje" style="width: 40px;">
      <strong class="mr-auto">Mensaje</strong>
      <small style="margin-left: 10px;">ahora</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Se añadio correctamente.
    </div>
  </div>
</div>



</div>

                <div class="info" id="informacion">

                <div class="buscador">
                    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">

              <h3>Lo más nuevo</h3>

          <form class="d-flex" action="index.php" method="post">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" id="search" name="search">
       <button type="submit" class="btn btn-outline-primary">Buscar</button>
     <div class="sp"></div>
         <button type="button" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
</svg></button>
      <div class="sp"></div>
      <!--  botón para ordenar--->
      <div class="dropdown" style="margin-left: 3px;">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Ordenar
      </button>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="index.php?ordenar=postDate">Por fecha</a>
      <a class="dropdown-item" href="index.php?ordenar=title">Por título</a>
      <a class="dropdown-item" href="index.php?ordenar=description">Por contenido</a>
      </div>
      </div>

      </form>

</nav>
                </div>


                <?php
                //conexion a la base de datos
                $estado = "";


                $url = $_POST['varname'];
                if ($url != "") {
                  // code...
                }else {

                  $url = $_SESSION['saludo'];
                }



                //parse the feed to php code
                $invalidUrl = false;
                if (@simplexml_load_file($url)) {
                  $feeds = simplexml_load_file($url);
                }else {
                  $invalidUrl = true;
                  echo "Invalid URL RSS";
                }

                $i = 0;
                if (!empty($feeds)) {
                  $site = $feeds->channel->title;
                  $siteLink = $feeds->channel->link;

                  echo "<h1>$site</h1>";

                  function get_first_image_url($html, $item)
              {

                  $e_content = $item->children("media", true);
                  $e_encoded = (string)$e_content->content[0]['url'];

                    if ($e_encoded > 0) {
                      return $e_encoded;
                    } else if ($item->enclosure[0]['url']) {
                      return $item->enclosure[0]['url'];
                    }else if (preg_match('/<img.+?src="(.+?)"/', $html, $matches)){
                      return $matches[1];
                    }


              }


                  foreach ($feeds->channel->item as $item) {
                    $item_id = md5($item->title);
                    $title = $item->title;
                    $link = $item->link;
                    $description = $item->description;
                    $postDate = $item->pubDate;
                    $pubDate = date("Y-m-j G:i:s", strtotime($postDate));
                    //$e_pubDate     = (string)$item->pubDate;
                    //<?= implode(" ", array_slice(explode(' ', $e_encoded), 0,20))
                    $e_content = $item->children("content", true);
                    $e_encoded = (string)$e_content->encoded;
                    //console_log($e_encoded);
                    //var_dump($item->children("content", true)->encoded);
                    //$enclosure = $item->enclosure[0]['url'];
                    $category = $item->category;
                    $enclosure = get_first_image_url($e_content, $item);
                    $r_desc = strstr($description, chr(10), true);
                    //echo $domain;
                    //echo "<script>console.log($e_encoded);</script>";


                    //abrimos sql
                    $mysqli = new mysqli('localhost', 'root', 'root', 'rss');
                    if(!$mysqli){
                        $estado = "No se pudo realizar la conexión PHP - Mysql";
                    }
                    else{
                    //comprobamos que no exista el $item
                    $item_exists_sql = "select item_id from contenido where item_id = '" . $item_id . "'";
                    $resultado = $mysqli->query($item_exists_sql);

                    if ($resultado->num_rows < 1) {
                      $sql = "insert into contenido(item_id, title, link, description, postDate, encoded, category, enclosure, channel_url) values('$item_id', '$title', '$link', '$r_desc', '$pubDate', '$e_encoded', '$category','$enclosure', '$url')";
                      $resultado = $mysqli->query($sql);
                      if($resultado){
                          $estado = "Los datos del articulo se registraron con éxito";
                      }
                      else{
                          $estado = "Los datos del articulo no se pudieron registrar";
                      }
                      $mysqli->close();
                    }
                  }

                }
                }else {
                if (!$invalidUrl) {
                  echo "No item found";
                }
                }

//Imprimimos todo el contenido del link
$mysqli = new mysqli('localhost', 'root', 'root', 'rss');

if(!$mysqli){
    $estado = "No se pudo realizar la conexión PHP - Mysql";
}
else{
  //comprobamos si no se ha realizado una busqueda
    $busqueda = $_POST['search'];
    $sql = "select * from contenido where channel_url = '". $url. "'";

    if($busqueda != ""){
      $sql = "select * from contenido where title like '%$busqueda%' or encoded like  '%$busqueda%' and channel_url = '". $url. "'";
    }

    //comprobamos como se requiere Ordenar
    $orden = $_GET['ordenar'];
    if($orden != ""){
      $sql .=  " order by ".$orden." desc";
    }else {
      $sql .= " order by postDate desc";
    }
    //echo $sql;

    $resultado = $mysqli->query($sql);

    if($resultado->num_rows > 0){

      while ($values = $resultado->fetch_array()) {

          ?>
          <div class="card mb-3" style="max-width: 100%; ">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?php echo $values['enclosure']; ?>" alt="AMLOs" class="img_inner">
              </div>
              <div class="col-md-8">
                <div class="card-body">

                  <h5 class="card-title"><?php echo '<a href="'.$values['link'].'">'.$values['title'].'</a>' ?></h5>
                  <p class="card-text"><small class="text-muted"><?php echo $values['postDate']; ?></small></p>
                  <p class="card-text"> <?php echo $values['description']; ?> </p>
                  <p class="card-text"><small class="text-muted"><?php echo $values['category']; ?></small></p>
                </div>
              </div>
            </div>
          </div>

          <?php
    }

    $busqueda = "";
  }
    else{
        $estado = "No existen contenidos con los datos capturados";
    }
    $mysqli->close();
}
                ?>

 </div>

  </div>
</div>

 </div>




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h5 style="text-align:center;">Anadir nuevo elemento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">


        <form method="post" id="frmChannel">

          <div class="form-group">
            <label for="message-text" class="col-form-label">Link:</label>
            <textarea class="form-control" id="linkUrl" name="linkUrl"></textarea></br>
            <label for="message-text" class="col-form-label" >Nombre del feed:</label>
            <textarea class="form-control" id="feedName" name="feedName"></textarea></br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
              <button id="btnToasts" class="btn btn-primary">Aceptar</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>


<?php

?>




    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

     <!-- función para abrir tu corazón -->


    <script>

        $("#btnToasts").click(function(){
           $("#toast1").toast('show');

        $("#btnOcultar").click(function(){
           $("#toast1").toast('hide');
        });

        });

        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('whatever')

            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)

        })
      </script>

</body>
</html>
