<!DOCTYPE HTML>
<!--	Auto Gestion de Afiliados COLMED salud-->
<html>

<head>
    <!--<META HTTP-EQUIV="Refresh" CONTENT="20; URL=index.html">-->
    <META HTTP-EQUIV="Refresh" CONTENT="20; URL=menu.php">
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

<!-- body onload="imprimir();" -->

<body onload="imprimir();">
    <div id="noprint">
        <?PHP
        require('fn/conexion.php');
        require_once('barcode/barcode.inc.php');
        $credencial = $_GET['user'];
        $dni = $_GET['dni']; ?>
        <table width="100%" border="0" cellspacing="2" cellpadding="2" align="center">
            <tr>
                <td colspan="3" align="center"><a href="index.html" target="_parent"><img src="imagenes/logo.png" alt="COLMED" width="30%" /></a></td>
            </tr>

            <tr>
                <td colspan="3" align="center" style="font-size:15px">Con este cup&oacute;n usted podra pagar en:</td>
            </tr>

            <tr>
                <td colspan="3" align="center"><img src="imagenes/mediosdepago.png" alt="COLMED" width="100%" /></td>
            </tr>

            <tr>
                <td colspan="3" align="center"><img src="imagenes/mediosdepago2.png" alt="COLMED" width="100%" /></td>
            </tr>

            <tr>
                <td colspan="3" style="font-size:15px" align="center">
                    <input style="font-size:25px;width:100%" type='button' value='Volver' onClick="location.replace('consulta_afiliado_facturas.php?user=<? echo $credencial; ?>&dni=<? echo $dni; ?>');" class="button" />
                </td>
            </tr>

            <tr>
                <td colspan="3" style="font-size:12px" align="center">
                    <input style="font-size:25px;width:100%" type='button' value='Salir' onClick="location.replace('index.html');" class="button" />
                    <!--onClick="location.replace('index.html');" class="button"/> -->
                </td>
            </tr>

            <tr>
                <td colspan="3" align="center" style="font-size:20px">Retire su cup&oacute;n</td>
            </tr>

            <tr>
                <td colspan="3" align="center"><img src="imagenes/flechaabajo.gif" alt="TICKET" width="30%" /></td>
            </tr>

        </table>
        <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
        <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
    </div>

    <?PHP
    //consulta 
    $result = mysqli_query($conexion, "SELECT * FROM fac_cabecera WHERE fac_cabecera.cpte_int=$_GET[cpte];");
    while ($datos = mysqli_fetch_array($result)) {
        $total = $datos["totalf"];
        $cred = $datos["credencial"];
        $facsuc = str_pad($datos["fac_suc"], 4, "0", STR_PAD_LEFT);
        $facnro = str_pad($datos["fac_nro"], 8, "0", STR_PAD_LEFT);
        $saldo_cr  = $datos["saldo_cr"];
        $sdo_tot  = $datos["sdo_tot"];
        $cod_facil = $datos["cod_facil"];
        $cont_lin = $datos["cpte_orden"];
        $per = substr($datos["fec_vig"], 5, 2) . '/' . substr($datos["fec_vig"], 0, 4);
        $vto = implode('/', array_reverse(explode('-', $datos["fec_vto"])));
        $vig = implode('/', array_reverse(explode('-', $datos["fec_vig"])));
        $img = "temp/" . $_GET['cpte'] . ".gif";
        new barCodeGenrator($cod_facil, 1, $img, 400, 80, true); ?>

        <table width="270" border="0" cellspacing="2" cellpadding="2">
            <tr>
                <td colspan="3" align="center"><img src="imagenes/logo.png" alt="COLMED" width="150" />
                    <hr>
                </td>
            </tr>

            <tr>
                <td colspan="3" style="font-size:12px" align="center"><b>TALON DE PAGO</b></td>
            </tr>

            <tr>
                <td align="right" style="font-size:9px" bgcolor="#99CC00">Factura.Nro:</td>
                <td colspan="2" style="font-size:9px" align="left">
                    <?PHP echo str_pad($datos["fac_suc"], 4, "0", STR_PAD_LEFT) . str_pad($datos["fac_nro"], 8, "0", STR_PAD_LEFT); ?>
                </td>
            </tr>

            <tr>
                <td align="right" style="font-size:9px" bgcolor="#99CC00">Sr/a:</td>
                <td colspan="2" style="font-size:9px" align="left"><?PHP echo $datos["apynom"]; ?></td>
            </tr>

            <tr>
                <td align="right" style="font-size:9px" bgcolor="#99CC00">Nro. Afiliacion:</td>
                <td colspan="2" style="font-size:9px" align="left"><?PHP echo $datos["credencial"]; ?></td>
            </tr>

            <tr>
                <td style="font-size:9px" align="center" bgcolor="#CCCCCC"><b>&nbsp;Periodo&nbsp;</b></td>
                <td style="font-size:9px" align="center" bgcolor="#CCCCCC"><b>&nbsp;Vencimiento&nbsp;</b></td>
                <td style="font-size:9px" align="center" bgcolor="#CCCCCC"><b>&nbsp;Vigencia&nbsp;</b></td>
            </tr>

            <tr>
                <td style="font-size:9px" align="center"><?PHP echo $per; ?></b></td>
                <td style="font-size:9px" align="center"><?PHP echo $vto; ?></td>
                <td style="font-size:9px" align="center"><?PHP echo $vig; ?></td>
            </tr>

            <tr>
                <td colspan="2" align="right" style="font-size:9px" bgcolor="#99CC00">Total:</td>
                <td align="center" style="font-size:12px"><b><?PHP echo "$ " . $total; ?></b></td>
            </tr>

            <tr>
                <td colspan="3" align="center"><img src="<?PHP echo $img; ?>" alt="codigodebarras" width="100%" />
                    <hr>
                </td>
            </tr>

            <tr>
                <td colspan="3" style="font-size:10px" align="center">
                    Tambien pod&eacute;s abonar tu factura s&oacute;lo con tu DNI en:<br>
                    <b>SAN JUAN SERVICIOS</b> y <b>PAGO F&Aacute;CIL</b>
                </td>
            </tr>

            <tr>
                <td colspan="3" style="font-size:7px" align="center">
                    Los intereses por pago fuera de termino se calcularán al momento del efectivo pago. Tasa de Interes: Vigente BNA
                </td>
            </tr>
        </table>

    <?PHP    } ?>
</body>

</html>