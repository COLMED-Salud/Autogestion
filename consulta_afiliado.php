<?PHP
include('fn/conexion.php');
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v4.9.7, https://mobirise.com -->
    <meta http-equiv="Refresh" CONTENT="50; URL=menu.php">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.9.7, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/icono-colmed2-128x128.png" type="image/x-icon">
    <meta name="description" content="Auto Gestion de Afiliados">

    <title>Menu Afiliado</title>
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

</head>

<body>
    <section class="cid-roEv3Ug6Ve mbr-fullscreen mbr-parallax-background" id="header2-1">
        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(35, 35, 35);"></div>
        <div class="container align-center">
            <div class="row justify-content-md-center">
                <div class="mbr-white col-md-10">

                    <?PHP

                    if (strlen($_REQUEST['user']) > 8) {

                        $credencial_tit = substr($_REQUEST['user'], 0, 10) . "00";
                        //echo $credencial_tit;
                        $result = mysqli_query($conexion, "SELECT * FROM afiliados WHERE afiliados.credencial = '$credencial_tit' AND afiliados.abm != 'Baja' ");
                    } else {
                        $result = mysqli_query($conexion, "SELECT * FROM afiliados WHERE afiliados.nro_doc = '$_REQUEST[user]' AND afiliados.abm != 'Baja' ");
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

                        <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">
                            <?PHP echo $row['apynom']; ?></h3>
                        <p class="mbr-text pb-3 mbr-fonts-style display-5"><?PHP echo $sistema . " - Plan " . $row['plan']; ?></p>

                        <?PHP if ($row['plan'] == "OG") { ?>
                            <script>
                                function envio() {
                                    document.formu.submit()
                                }
                            </script>

                            <body onLoad="envio()">
                                <form action="consulta_nro.php?tipo=I&user=<? echo $row["credencial"]; ?>&dni=<? echo $dni; ?>" name="formu" method="POST">
                                    <?PHP } else {

                                    if ($row['lab_cod'] == "1" or $row['lab_cod'] == "2" or $row['lab_cod'] == "3" or $row['lab_cod'] == "9") { ?>

                                        <script>
                                            function envio() {
                                                document.formu.submit()
                                            }
                                        </script>

                                        <body onLoad="envio()">
                                            <form action="consulta_nro.php?tipo=E&user=<? echo $row["credencial"]; ?>&dni=<? echo $dni; ?>" name="formu" method="POST">

                                            <?PHP } else { ?>

                                                <div class="mbr-section-btn">
                                                    <a class="btn btn-md btn-info display-4" href="consulta_nro.php?tipo=A&user=<? echo $row["credencial"]; ?>&dni=<? echo $dni; ?>">
                                                        Turno Autorizaciones
                                                    </a>

                                                    <a class="btn btn-md btn-primary display-4" href="consulta_nro.php?tipo=V&user=<? echo $row["credencial"]; ?>&dni=<? echo $dni; ?>">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;Otras Gestiones&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </a>

                                                    <a class="btn btn-md btn-warning display-4" href="consulta_afiliado_facturas.php?user=<? echo $row["credencial"]; ?>&dni=<? echo $dni; ?>">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Talón de Pago&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </a>

                                                    <a class="btn btn-md btn-warning display-4" href="consulta_afiliado_resumen.php?user=<? echo $row["credencial"]; ?>&dni=<? echo $dni; ?>">
                                                        Resumen de Cuenta
                                                    </a>
                                                    <a class="btn btn-md btn-white-outline display-4" href="menu.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Salir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </a>
                                                </div>
                                            <?PHP } ?>
                                        <?PHP } ?>
                                        </body>

                                    <?PHP } else { ?>
                                        <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">
                                            Afiliado no encontrado</h3>
                                        <p class="mbr-text pb-3 mbr-fonts-style display-5">Vuelva a ingresar el n&uacute;mero</p>
                                        <div class="mbr-section-btn"><a class="btn btn-md btn-info display-4" href="ingreso.php">Volver</a></div>
                                    <?PHP } ?>
                                </form>

                                </form>
                            </body>
                </div>
            </div>
        </div>
    </section>


    <section class="engine"><a href="https://mobirise.info/c">web builder</a></section>
    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/parallax/jarallax.min.js"></script>
    <script src="assets/theme/js/script.js"></script>


</body>

</html>