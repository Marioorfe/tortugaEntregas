<?php
spl_autoload_register("cargaClases");

/* Función para llamar a todas las clases */
function cargaClases($nombreClase)
{
  require_once "./Clases/" . $nombreClase . '.php';
}
session_start(); //Iniciamos una sesión
//si no se inicio sesión mostramos pagina en blanco


if (!isset($_SESSION['arrayfiguras'])) {

  $arrayfiguras = new AppWebLogo();
  $_SESSION['arrayfiguras'] = $arrayfiguras;
  $tortuga = new Tortuga(165, 180, 0);
  $arrayfiguras->aniadir($tortuga);
} else {

  $arrayfiguras = $_SESSION['arrayfiguras'];
}

if (isset($_POST['comandos'])) {
  $input = $_POST['comandos'];
  $comandos = explode(" ", $input);

  foreach ($arrayfiguras->getArray() as $elemento) {

    for ($i = 0; $i < count($comandos); $i++) {
      if ($comandos[$i] == "adelante" || $comandos[$i] == "ad") {

        if (is_numeric($comandos[($i + 1)])) {
          if ($elemento->getAngulo() == 0) {
            $elemento->animar(0, - ($comandos[($i + 1)]));
          } elseif ($elemento->getAngulo() == 45) {
            $elemento->animar($comandos[($i + 1)], - ($comandos[($i + 1)]));
          } elseif ($elemento->getAngulo() == 90) {
            $elemento->animar($comandos[($i + 1)], 0);
          } elseif ($elemento->getAngulo() == 135) {
            $elemento->animar($comandos[($i + 1)], $comandos[($i + 1)]);
          } elseif ($elemento->getAngulo() == 180) {
            $elemento->animar(0, $comandos[($i + 1)]);
          } elseif ($elemento->getAngulo() == 225) {
            $elemento->animar(- ($comandos[($i + 1)]), $comandos[($i + 1)]);
          } elseif ($elemento->getAngulo() == 270) {
            $elemento->animar(- ($comandos[($i + 1)]), 0);
          } elseif ($elemento->getAngulo() == 315) {
            $elemento->animar(- ($comandos[($i + 1)]), - ($comandos[($i + 1)]));
          }
        }
      } elseif ($comandos[$i] == "atras" || $comandos[$i] == "at") {
        if(is_numeric($comandos[($i+1)])){

          if($elemento->getAngulo() == 0){

            $elemento->animar(0, ($comandos[($i+1)]));

          }elseif ($elemento->getAngulo() == 45){

            $elemento->animar(-($comandos[($i+1)]), -($comandos[($i+1)]));

          }

          elseif ($elemento->getAngulo() == 90){

            $elemento->animar(-($comandos[($i+1)]), 0);

          }

          elseif ($elemento->getAngulo() == 135){

            $elemento->animar(-($comandos[($i+1)]), -($comandos[($i+1)]));

          }

          elseif ($elemento->getAngulo() == 180){

            $elemento->animar(0, -($comandos[($i+1)]));

          }  
          elseif ($elemento->getAngulo() == 225){

            $elemento->animar(($comandos[($i+1)]), -($comandos[($i+1)]));

          }

          elseif ($elemento->getAngulo() == 270){

            $elemento->animar(-($comandos[($i+1)]),0);

          }

          elseif ($elemento->getAngulo() == 315){

            $elemento->animar(($comandos[($i+1)]),($comandos[($i+1)]));

          }

        }
      } elseif ($comandos[$i] == "derecha" || $comandos[$i] == "de") {
        $elemento->setAngulo($comandos[($i + 1)]);
      } elseif ($comandos[$i] == "izquierda" || $comandos[$i] == "iz") {
        $elemento->setAngulo($comandos[($i + 1)]);
      } elseif ($comandos[$i] == "borrarpantalla" || $comandos[$i] == "bp") {
        //borrar pantalla
      } elseif ($comandos[$i] == "subirlapiz" || $comandos[$i] == "sl") {
        //
      } elseif ($comandos[$i] == "bajarlapiz" || $comandos[$i] == "bl") {
        //
      } elseif ($comandos[$i] == "ocultartortuga" || $comandos[$i] == "ot") {
        $elemento->setVisible(false);
      } elseif ($comandos[$i] == "mostrartortuga" || $comandos[$i] == "mt") {
        $elemento->setVisible(true);
      } elseif ($comandos[$i] == "casa") {
        $elemento->mover(165, 180/* , 90 */);
        $elemento->setAngulo(0);
      }
    }
  }
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>LOGO</title>
</head>

<body>
  <h1>Aprende a usar LOGO</h1>
  <div id="svg">
    <svg width="500" height="500" style="background-color: #e7e7e7" viewBox="0 0 400 400">

      <?php


      foreach ($arrayfiguras->getArray() as $elemento) {

        echo $elemento->dibujar();
      }


      ?>

    </svg>



  </div>
  <hr>
  <form action="index.php" method="post">
    <textarea name="comandos" id="comandos" cols="61" rows="10"></textarea><br>
    <button type="submit" value="Enviar">Enviar</button>
  </form>
  <a href="./cerrrarSesion.php"><button>Cerrar sesión</button></a>

</body>

</html>
<?php

print_r($arrayfiguras);
