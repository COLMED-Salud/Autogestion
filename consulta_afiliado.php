<?PHP
include('fn/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Refresh" CONTENT="50; URL=menu.html">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal de Afiliados</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Arial', sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      position: relative;
    }

    .background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      background-image: url('assets/images/wallp_bloqueo.jpg');
      overflow: hidden;
    }

    .container {
      background-color: rgba(255, 255, 255, 0.85);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      text-align: center;
      max-width: 90%;
      width: 620px;
      z-index: 1;
    }

    .logo {
      width: 200px;
      height: 200px;
      margin: 0 auto 40px;
      border-radius: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 24px;
      color: #666;
    }

    .titulo {
      width: 200px;
      height: 200px;
      margin: 0 auto 40px;
      border-radius: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 24px;
      color: #666;
    }

    .buttons {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .btn {
      padding: 20px;
      border: none;
      border-radius: 10px;
      font-size: 22px;
      font-weight: bold;
      color: white;
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
      text-decoration: none;
    }

    .btn:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .btn-green {
      background-color: #4CAF50;
      /* Verde manzana */
    }

    .btn-blue {
      background-color: #2196F3;
      /* Azul */
    }

    /* Responsive para diferentes tamaños de tótem */
    @media (max-height: 800px) {
      .logo {
        width: 150px;
        height: 150px;
        margin-bottom: 30px;
      }

      .titulo {
        width: 350px;
        height: 150px;
        margin-bottom: 30px;
      }


      .btn {
        padding: 15px;
        font-size: 20px;
      }
    }

    @media (max-height: 600px) {
      .container {
        padding: 20px;
      }

      .logo {
        width: 200px;
        height: 100px;
        margin-bottom: 20px;
      }

      .titulo {
        width: 300px;
        height: 100px;
        margin-bottom: 20px;
      }

      .btn {
        padding: 12px;
        font-size: 18px;
      }

    }

    .logo img {
      width: 400px;
      /* o el tamaño que desees */
      height: auto;
    }
  </style>
</head>

<body>
  <div class="background">
  </div>
  <div class="container">
    <?PHP

    if (strlen($_REQUEST['user']) > 8) {

      $credencial_tit = substr($_REQUEST['user'], 0, 10) . "00";
      //echo $credencial_tit;
      $result = mysqli_query($conexion, "SELECT * FROM afiliados_grupo_vista WHERE afiliados_grupo_vista.credencial = '$credencial_tit' AND afiliados_grupo_vista.abm != 'Baja' ");
    } else {
      $result = mysqli_query($conexion, "SELECT * FROM afiliados_grupo_vista WHERE afiliados_grupo_vista.nro_doc = '$_REQUEST[user]' AND afiliados_grupo_vista.abm != 'Baja' ");
      //$result=mysqli_query("SELECT * FROM afiliados_grupo WHERE afiliados_grupo.nro_doc = '$_REQUEST[user]' ");				
    }

    if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      $dni = $row['nro_doc'];

      if ($row['sis'] == "P") {
        $sistema = "Prepaga";
      };

      if ($row['sis'] == "C") {
        $sistema = "Coseguro";
      };

      if ($row['sis'] == "O") {
        $sistema = "Obra Social";
      };
    ?>

      <div class="titulo">
        <?PHP echo $row['apynom']; ?>
        <br>
        <?PHP echo $sistema . " - Plan " . $row['plan']; ?>
      </div>
      <div class="buttons">
        <a class="btn btn-blue" href="consulta_nro.php?tipo=A&user=<? echo $row["credencial"]; ?>&dni=<? echo $dni; ?>">Turno Autorizaciones</a>
        <a class="btn btn-blue" href="consulta_nro.php?tipo=R&user=<? echo $row["credencial"]; ?>&dni=<? echo $dni; ?>">Reintegros</a>
        <a class="btn btn-blue" href="consulta_nro.php?tipo=V&user=<? echo $row["credencial"]; ?>&dni=<? echo $dni; ?>">Otras Gestiones</a>
        <a class="btn btn-green" href="ingreso.php">Volver</a>
      </div>
    <?PHP } else { ?>
      <div class="logo">
        Afiliado no encontrado
      </div>
      <div class="buttons">
        <a class="btn btn-green" href="ingreso.php">Volver</a>
      </div>

    <?PHP } ?>
  </div>


</body>

</html>