<!DOCTYPE HTML>
<!--	Auto Gestion de Afiliados COLMED salud-->
<html>

<head>
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
        input{display:none;} /* esto oculta los input cuando imprimes */
        option{display:none;} /* esto oculta los option cuando imprimes */
        breadcrumbs{display:none;}
        div#breadcrumbs{display:none;
            left: 0px;
            top: 0px;
            right: 0px;
            bottom: 0px;
            position: absolute;
            height: 100%;
            width: 100%;} /* esto oculta los div cuando imprimes */
        div#noprint{display:none;
            left: 0px;
            top: 0px;
            right: 0px;
            bottom: 0px;
            position: absolute;
            height: 100%;
            width: 100%;} /* esto oculta los div cuando imprimes */	
        div#bottom{display:none;
            left: 0px;
            top: 0px;
            right: 0px;
            bottom: 0px;
            position: absolute;
            height: 100%;
            width: 100%;} /* esto oculta los div cuando imprimes */		
        </style>
    </style>
    
</head>

<body onload="imprimir();">
<div id="noprint">
<?PHP
require('fn/conexion.php');
require_once('barcode/barcode.inc.php'); 
$credencial = $_GET[user];
$dni=$_GET[dni];?>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
            <td colspan="3" align="center"><a href="index.html" target="_parent"><img src="imagenes/logo.png" alt="COLMED" width="30%"/></a></td>
        </tr>
        
        <tr>
            <td colspan="3" align="center" style="font-size:25px"></td>
        </tr>
        
        <tr>
            <td colspan="3" style="font-size:15px" align="center">
                <input style="font-size:25px;width:100%" type ='button' value = 'Volver'
             	 onClick="location.replace('consulta_afiliado_resumen.php?user=<? echo $credencial;?>&dni=<? echo $dni;?>');" class="button"/>
            </td>
        </tr>
        
        <tr>
            <td colspan="3" style="font-size:15px" align="center">
                <input style="font-size:25px;width:100%" type ='button' value = 'Salir'
				 onClick="location.replace('ingreso.php');" class="button"/>
            </td>
        </tr>
        
        <tr>
            <td colspan="3" align="center" style="font-size:20px">Retire su cup&oacute;n</td>
        </tr>
        
        <tr>
            <td colspan="3" align="center"><img src="imagenes/flechaabajo.gif" alt="TICKET" width="60%"/></td>
        </tr>
</table>
<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
</div>
	<?PHP
	//consulta 
	$result=mysql_query("SELECT * FROM fac_cabecera WHERE fac_cabecera.cpte_int=$_GET[cpte];");
	while($datos = mysql_fetch_array($result)){
	$total = $datos["totalf"];
	$cred=$datos["credencial"];
	$facsuc = str_pad($datos["fac_suc"], 4, "0", STR_PAD_LEFT);
	$facnro = str_pad($datos["fac_nro"], 8, "0", STR_PAD_LEFT);
	$saldo_cr  = $datos["saldo_cr"];
	$sdo_tot  = $datos["sdo_tot"];
	$cod_facil = $datos["cod_facil"];
	$cont_lin = $datos["cpte_orden"];
	$per=substr($datos["fec_vig"], 5, 2) . '/' . substr($datos["fec_vig"], 0, 4);
	$vto=implode('/',array_reverse(explode('-',$datos["fec_vto"]))); 
	$vig=implode('/',array_reverse(explode('-',$datos["fec_vig"])));
	$img = "temp/" . $_GET[cpte] . ".gif";
	$result2=mysql_query("SELECT * FROM fac_detalle WHERE fac_detalle.cpte_int=$_GET[cpte];"); ?>
    
	<table width="250" border="0" cellspacing="2" cellpadding="2" align="center">
        <tr>
            <td colspan="3" align="center"><b>COLMED Salud</b></td>
        </tr>
        
        <tr>
            <td colspan="3" align="center"><b>Resumen de Cuenta</b><hr></td>
        </tr>
        
        <tr>
            <td align="right" style="font-size:9px"><b>Factura.Nro:</b></td>
            <td colspan="2" style="font-size:9px" align="left">
            <?PHP echo str_pad($datos["fac_suc"], 4, "0", STR_PAD_LEFT) . str_pad($datos["fac_nro"], 8, "0", STR_PAD_LEFT);?>
            </td>
        </tr>
        
        <tr>
        	<td align="left"  style="font-size:9px"><b>Fecha</b></td>
            <td align="left"  style="font-size:9px"><b>Detalle</b></td>
            <td align="right"  style="font-size:9px"><b>Importe</b></td>
        </tr>
        
        <?PHP while($datos2 = mysql_fetch_array($result2)){ ?>
        <tr>
        	<td align="left"  style="font-size:8px"><?PHP echo $datos2["fecha"]; ?></td>
            <td align="left"  style="font-size:8px"><?PHP echo $datos2["detalle"]; ?></td>
            <td align="right" style="font-size:8px"><?PHP echo number_format($datos2["total"],2); ?></td>
        </tr>
        <?PHP	} ?>
        <tr>
            <td colspan="2" align="right" style="font-size:8px">Total</td>
            <td align="right" style="font-size:12px"><b><?PHP echo $total; ?></b></td>
        </tr>
    </table>
	
<?PHP	} ?>
</body>
</html>
