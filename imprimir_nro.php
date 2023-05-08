<!DOCTYPE HTML>
<!--	Auto Gestion de Afiliados COLMED salud-->
<html>

<head>
    <meta http-equiv="Refresh" content="10; URL=index.html" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/estilo.css" TYPE="text/css" MEDIA=screen />
    <title>Autogestion de Afiliados</title>

    <script type="text/javascript">
        function imprimir() {
            if (window.print) {
                window.print();
            } else {
                alert("La función de impresion no esta soportada por su navegador.");
            }
        }
    </script>

    </style>
    <style media='print'>
        input {
            display: none;
        }

        /* esto oculta los input cuando imprimes */
        option {
            display: none;
        }

        /* esto oculta los option cuando imprimes */
        breadcrumbs {
            display: none;
        }

        div#breadcrumbs {
            display: none;
            left: 0px;
            top: 0px;
            right: 0px;
            bottom: 0px;
            position: absolute;
            height: 100%;
            width: 100%;
        }

        /* esto oculta los div cuando imprimes */
        div#noprint {
            display: none;
            left: 0px;
            top: 0px;
            right: 0px;
            bottom: 0px;
            position: absolute;
            height: 100%;
            width: 100%;
        }

        /* esto oculta los div cuando imprimes */
        div#bottom {
            display: none;
            left: 0px;
            top: 0px;
            right: 0px;
            bottom: 0px;
            position: absolute;
            height: 100%;
            width: 100%;
        }

        /* esto oculta los div cuando imprimes */
    </style>
    </style>

</head>

<body onLoad="imprimir();">
    <div id="noprint">
        <?PHP
        require('fn/conexion.php');
        $credencial = $_GET['user'];
        $dni = $_GET['dni']; ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="3" align="center"><a href="index.html" target="_parent"><img src="imagenes/logo.png" alt="COLMED" width="30%" /></a></td>
            </tr>

            <tr>
                <td colspan="3" align="center" style="font-size:15px"></td>
            </tr>

            <tr>
                <td colspan="3" style="font-size:15px" align="center">
                    <input style="font-size:25px;width:100%" type='button' value='Volver' onClick="location.replace('menu.php');" class="button" />
                </td>
            </tr>

            <tr>
                <td colspan="3" align="center" style="font-size:15px">
                    <?PHP if ($_GET['tipo'] != 'C') { ?>
                        <br>
                        Record&aacute; que tambi&eacute;n pod&eacute;s realizar<br>
                        autorizaciones desde tu email<br>
                        enviando los datos a<br>
                        autorizaciones@colmedsanjuan.com.ar<br>
                        <br>
                    <?PHP } else { ?>
                        <br>
                        Ser&aacute;s atendido por uno<br>
                        de nuestros assesores comerciales<br>
                        <br>
                        <!--img src="imagenes/banner0004.jpg" alt="AVISO AFILIADOS" width="100%"/ -->
                    <?PHP } ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center" style="font-size:20px">Retir&aacute; tu n&uacute;mero</td>
            </tr>

            <tr>
                <td colspan="3" align="center"><img src="imagenes/flechaabajo.gif" alt="TICKET" width="60%" /></td>
            </tr>
        </table>
        <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
        <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
    </div>
    <?PHP
    //consulta 
    $result = mysqli_query($conexion, "SELECT * FROM ti_turnos WHERE ti_turnos.tipo = '$_GET[tipo]' order by tipo,id DESC limit 1");
    while ($datos = mysqli_fetch_array($result)) { ?>

        <table width="250" border="0" cellspacing="2" cellpadding="2" align="center" style="font-family:Arial, Helvetica, sans-serif">
            <tr>
                <td style="font-size:20px" align="center"><b>COLMED Salud</b></td>
            </tr>

            <tr>
                <td style="font-size:10px" align="center">
                    <b>Por favor aguarde un instante.<br> Su turno será convocado en breve.</b>
                </td>
            </tr>

            <tr>
                <td style="font-size:40px" align="center"><b>
                        <?PHP echo $datos["tipo"] . str_pad($datos["id"], 4, "0", STR_PAD_LEFT); ?></b>
                </td>
            </tr>

            <tr>
                <td style="font-size:10px" align="center">
                    <b><?PHP echo date('d/m/Y h:i:s A');    ?></b>
                </td>
            </tr>

            <tr>
                <td style="font-size:10px" align="center">
                    <?PHP if ($datos["tipo"] != 'C') { ?>
                        Record&aacute; que tambi&eacute;n pod&eacute;s realizar<br>
                        autorizaciones desde tu email enviando los datos a<br>
                        <a>autorizaciones@colmedsanjuan.com.ar</a><br>
                        o por WhatsApp al <br>
                        <b>264-6312701</b><br>
                    <?PHP } ?>
                </td>
            </tr>

            <tr>
                <td style="font-size:10px" align="center">
                    <b>Tel.: 0264-4220654 | 4214749</b>
                </td>
            </tr>

        </table>

    <?PHP    } ?>
</body>

</html>